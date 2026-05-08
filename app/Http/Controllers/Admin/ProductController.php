<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of products
     */
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Search Filter
        if ($request->filled('search')) {
            $query->where('name_en', 'like', '%' . $request->search . '%')
                ->orWhere('name_ar', 'like', '%' . $request->search . '%');
        }

        // Category Filter
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Status Filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Sorting
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'stock_low':
                $query->orderBy('stock', 'asc');
                break;
            case 'latest':
            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(15)->withQueryString();
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new product
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
        'description_en' => 'required|string',
        'description_ar' => 'required|string',
        'price' => 'required|numeric|min:0',
        'original_price' => 'nullable|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'status' => 'required|in:new_arrival,best_selling',
        'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        'colors' => 'nullable|array',
        'colors.*' => 'required|string|max:7',
        'width' => 'nullable|numeric|min:0',
        'height' => 'nullable|numeric|min:0',
        'depth' => 'nullable|numeric|min:0',
        'dimension_unit' => 'nullable|string|in:cm,m,inch,ft',
        'gallery.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
    ]);

    $validated['colors'] = $request->colors ?? [];

    // 🔹 Upload main image (public/storage)
    if ($request->hasFile('image')) {
    
        $image = $request->file('image');
        $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
    
        $destination = public_path('storage/products');
        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }
    
        $image->move($destination, $fileName);
    
        // نخزن المسار النسبي فقط
        $validated['image'] = 'products/' . $fileName;
    }

    // 🔹 Generate slug
    $validated['slug'] = Str::slug($validated['name_en']);

    // 🔹 Discount calculation
    if (!empty($validated['original_price']) && $validated['original_price'] > $validated['price']) {
        $validated['discount_percentage'] = round(
            (($validated['original_price'] - $validated['price']) / $validated['original_price']) * 100
        );
    } else {
        $validated['discount_percentage'] = 0;
    }

    $validated['is_new_arrival'] = $validated['status'] === 'new_arrival';
    $validated['is_best_seller'] = $validated['status'] === 'best_selling';

    $product = Product::create($validated);

    // 🔹 Upload gallery images
    if ($request->hasFile('gallery')) {
    foreach ($request->file('gallery') as $image) {

        $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

        $destination = public_path('storage/products/gallery');
        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        $image->move($destination, $fileName);

        $product->images()->create([
            'image_path' => 'products/gallery/' . $fileName
        ]);
    }
}

    return redirect()
        ->route('admin.products.index')
        ->with('success', 'Product created successfully!');
}

    /**
     * Display the specified product
     */
    public function show(Product $product)
    {
        $product->load('category');
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing a product
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:new_arrival,best_selling',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'colors' => 'nullable|array',
            'colors.*' => 'required|string|max:7', // Hex codes
            'width' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
            'depth' => 'nullable|numeric|min:0',
            'dimension_unit' => 'nullable|string|in:cm,m,inch,ft',
        ]);

        $validated['colors'] = $request->colors ?? [];

        // Handle Image Upload
        if ($request->hasFile('image')) {

    // حذف الصورة القديمة
        if ($product->image && file_exists(public_path('storage/' . $product->image))) {
            unlink(public_path('storage/' . $product->image));
        }
    
        $image = $request->file('image');
        $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
    
        $destination = public_path('storage/products');
        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }
    
        $image->move($destination, $fileName);
    
        $validated['image'] = 'products/' . $fileName;
    } else {
        unset($validated['image']);
    }

        // Generate slug
        $validated['slug'] = Str::slug($validated['name_en']);

        // Calculate discount if original price exists
        if (isset($validated['original_price']) && $validated['original_price'] > $validated['price']) {
            $validated['discount_percentage'] = round((($validated['original_price'] - $validated['price']) / $validated['original_price']) * 100);
        } else {
            $validated['discount_percentage'] = 0;
        }

        $validated['is_new_arrival'] = $validated['status'] === 'new_arrival';
        $validated['is_best_seller'] = $validated['status'] === 'best_selling';

        $product->update($validated);

        // Handle New Gallery Images
        if ($request->hasFile('gallery')) {
        foreach ($request->file('gallery') as $image) {
    
            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
    
            $destination = public_path('storage/products/gallery');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
    
            $image->move($destination, $fileName);
    
            $product->images()->create([
                'image_path' => 'products/gallery/' . $fileName
            ]);
        }
    }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product
     */
    public function destroy(Product $product)
    {
        // Delete main image
        if ($product->image && file_exists(public_path('storage/' . $product->image))) {
            unlink(public_path('storage/' . $product->image));
        }
        
        // Delete gallery images
        foreach ($product->images as $image) {
            if (file_exists(public_path('storage/' . $image->image_path))) {
                unlink(public_path('storage/' . $image->image_path));
            }
        }
        
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

    /**
     * Delete a specific gallery image
     */
    public function deleteGalleryImage(ProductImage $image)
    {
        if (file_exists(public_path('storage/' . $image->image_path))) {
            unlink(public_path('storage/' . $image->image_path));
        }
        
        $image->delete();
        return back()->with('success', 'Gallery image deleted successfully!');
    }
}
