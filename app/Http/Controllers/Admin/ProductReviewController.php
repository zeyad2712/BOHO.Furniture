<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of all product reviews
     */
    public function index(Request $request)
    {
        $query = ProductReview::with(['product', 'user']);

        // Search filter
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('comment', 'like', '%' . $request->search . '%')
                    ->orWhere('title', 'like', '%' . $request->search . '%')
                    ->orWhereHas('user', function ($userQuery) use ($request) {
                        $userQuery->where('name', 'like', '%' . $request->search . '%');
                    })
                    ->orWhereHas('product', function ($productQuery) use ($request) {
                        $productQuery->where('name_en', 'like', '%' . $request->search . '%')
                            ->orWhere('name_ar', 'like', '%' . $request->search . '%');
                    });
            });
        }

        // Rating filter
        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);
        }

        // Product filter
        if ($request->filled('product_id')) {
            $query->where('product_id', $request->product_id);
        }

        // Sorting
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'oldest':
                $query->oldest();
                break;
            case 'rating_high':
                $query->orderBy('rating', 'desc');
                break;
            case 'rating_low':
                $query->orderBy('rating', 'asc');
                break;
            case 'latest':
            default:
                $query->latest();
                break;
        }

        $reviews = $query->paginate(15)->withQueryString();
        $products = Product::orderBy('name_en')->get();

        return view('admin.product-reviews.index', compact('reviews', 'products'));
    }

    /**
     * Remove the specified review
     */
    public function destroy(ProductReview $review)
    {
        $product = $review->product;
        $review->delete();

        // Update product rating after deletion
        $this->updateProductRating($product);

        return redirect()->route('admin.product-reviews.index')->with('success', 'Review deleted successfully!');
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
