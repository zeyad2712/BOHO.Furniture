<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    /**
     * Store a newly created review
     */
    public function store(Request $request, Product $product)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'You must be logged in to write a review.'
            ], 401);
        }

        // Check if user has already reviewed this product
        $existingReview = ProductReview::where('product_id', $product->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingReview) {
            return response()->json([
                'success' => false,
                'message' => 'You have already reviewed this product.'
            ], 422);
        }

        // Validate the request
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'nullable|string|max:255',
            'comment' => 'required|string|min:2|max:1000',
        ]);

        // Create the review
        $review = ProductReview::create([
            'product_id' => $product->id,
            'user_id' => Auth::id(),
            'rating' => $validated['rating'],
            'title' => $validated['title'] ?? null,
            'comment' => $validated['comment'],
            'is_approved' => true,
        ]);

        // Update product rating and review count
        $this->updateProductRating($product);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your review!',
            'review' => $review->load('user')
        ]);
    }

    /**
     * Update product's average rating and review count
     */
    private function updateProductRating(Product $product)
    {
        $reviews = ProductReview::where('product_id', $product->id)
            ->where('is_approved', true)
            ->get();

        $avgRating = $reviews->avg('rating') ?? 0;
        $product->rating = (string) round($avgRating, 2);
        $product->reviews_count = $reviews->count();
        $product->save();
    }
}
