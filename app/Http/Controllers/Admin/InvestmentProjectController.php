<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvestmentProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvestmentProjectController extends Controller
{
    /**
     * Display a listing of investment projects.
     */
    public function index()
    {
        $projects = InvestmentProject::orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.investment-projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.investment-projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_code' => 'required|unique:investment_projects',
            'district_uz' => 'required',
            'district_ru' => 'required',
            'district_en' => 'nullable',
            'mahalla_uz' => 'nullable',
            'mahalla_ru' => 'nullable',
            'mahalla_en' => 'nullable',
            'land_area' => 'required|numeric',
            'announcement_date' => 'required|date',
            'submission_deadline' => 'required|date',
            'status' => 'required|in:active,archive,completed',
            'announcement_pdf' => 'nullable|file|mimes:pdf|max:10240',
            'attachments_zip' => 'nullable|file|mimes:zip,rar|max:51200',
            'has_extension' => 'boolean',
            'extended_deadline' => 'nullable|date',
            'extension_note_uz' => 'nullable',
            'extension_note_ru' => 'nullable',
            'extension_note_en' => 'nullable',
            'order' => 'nullable|integer',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('announcement_pdf')) {
            $validated['announcement_pdf'] = $request->file('announcement_pdf')->store('investment-projects/announcements', 'public');
        }

        if ($request->hasFile('attachments_zip')) {
            $validated['attachments_zip'] = $request->file('attachments_zip')->store('investment-projects/attachments', 'public');
        }

        InvestmentProject::create($validated);

        return redirect()->route('admin.investment-projects.index')
            ->with('success', 'Investitsiya loyihasi muvaffaqiyatli yaratildi!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = InvestmentProject::findOrFail($id);
        return view('admin.investment-projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $project = InvestmentProject::findOrFail($id);

        $validated = $request->validate([
            'project_code' => 'required|unique:investment_projects,project_code,' . $id,
            'district_uz' => 'required',
            'district_ru' => 'required',
            'district_en' => 'nullable',
            'mahalla_uz' => 'nullable',
            'mahalla_ru' => 'nullable',
            'mahalla_en' => 'nullable',
            'land_area' => 'required|numeric',
            'announcement_date' => 'required|date',
            'submission_deadline' => 'required|date',
            'status' => 'required|in:active,archive,completed',
            'announcement_pdf' => 'nullable|file|mimes:pdf|max:10240',
            'attachments_zip' => 'nullable|file|mimes:zip,rar|max:51200',
            'has_extension' => 'boolean',
            'extended_deadline' => 'nullable|date',
            'extension_note_uz' => 'nullable',
            'extension_note_ru' => 'nullable',
            'extension_note_en' => 'nullable',
            'order' => 'nullable|integer',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('announcement_pdf')) {
            if ($project->announcement_pdf) {
                Storage::disk('public')->delete($project->announcement_pdf);
            }
            $validated['announcement_pdf'] = $request->file('announcement_pdf')->store('investment-projects/announcements', 'public');
        }

        if ($request->hasFile('attachments_zip')) {
            if ($project->attachments_zip) {
                Storage::disk('public')->delete($project->attachments_zip);
            }
            $validated['attachments_zip'] = $request->file('attachments_zip')->store('investment-projects/attachments', 'public');
        }

        $project->update($validated);

        return redirect()->route('admin.investment-projects.index')
            ->with('success', 'Investitsiya loyihasi muvaffaqiyatli yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = InvestmentProject::findOrFail($id);

        if ($project->announcement_pdf) {
            Storage::disk('public')->delete($project->announcement_pdf);
        }
        if ($project->attachments_zip) {
            Storage::disk('public')->delete($project->attachments_zip);
        }

        $project->delete();

        return redirect()->route('admin.investment-projects.index')
            ->with('success', 'Investitsiya loyihasi muvaffaqiyatli o\'chirildi!');
    }
}
