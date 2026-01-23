<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $wishlists = Wishlist::where('user_id', Auth::id())->get();

        return view('wishlist.index', compact('wishlists'));
    }




    /**
     * Add product to wishlist
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login to add items to your wishlist.',
                'redirect' => route('login')
            ], 401);
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'color' => 'nullable|string'
        ]);

        // Check if already in wishlist
        $exists = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->where('color', $request->color)
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'This item is already in your wishlist!'
            ]);
        }

        // Add to wishlist
        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'color' => $request->color
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product added to wishlist successfully!'
        ]);
    }

    /**
     * Remove product from wishlist
     */
    public function destroy($id)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        $deleted = Wishlist::where('user_id', Auth::id())
            ->where('id', $id)
            ->delete();

        if ($deleted) {
            return response()->json([
                'success' => true,
                'message' => 'Product removed from wishlist!'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Product not found in wishlist.'
        ]);
    }

    /**
     * Get wishlist count
     */
    public function count()
    {
        if (!Auth::check()) {
            return response()->json(['count' => 0]);
        }

        $count = Wishlist::where('user_id', Auth::id())->count();

        return response()->json(['count' => $count]);
    }
}
