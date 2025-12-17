<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TenderController extends Controller
{
    /**
     * Display a listing of tenders.
     */
    public function index(Request $request)
    {
        $query = Tender::query();

        // Search filter
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Order by latest first
        $query->orderBy('created_at', 'desc');

        $tenders = $query->paginate(15)->withQueryString();

        return view('admin.tenders.index', compact('tenders'));
    }

    /**
     * Show the form for creating a new tender.
     */
    public function create()
    {
        return view('admin.tenders.create');
    }

    /**
     * Store a newly created tender.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_uz' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:50',
            'lot_number' => 'nullable|string|max:50',
            'lot_url' => 'nullable|url|max:255',
            'subject' => 'required|string',
            'subject_uz' => 'nullable|string',
            'subject_en' => 'nullable|string',
            'location' => 'required|string|max:255',
            'location_uz' => 'nullable|string|max:255',
            'location_en' => 'nullable|string|max:255',
            'location_description' => 'nullable|string',
            'location_description_uz' => 'nullable|string',
            'location_description_en' => 'nullable|string',
            'technical_requirements' => 'nullable|array',
            'technical_requirements.*' => 'string',
            'qualification_requirements' => 'nullable|array',
            'qualification_requirements.*' => 'string',
            'customer_name' => 'required|string|max:255',
            'customer_tin' => 'nullable|string|max:20',
            'customer_address' => 'nullable|string|max:255',
            'customer_phone' => 'nullable|string|max:50',
            'customer_email' => 'nullable|email|max:100',
            'announcement_date' => 'required|date',
            'submission_deadline' => 'required|date|after_or_equal:announcement_date',
            'status' => 'required|in:draft,active,closed,cancelled',
            'is_urgent' => 'boolean',
            'documents' => 'nullable|array',
            'documents.*' => 'file|mimes:pdf,doc,docx|max:10240',
        ]);

        // Handle file uploads
        $documents = [];
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store('tenders', 'public');
                $documents[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'size' => $file->getSize(),
                ];
            }
        }

        $validated['documents'] = $documents;
        $validated['is_urgent'] = $request->boolean('is_urgent');
        $validated['created_by'] = Auth::id();

        Tender::create($validated);

        return redirect()->route('admin.tenders.index')
            ->with('success', 'Тендер успешно создан');
    }

    /**
     * Display the specified tender.
     */
    public function show(Tender $tender)
    {
        return view('admin.tenders.show', compact('tender'));
    }

    /**
     * Show the form for editing the specified tender.
     */
    public function edit(Tender $tender)
    {
        return view('admin.tenders.edit', compact('tender'));
    }

    /**
     * Update the specified tender.
     */
    public function update(Request $request, Tender $tender)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_uz' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:50',
            'lot_number' => 'nullable|string|max:50',
            'lot_url' => 'nullable|url|max:255',
            'subject' => 'required|string',
            'subject_uz' => 'nullable|string',
            'subject_en' => 'nullable|string',
            'location' => 'required|string|max:255',
            'location_uz' => 'nullable|string|max:255',
            'location_en' => 'nullable|string|max:255',
            'location_description' => 'nullable|string',
            'location_description_uz' => 'nullable|string',
            'location_description_en' => 'nullable|string',
            'technical_requirements' => 'nullable|array',
            'technical_requirements.*' => 'string',
            'qualification_requirements' => 'nullable|array',
            'qualification_requirements.*' => 'string',
            'customer_name' => 'required|string|max:255',
            'customer_tin' => 'nullable|string|max:20',
            'customer_address' => 'nullable|string|max:255',
            'customer_phone' => 'nullable|string|max:50',
            'customer_email' => 'nullable|email|max:100',
            'announcement_date' => 'required|date',
            'submission_deadline' => 'required|date|after_or_equal:announcement_date',
            'status' => 'required|in:draft,active,closed,cancelled',
            'is_urgent' => 'boolean',
            'new_documents' => 'nullable|array',
            'new_documents.*' => 'file|mimes:pdf,doc,docx|max:10240',
            'remove_documents' => 'nullable|array',
        ]);

        // Handle document removal
        $documents = $tender->documents ?? [];
        if ($request->has('remove_documents')) {
            foreach ($request->remove_documents as $index) {
                if (isset($documents[$index])) {
                    Storage::disk('public')->delete($documents[$index]['path']);
                    unset($documents[$index]);
                }
            }
            $documents = array_values($documents); // Re-index array
        }

        // Handle new file uploads
        if ($request->hasFile('new_documents')) {
            foreach ($request->file('new_documents') as $file) {
                $path = $file->store('tenders', 'public');
                $documents[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'size' => $file->getSize(),
                ];
            }
        }

        $validated['documents'] = $documents;
        $validated['is_urgent'] = $request->boolean('is_urgent');
        $validated['updated_by'] = Auth::id();

        // Remove fields not in model
        unset($validated['new_documents'], $validated['remove_documents']);

        $tender->update($validated);

        return redirect()->route('admin.tenders.index')
            ->with('success', 'Тендер успешно обновлен');
    }

    /**
     * Remove the specified tender.
     */
    public function destroy(Tender $tender)
    {
        // Delete associated documents
        if ($tender->documents) {
            foreach ($tender->documents as $doc) {
                Storage::disk('public')->delete($doc['path']);
            }
        }

        $tender->delete();

        return redirect()->route('admin.tenders.index')
            ->with('success', 'Тендер успешно удален');
    }

    /**
     * Remove a specific document from tender.
     */
    public function removeDocument(Request $request, Tender $tender)
    {
        $index = $request->input('index');
        $documents = $tender->documents ?? [];

        if (isset($documents[$index])) {
            Storage::disk('public')->delete($documents[$index]['path']);
            unset($documents[$index]);
            $tender->documents = array_values($documents);
            $tender->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}
