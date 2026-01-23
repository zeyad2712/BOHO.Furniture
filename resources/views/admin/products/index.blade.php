@extends('admin.layouts.app')

@section('content')
    <div class="min-h-screen py-8" style="background-color: #fefae0;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-8 flex justify-between items-center" data-aos="fade-down">
                <div>
                    <h1 class="text-4xl font-bold" style="color: #8B4513;">
                        <i class="fas fa-box mr-3"></i>Product Management
                    </h1>
                    <p class="text-gray-600 mt-2">Manage your furniture products</p>
                </div>
                <a href="{{ route('admin.products.create') }}"
                    class="bg-[#7b8f5a] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#6c7d4e] transition duration-300 flex items-center space-x-2">
                    <i class="fas fa-plus"></i>
                    <span>Add New Product</span>
                </a>
            </div>

            <!-- Filters -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8" data-aos="fade-up" data-aos-delay="100">
                <form action="{{ route('admin.products.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Search -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Search Product</label>
                        <div class="relative">
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   placeholder="Name or description..."
                                   class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#8B4513] focus:border-transparent transition duration-200">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                        <select name="category" onchange="this.form.submit()"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#8B4513] focus:border-transparent transition duration-200">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                        <select name="status" onchange="this.form.submit()"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#8B4513] focus:border-transparent transition duration-200">
                            <option value="">All Status</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New Arrival</option>
                            <option value="sale" {{ request('status') == 'sale' ? 'selected' : '' }}>On Sale</option>
                        </select>
                    </div>

                    <!-- Sort -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Sort By</label>
                        <select name="sort" onchange="this.form.submit()"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#8B4513] focus:border-transparent transition duration-200">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest Added</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="stock_low" {{ request('sort') == 'stock_low' ? 'selected' : '' }}>Low Stock First</option>
                        </select>
                    </div>

                    @if(request()->anyFilled(['search', 'category', 'status', 'sort']))
                        <div class="md:col-span-4 flex justify-end">
                            <a href="{{ route('admin.products.index') }}" 
                               class="text-sm font-semibold text-red-500 hover:text-red-700 flex items-center">
                                <i class="fas fa-times mr-1"></i>Clear All Filters
                            </a>
                        </div>
                    @endif
                </form>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-[#22C55E] p-4 rounded-r-lg shadow-sm">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-[#22C55E] mr-3 text-xl"></i>
                        <p class="text-green-800 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Products Table -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Image
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Product
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Category
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Price
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Stock
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Status
                                </th>
                                <th
                                    class="px-6 py-4 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($products as $product)
                                <tr class="hover:bg-gray-50 transition duration-200">
                                    <!-- Image -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name_en }}"
                                            class="w-16 h-16 object-cover rounded-lg">
                                    </td>

                                    <!-- Product Name -->
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-semibold text-gray-900">{{ $product->name_en }}</div>
                                        <div class="text-sm text-gray-500 line-clamp-1">
                                            {{ Str::limit($product->description_en, 50) }}</div>
                                    </td>

                                    <!-- Category -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ $product->category->name ?? 'N/A' }}
                                        </span>
                                    </td>

                                    <!-- Price -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-[#7b8f5a]">EGP {{ number_format($product->price, 2) }}
                                        </div>
                                        @if($product->original_price && $product->original_price > $product->price)
                                            <div class="text-xs text-gray-400 line-through">
                                                EGP {{ number_format($product->original_price, 2) }}</div>
                                        @endif
                                    </td>

                                    <!-- Stock -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $product->stock ?? 0 }}</div>
                                        @if(($product->stock ?? 0) < 10)
                                            <span class="text-xs text-red-600">Low Stock</span>
                                        @endif
                                    </td>

                                    <!-- Status -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($product->status === 'active')
                                            <span
                                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#7b8f5a]/10 text-[#7b8f5a]">
                                                Active
                                            </span>
                                        @elseif($product->status === 'new')
                                            <span
                                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                New
                                            </span>
                                        @else
                                            <span
                                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Sale
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center justify-end space-x-2">
                                            <a href="{{ route('admin.products.show', $product->id) }}"
                                                class="text-blue-600 hover:text-blue-900" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                                class="text-yellow-600 hover:text-yellow-900" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                                class="inline"
                                                onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center">
                                        <i class="fas fa-box-open text-gray-300 text-6xl mb-4"></i>
                                        <p class="text-gray-500 text-lg">No products found</p>
                                        <a href="{{ route('admin.products.create') }}"
                                            class="inline-block mt-4 bg-[#7b8f5a] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#6c7d4e] transition duration-300">
                                            Add Your First Product
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($products->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>

            

        </div>
    </div>
@endsection