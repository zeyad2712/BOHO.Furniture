@extends('admin.layouts.app')

@section('page-title', 'Product Details')

@section('content')
    <div class="min-h-screen py-8" style="background-color: #fefae0;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-8 flex justify-between items-center" data-aos="fade-down">
                <div>
                    <h1 class="text-4xl font-bold" style="color: #8B4513;">
                        <i class="fas fa-box mr-3"></i>Product Details
                    </h1>
                    <p class="text-gray-600 mt-2">Viewing details for: <span
                            class="font-semibold text-gray-900">{{ $product->name_en }}</span></p>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('admin.products.index') }}"
                        class="bg-gray-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-600 transition duration-300 flex items-center space-x-2">
                        <i class="fas fa-arrow-left"></i>
                        <span>Back</span>
                    </a>
                    <a href="{{ route('admin.products.edit', $product->id) }}"
                        class="bg-yellow-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-yellow-600 transition duration-300 flex items-center space-x-2">
                        <i class="fas fa-edit"></i>
                        <span>Edit</span>
                    </a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline"
                        onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-600 transition duration-300 flex items-center space-x-2">
                            <i class="fas fa-trash"></i>
                            <span>Delete</span>
                        </button>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Product Image -->
                <div class="lg:col-span-1" data-aos="fade-right">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden p-4">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->display_name }}"
                            class="w-full h-auto object-cover rounded-xl shadow-md border border-gray-100">

                        @if($product->images && $product->images->count() > 0)
                            <div class="mt-6">
                                <h4 class="text-xs font-bold text-gray-400 mb-3 uppercase tracking-widest">Product Gallery</h4>
                                <div class="grid grid-cols-4 gap-3">
                                    @foreach($product->images as $galleryImage)
                                        <div class="relative aspect-square rounded-lg overflow-hidden border border-gray-100 shadow-sm transition duration-300 hover:scale-105 cursor-pointer group hover:shadow-md">
                                            <a href="{{ asset($galleryImage->image_path) }}" target="_blank">
                                                <img src="{{ asset($galleryImage->image_path) }}" 
                                                    class="w-full h-full object-cover">
                                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition duration-300"></div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="mt-6 space-y-4">
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-500 font-medium">Status</span>
                                @if($product->status === 'active')
                                    <span
                                        class="px-3 py-1 text-xs font-semibold rounded-full bg-[#7b8f5a]/10 text-[#7b8f5a]">Active</span>
                                @elseif($product->status === 'new')
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">New
                                        Arrival</span>
                                @else
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">On
                                        Sale</span>
                                @endif
                            </div>
                            <!-- <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-500 font-medium">Featured</span>
                                <span class="{{ $product->is_featured ? 'text-green-600' : 'text-gray-400' }}">
                                    <i
                                        class="fas {{ $product->is_featured ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                                    {{ $product->is_featured ? 'Yes' : 'No' }}
                                </span>
                            </div> -->
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-500 font-medium">Stock Level</span>
                                <span class="font-bold {{ $product->stock < 10 ? 'text-red-600' : 'text-gray-900' }}">
                                    {{ $product->stock }} units
                                </span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="text-gray-500 font-medium">Created At</span>
                                <span
                                    class="text-gray-900 text-sm">{{ $product->created_at ? $product->created_at->format('M d, Y') : 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Product Information -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Basic Info Card -->
                    <div class="bg-white rounded-2xl shadow-lg p-8" data-aos="fade-left" data-aos-delay="100">
                        <h3 class="text-2xl font-bold mb-6 border-b pb-4" style="color: #8B4513;">
                            <i class="fas fa-info-circle mr-2 text-[#7b8f5a]"></i>Basic Information
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <p class="text-gray-500 text-sm mb-1 uppercase tracking-wider font-semibold">Product Name
                                    (EN)
                                </p>
                                <p class="text-xl font-bold text-gray-900">{{ $product->name_en }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm mb-1 uppercase tracking-wider font-semibold">Product Name
                                    (AR)
                                </p>
                                <p class="text-xl font-bold text-gray-900" dir="rtl">{{ $product->name_ar }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm mb-1 uppercase tracking-wider font-semibold">Category</p>
                                <span class="px-4 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-bold">
                                    {{ $product->category->name ?? 'Uncategorized' }}
                                </span>
                            </div>
                            <div class="md:col-span-2">
                                <p class="text-gray-500 text-sm mb-1 uppercase tracking-wider font-semibold">Slug (URL)</p>
                                <code
                                    class="bg-gray-50 px-3 py-1 rounded border border-gray-200 text-blue-600 text-sm">{{ $product->slug }}</code>
                            </div>
                            @if($product->colors && count($product->colors) > 0)
                                <div class="md:col-span-2 mt-4">
                                    <p class="text-gray-500 text-sm mb-2 uppercase tracking-wider font-semibold">Available
                                        Colors</p>
                                    <div class="flex items-center space-x-3">
                                        @foreach($product->colors as $color)
                                            <div class="w-10 h-10 rounded-full border border-gray-200 shadow-sm"
                                                style="background-color: {{ $color }};" title="{{ $color }}"></div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Pricing Card -->
                    <div class="bg-white rounded-2xl shadow-lg p-8" data-aos="fade-left" data-aos-delay="200">
                        <h3 class="text-2xl font-bold mb-6 border-b pb-4" style="color: #8B4513;">
                            <i class="fas fa-tag mr-2 text-[#7b8f5a]"></i>Pricing & Statistics
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div>
                                <p class="text-gray-500 text-sm mb-1 uppercase tracking-wider font-semibold">Sale Price</p>
                                <p class="text-3xl font-bold text-[#7b8f5a]">EGP {{ number_format($product->price, 2) }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm mb-1 uppercase tracking-wider font-semibold">Original Price
                                </p>
                                <p class="text-xl font-semibold text-gray-400 line-through">
                                    EGP {{ $product->original_price ? number_format($product->original_price, 2) : 'N/A' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm mb-1 uppercase tracking-wider font-semibold">Discount</p>
                                <div class="flex items-center">
                                    <span class="text-2xl font-bold text-red-500">{{ $product->discount_percentage }}%
                                        Off</span>
                                </div>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm mb-1 uppercase tracking-wider font-semibold">Average Rating
                                </p>
                                <div class="flex items-center text-yellow-400">
                                    <i class="fas fa-star mr-1"></i>
                                    <span class="text-xl font-bold text-gray-900">{{ $product->rating }}</span>
                                    <span class="text-gray-400 text-sm ml-1">/ 5.00</span>
                                </div>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm mb-1 uppercase tracking-wider font-semibold">Reviews</p>
                                <p class="text-xl font-bold text-gray-900">{{ $product->reviews_count }} total</p>
                            </div>
                        </div>
                    </div>

                    <!-- Description Card -->
                    <div class="bg-white rounded-2xl shadow-lg p-8" data-aos="fade-left" data-aos-delay="300">
                        <h3 class="text-2xl font-bold mb-6 border-b pb-4" style="color: #8B4513;">
                            <i class="fas fa-align-left mr-2 text-[#7b8f5a]"></i>Description
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <p class="text-gray-500 text-sm mb-2 uppercase tracking-wider font-semibold">English
                                    Description</p>
                                <div class="text-gray-700 leading-relaxed">
                                    {!! nl2br(e($product->description_en)) !!}
                                </div>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm mb-2 uppercase tracking-wider font-semibold">Arabic
                                    Description</p>
                                <div class="text-gray-700 leading-relaxed" dir="rtl">
                                    {!! nl2br(e($product->description_ar)) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection