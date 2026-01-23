<?php


namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\LandingImage;
use App\Models\ProjectVideo;
use App\Models\Review;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $newArrivals = Product::where('is_new_arrival', true)->latest()->take(4)->get();
        $bestSellers = Product::where('is_best_seller', true)->latest()->take(4)->get();
        $categories = Category::all();
        $landingImage = LandingImage::where('is_active', true)->first();
        $projectVideo = ProjectVideo::where('is_active', true)->first();
        $reviews = Review::where('is_active', true)->latest()->take(10)->get();

        return view('home', compact('newArrivals', 'bestSellers', 'categories', 'landingImage', 'projectVideo', 'reviews'));
    }
}
