<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // Display a listing of projects
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('pages.projects.index', compact('projects'));
    }

    // Show the form for creating a new project
    public function create()
    {
$categories= []; // Assuming you have a way to fetch categories if needed
        return view('pages.projects.create', compact('categories'));
    }

    // Store a newly created project in storage
    public function store(Request $request)
    {
        $request->validate([
            'unique_number' => 'nullable|string',
            'district' => 'required|string',
            'street' => 'nullable|string',
            'mahalla' => 'nullable|string',
            'land' => 'nullable|numeric',
            'investor_initiative_date' => 'nullable|date',
            'company_name' => 'nullable|string',
            'contact_person' => 'nullable|string',
            'hokim_resolution_no' => 'nullable|string',
            'elon_fayl' => 'nullable',
            'pratakol_fayl' => 'nullable',
            'qoshimcha_fayl' => 'nullable',
            'implementation_period' => 'nullable|integer',
            'status' => 'required|in:1_step,2_step,archive,completed',
            'srok_realizatsi' => 'nullable|integer',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'second_stage_start_date' => 'nullable',
            'second_stage_end_date' => 'nullable',

            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'comment' => 'nullable',

            'geolocation' => 'nullable|string',
            'geo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('elon_fayl')) {
            $data['elon_fayl'] = $request->file('elon_fayl')->store('project_images/elon', 'public');
        }
        if ($request->hasFile('pratakol_fayl')) {
            $data['pratakol_fayl'] = $request->file('pratakol_fayl')->store('project_images/pratakol', 'public');
        }
        if ($request->hasFile('qoshimcha_fayl')) {
            $data['qoshimcha_fayl'] = $request->file('qoshimcha_fayl')->store('project_images/qoshimcha', 'public');
        }

        if ($request->hasFile('geo_image')) {
            $imagePath = $request->file('geo_image')->store('geo_images', 'public');
        } else {
            $imagePath = null;
        }

        Project::create($data);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    // Show the form for editing the specified project
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('pages.projects.edit', compact('project'));
    }

    // Update the specified project in storage
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'unique_number' => 'nullable|string',
            'district' => 'required|string',
            'street' => 'nullable|string',
            'mahalla' => 'nullable|string',
            'land' => 'nullable|numeric',
            'investor_initiative_date' => 'nullable|date',
            'company_name' => 'nullable|string',
            'contact_person' => 'nullable|string',
            'hokim_resolution_no' => 'nullable|string',
            'elon_fayl' => 'nullable|file',
            'pratakol_fayl' => 'nullable|file',
            'qoshimcha_fayl' => 'nullable|file',
            'implementation_period' => 'nullable|integer',
            'status' => 'required|in:1_step,2_step,archive,completed',
            'srok_realizatsi' => 'nullable|integer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'second_stage_start_date' => 'nullable|date',
            'second_stage_end_date' => 'nullable|date',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
            'comment' => 'nullable|string',
            'geolocation' => 'nullable|string',
            'geo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        // Handle file deletions
        foreach (['elon_fayl', 'pratakol_fayl', 'qoshimcha_fayl'] as $field) {
            if ($request->has("delete_{$field}")) {
                if ($project->$field) {
                    Storage::disk('public')->delete($project->$field);
                }
                $data[$field] = null;
            }
        }

        // Handle file uploads
        foreach (['elon_fayl', 'pratakol_fayl', 'qoshimcha_fayl'] as $field) {
            if ($request->hasFile($field)) {
                if ($project->$field) {
                    Storage::disk('public')->delete($project->$field);
                }
                $data[$field] = $request->file($field)->store('project_images/' . $field, 'public');
            }
        }

        // Handle geo image separately
        if ($request->has("delete_geo_image")) {
            if ($project->geo_image) {
                Storage::disk('public')->delete($project->geo_image);
            }
            $data['geo_image'] = null;
        }

        if ($request->hasFile('geo_image')) {
            if ($project->geo_image) {
                Storage::disk('public')->delete($project->geo_image);
            }
            $data['geo_image'] = $request->file('geo_image')->store('geo_images', 'public');
        }

        $project->update($data);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }


    // Remove the specified project from storage
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
