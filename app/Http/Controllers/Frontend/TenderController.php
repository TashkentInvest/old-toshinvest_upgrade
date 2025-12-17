<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;

class TenderController extends Controller
{
    /**
     * Display a listing of active tenders with search/filter.
     */
    public function index(Request $request)
    {
        $query = Tender::active();

        // Search filter
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Status filter (open/closed based on deadline)
        if ($request->filled('deadline_status')) {
            if ($request->deadline_status === 'open') {
                $query->where('submission_deadline', '>=', now()->startOfDay());
            } elseif ($request->deadline_status === 'closed') {
                $query->where('submission_deadline', '<', now()->startOfDay());
            }
        }

        // Date range filter
        if ($request->filled('date_from')) {
            $query->where('announcement_date', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->where('announcement_date', '<=', $request->date_to);
        }

        // Order by urgency first, then by deadline
        $query->orderByDesc('is_urgent')
              ->orderBy('submission_deadline', 'asc');

        // Get statistics
        $stats = [
            'total' => Tender::active()->count(),
            'open' => Tender::open()->count(),
            'urgent' => Tender::active()->where('is_urgent', true)->count(),
        ];

        $tenders = $query->paginate(9)->withQueryString();

        return view('pages.frontend.tenders.index', compact('tenders', 'stats'));
    }

    /**
     * Display a specific tender.
     */
    public function show($id)
    {
        $tender = Tender::where('status', Tender::STATUS_ACTIVE)
                       ->findOrFail($id);

        // Get related tenders (same status, exclude current)
        $relatedTenders = Tender::active()
            ->where('id', '!=', $id)
            ->where('submission_deadline', '>=', now()->startOfDay())
            ->orderBy('submission_deadline', 'asc')
            ->limit(3)
            ->get();

        return view('pages.frontend.tenders.show', compact('tender', 'relatedTenders'));
    }
}
