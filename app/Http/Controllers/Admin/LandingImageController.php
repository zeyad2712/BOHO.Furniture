<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingImageController extends Controller
{
    public function index()
    {
        $landingImage = LandingImage::where('is_active', true)->first();
        return view('admin.landing_image.index', compact('landingImage'));
    }

   public function update(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'alt_text' => 'nullable|string|max:255',
        ]);
    
        if ($request->hasFile('image')) {
            // Deactivate old images
            LandingImage::where('is_active', true)->update(['is_active' => false]);
    
            // Store new image in public directory
            $image = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            
            // Create directory if it doesn't exist
            $destination = public_path('storage/landing');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            
            // Move the file
            $image->move($destination, $fileName);
            
            // Save path relative to storage directory
            $path = 'landing/' . $fileName;
    
            LandingImage::create([
                'image_path' => $path,
                'alt_text' => $request->alt_text,
                'is_active' => true,
            ]);
    
            return redirect()->back()->with('success', 'Landing image updated successfully!');
        }
    
        return redirect()->back()->with('error', 'No image uploaded.');
    }
}