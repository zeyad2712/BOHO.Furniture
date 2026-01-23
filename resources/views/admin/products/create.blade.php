@extends('admin.layouts.app')

@section('page-title', 'Add New Product')

@section('content')
    <div class="min-h-screen py-8" style="background-color: #fefae0;">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold" style="color: #8B4513;">
                        <i class="fas fa-plus-circle mr-3"></i>Add New Product
                    </h1>
                    <p class="text-gray-600 mt-2">Create a new furniture product</p>
                </div>
                <a href="{{ route('admin.products.index') }}"
                    class="bg-gray-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-600 transition duration-300 flex items-center space-x-2">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back to Products</span>
                </a>
            </div>

            <!-- Form -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="space-y-6">
                        <!-- Product Names -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name_en" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Product Name (English) <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name_en" id="name_en" value="{{ old('name_en') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent"
                                    placeholder="e.g., Modern Green Sofa" required>
                                @error('name_en')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="name_ar" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Product Name (Arabic) <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent"
                                    placeholder="مثلاً: صوفا خضراء حديثة" required dir="rtl">
                                @error('name_ar')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                Category <span class="text-red-500">*</span>
                            </label>
                            <select name="category_id" id="category_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent"
                                required>
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Descriptions -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="description_en" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Description (English) <span class="text-red-500">*</span>
                                </label>
                                <textarea name="description_en" id="description_en" rows="5"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent"
                                    placeholder="Enter product description in English..." required>{{ old('description_en') }}</textarea>
                                @error('description_en')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="description_ar" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Description (Arabic) <span class="text-red-500">*</span>
                                </label>
                                <textarea name="description_ar" id="description_ar" rows="5"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent"
                                    placeholder="أدخل وصف المنتج باللغة العربية..." required dir="rtl">{{ old('description_ar') }}</textarea>
                                @error('description_ar')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Price & Original Price -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Price <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-2 top-3 text-gray-500">EGP</span>
                                    <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01"
                                        min="0"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent"
                                        placeholder="0.00" required>
                                </div>
                                @error('price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="original_price" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Original Price (Optional)
                                </label>
                                <div class="relative">
                                    <span class="absolute left-2 top-3 text-gray-500">EGP</span>
                                    <input type="number" name="original_price" id="original_price"
                                        value="{{ old('original_price') }}" step="0.01" min="0"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent"
                                        placeholder="0.00">
                                </div>
                                <p class="mt-1 text-xs text-gray-500">For showing discounts</p>
                                @error('original_price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Stock & Status -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="stock" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Stock Quantity <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="stock" id="stock" min="0"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent"
                                    placeholder="0" required>
                                @error('stock')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Status <span class="text-red-500">*</span>
                                </label>
                                <select name="status" id="status"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent"
                                    required>
                                    <option value="new_arrival" {{ old('status') == 'new_arrival' ? 'selected' : '' }}>New Arrival</option>
                                    <option value="best_selling" {{ old('status') == 'best_selling' ? 'selected' : '' }}>Best Selling</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Product Colors -->
                        <div x-data="{ colors: ['#000000'] }">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Product Colors (Optional)
                            </label>
                            <div class="flex flex-wrap gap-4 items-center">
                                <template x-for="(color, index) in colors" :key="index">
                                    <div class="flex items-center space-x-2 bg-gray-50 p-2 rounded-lg border border-gray-200">
                                        <input type="color" :name="'colors[]'" x-model="colors[index]"
                                            class="w-10 h-10 rounded cursor-pointer border-0 p-0 bg-transparent">
                                        <button type="button" @click="colors.splice(index, 1)"
                                            class="text-red-500 hover:text-red-700 transition">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                    </div>
                                </template>
                                <button type="button" @click="colors.push('#000000')"
                                    class="flex items-center space-x-2 px-4 py-2 bg-[#7b8f5a] bg-opacity-10 text-[#7b8f5a] rounded-lg hover:bg-opacity-20 transition">
                                    <i class="fas fa-plus"></i>
                                    <span>Add Color</span>
                                </button>
                            </div>
                            @error('colors')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Main Product Image -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Main Product Image <span class="text-red-500">*</span>
                            </label>
                            
                            <!-- Main Image Upload Area -->
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-[#7b8f5a] transition duration-300 cursor-pointer"
                                 id="dropZone">
                                
                                <div id="imagePreview" class="hidden mb-4">
                                    <img id="previewImg" src="" alt="Preview" class="mx-auto max-h-48 rounded-lg shadow-lg">
                                </div>

                                <div id="uploadPlaceholder">
                                    <div class="w-16 h-16 mx-auto mb-4 bg-[#7b8f5a] bg-opacity-10 rounded-full flex items-center justify-center">
                                        <i class="fas fa-image text-[#7b8f5a] text-3xl"></i>
                                    </div>
                                    <p class="text-gray-700 font-semibold mb-2">Main Image: Click or drop here</p>
                                    <p class="text-sm text-gray-500">Supports JPG, PNG, WebP (Max 5MB)</p>
                                </div>

                                <input type="file" name="image" id="image" accept="image/*" class="hidden" required onchange="previewMainImage(event)">
                            </div>
                            @error('image')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Gallery Images -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Gallery Images (Optional)
                            </label>
                            
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-[#7b8f5a] transition duration-300 cursor-pointer"
                                 id="galleryDropZone">
                                
                                <div id="galleryPreview" class="hidden grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-4 mb-4">
                                    <!-- Dynamic Gallery Previews -->
                                </div>

                                <div id="galleryUploadPlaceholder">
                                    <div class="w-16 h-16 mx-auto mb-4 bg-[#7b8f5a] bg-opacity-10 rounded-full flex items-center justify-center">
                                        <i class="fas fa-images text-[#7b8f5a] text-3xl"></i>
                                    </div>
                                    <p class="text-gray-700 font-semibold mb-2">Gallery: Click or drop multiple images here</p>
                                    <p class="text-sm text-gray-500">Add more views of your product</p>
                                </div>

                                <input type="file" name="gallery[]" id="gallery" accept="image/*" multiple class="hidden" onchange="previewGalleryImages(event)">
                            </div>
                            @error('gallery.*')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Product Dimensions -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-4">
                            <i class="fas fa-ruler-combined mr-2 text-[#7b8f5a]"></i>Product Dimensions (Optional)
                        </label>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label for="width" class="block text-xs font-medium text-gray-600 mb-1">
                                    Width
                                </label>
                                <input type="number" name="width" id="width" value="{{ old('width') }}" step="0.01"
                                    min="0"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent"
                                    placeholder="0.00">
                                @error('width')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="height" class="block text-xs font-medium text-gray-600 mb-1">
                                    Height
                                </label>
                                <input type="number" name="height" id="height" value="{{ old('height') }}" step="0.01"
                                    min="0"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent"
                                    placeholder="0.00">
                                @error('height')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="depth" class="block text-xs font-medium text-gray-600 mb-1">
                                    Depth
                                </label>
                                <input type="number" name="depth" id="depth" value="{{ old('depth') }}" step="0.01"
                                    min="0"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent"
                                    placeholder="0.00">
                                @error('depth')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="dimension_unit" class="block text-xs font-medium text-gray-600 mb-1">
                                    Unit
                                </label>
                                <select name="dimension_unit" id="dimension_unit"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent">
                                    <option value="cm" {{ old('dimension_unit', 'cm') == 'cm' ? 'selected' : '' }}>cm</option>
                                    <option value="m" {{ old('dimension_unit') == 'm' ? 'selected' : '' }}>m</option>
                                    <option value="inch" {{ old('dimension_unit') == 'inch' ? 'selected' : '' }}>inch</option>
                                    <option value="ft" {{ old('dimension_unit') == 'ft' ? 'selected' : '' }}>ft</option>
                                </select>
                                @error('dimension_unit')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <p class="mt-2 text-xs text-gray-500">
                            <i class="fas fa-info-circle mr-1"></i>Enter the product dimensions for shipping and display purposes
                        </p>
                    </div>

                        <!-- Image Preview Scripts -->
                        <script>
                            // Main Image Preview
                            function previewMainImage(event) {
                                const file = event.target.files[0];
                                if (file) {
                                    if (file.size > 5 * 1024 * 1024) {
                                        alert('Main image size must be less than 5MB');
                                        event.target.value = '';
                                        return;
                                    }
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        document.getElementById('previewImg').src = e.target.result;
                                        document.getElementById('imagePreview').classList.remove('hidden');
                                        document.getElementById('uploadPlaceholder').classList.add('hidden');
                                    }
                                    reader.readAsDataURL(file);
                                }
                            }

                            // Gallery Images Preview
                            function previewGalleryImages(event) {
                                const files = event.target.files;
                                const previewContainer = document.getElementById('galleryPreview');
                                const placeholder = document.getElementById('galleryUploadPlaceholder');
                                
                                previewContainer.innerHTML = '';
                                
                                if (files.length > 0) {
                                    previewContainer.classList.remove('hidden');
                                    placeholder.classList.add('hidden');
                                    
                                    Array.from(files).forEach(file => {
                                        const reader = new FileReader();
                                        reader.onload = function(e) {
                                            const div = document.createElement('div');
                                            div.className = 'relative group aspect-square';
                                            div.innerHTML = `
                                                <img src="${e.target.result}" class="w-full h-full object-cover rounded-lg shadow-md">
                                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition rounded-lg flex items-center justify-center">
                                                    <i class="fas fa-check text-white"></i>
                                                </div>
                                            `;
                                            previewContainer.appendChild(div);
                                        }
                                        reader.readAsDataURL(file);
                                    });
                                } else {
                                    previewContainer.classList.add('hidden');
                                    placeholder.classList.remove('hidden');
                                }
                            }

                            // Drag & Drop Setup
                            function setupDragDrop(zoneId, inputId, previewFn) {
                                const zone = document.getElementById(zoneId);
                                const input = document.getElementById(inputId);

                                zone.addEventListener('click', () => input.click());
                                zone.addEventListener('dragover', (e) => {
                                    e.preventDefault();
                                    zone.classList.add('border-[#7b8f5a]', 'bg-[#7b8f5a]/5');
                                });
                                zone.addEventListener('dragleave', () => {
                                    zone.classList.remove('border-[#7b8f5a]', 'bg-[#7b8f5a]/5');
                                });
                                zone.addEventListener('drop', (e) => {
                                    e.preventDefault();
                                    zone.classList.remove('border-[#7b8f5a]', 'bg-[#7b8f5a]/5');
                                    input.files = e.dataTransfer.files;
                                    previewFn({ target: input });
                                });
                            }

                            setupDragDrop('dropZone', 'image', previewMainImage);
                            setupDragDrop('galleryDropZone', 'gallery', previewGalleryImages);
                        </script>

                        <!-- Submit Buttons -->
                        <div class="flex items-center justify-end space-x-4 pt-6 border-t">
                            <a href="{{ route('admin.products.index') }}"
                                class="px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition duration-300">
                                Cancel
                            </a>
                            <button type="submit"
                                class="px-6 py-3 bg-[#7b8f5a] text-white rounded-lg font-semibold hover:bg-[#6c7d4e] transition duration-300 flex items-center space-x-2">
                                <i class="fas fa-save"></i>
                                <span>Create Product</span>
                            </button>
                        </div>
                    </div>

                    
                </form>
            </div>

        </div>
    </div>
@endsection