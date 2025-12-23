<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VacancyApplication;
use Illuminate\Http\Request;

class VacancyApplicationController extends Controller
{
    public function index()
    {
        $applications = VacancyApplication::orderBy('created_at', 'desc')->paginate(20);
        $newCount = VacancyApplication::where('status', 'new')->count();

        return view('admin.vacancy-applications.index', compact('applications', 'newCount'));
    }

    public function show($id)
    {
        $application = VacancyApplication::findOrFail($id);

        // Mark as reviewed if new
        if ($application->status === 'new') {
            $application->update([
                'status' => 'reviewed',
                'reviewed_at' => now(),
                'reviewed_by' => auth()->id(),
            ]);
        }

        return view('admin.vacancy-applications.show', compact('application'));
    }

    public function updateStatus(Request $request, $id)
    {
        $application = VacancyApplication::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:new,reviewed,accepted,rejected',
            'admin_notes' => 'nullable|string|max:2000',
        ]);

        $application->update([
            'status' => $validated['status'],
            'admin_notes' => $validated['admin_notes'],
            'reviewed_at' => now(),
            'reviewed_by' => auth()->id(),
        ]);

        return back()->with('success', 'Ariza holati yangilandi');
    }

    public function destroy($id)
    {
        $application = VacancyApplication::findOrFail($id);

        // Delete resume file if exists
        if ($application->resume_path) {
            $path = storage_path('app/public/' . $application->resume_path);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $application->delete();

        return redirect()->route('admin.vacancy-applications.index')
            ->with('success', 'Ariza o\'chirildi');
    }
}
