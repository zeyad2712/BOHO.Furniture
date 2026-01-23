<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectVideoController extends Controller
{
    public function index()
    {
        $projectVideo = ProjectVideo::where('is_active', true)->first();
        return view('admin.project_video.index', compact('projectVideo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,mov,ogg,qt|max:20480', // Max 20MB
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('video')) {
            // Deactivate old videos
            ProjectVideo::where('is_active', true)->update(['is_active' => false]);

            // Store new video
            $path = $request->file('video')->store('projects', 'public');

            ProjectVideo::create([
                'video_path' => $path,
                'title' => $request->title,
                'description' => $request->description,
                'is_active' => true,
            ]);

            return redirect()->back()->with('success', 'Project video updated successfully!');
        }

        return redirect()->back()->with('error', 'No video uploaded.');
    }
}
