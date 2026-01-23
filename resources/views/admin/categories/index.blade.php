@extends('admin.layouts.app')

@section('page-title', 'Categories Management')

@section('content')
    <div class="min-h-screen py-8" style="background-color: #fefae0;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4" data-aos="fade-down">
                <div>
                    <h1 class="text-3xl font-bold" style="color: #8B4513;">
                        <i class="fas fa-tags mr-3"></i>Categories
                    </h1>
                    <p class="text-gray-600 mt-2">Manage your furniture categories and organization</p>
                </div>
                <a href="{{ route('admin.categories.create') }}"
                    class="inline-flex items-center px-6 py-3 bg-[#7b8f5a] hover:bg-[#6c7d4e] text-white font-bold rounded-xl transition duration-300 shadow-lg shadow-[#7b8f5a]/20">
                    <i class="fas fa-plus mr-2"></i>
                    Create Category
                </a>
            </div>

            <!-- Feedback Messages -->
            @if(session('success'))
                <div class="mb-6 bg-[#7b8f5a]/10 border-l-4 border-[#7b8f5a] text-[#7b8f5a] p-4 rounded-r-xl animate-fade-in-down"
                    role="alert">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-3"></i>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-r-xl animate-fade-in-down"
                    role="alert">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-3"></i>
                        <p>{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <!-- Categories Table Card -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100" data-aos="fade-up">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100">
                                <th class="px-6 py-5 text-sm font-bold uppercase tracking-wider text-gray-500">Icon</th>
                                <th class="px-6 py-5 text-sm font-bold uppercase tracking-wider text-gray-500">Name</th>
                                <th class="px-6 py-5 text-sm font-bold uppercase tracking-wider text-gray-500">Description
                                </th>
                                <th class="px-6 py-5 text-sm font-bold uppercase tracking-wider text-gray-500">Products</th>
                                <th class="px-6 py-5 text-sm font-bold uppercase tracking-wider text-gray-500">Status</th>
                                <th class="px-6 py-5 text-sm font-bold uppercase tracking-wider text-gray-500 text-right">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($categories as $category)
                                <tr class="hover:bg-[#7b8f5a]/5 transition duration-200">
                                    <td class="px-6 py-5">
                                        <div
                                            class="w-12 h-12 rounded-2xl bg-gray-100 flex items-center justify-center text-[#8B4513] text-xl">
                                            <i class="fas fa-{{ $category->icon ?? 'folder' }}"></i>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex flex-col">
                                            <span class="text-lg font-bold text-gray-800">{{ $category->name }}</span>
                                            <span class="text-xs text-gray-400 font-mono">{{ $category->slug }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <p class="text-sm text-gray-500 line-clamp-2 max-w-xs italic">
                                            {{ $category->description ?? 'No description provided' }}
                                        </p>
                                    </td>
                                    <td class="px-6 py-5">
                                        <span
                                            class="px-4 py-1.5 rounded-full bg-blue-50 text-blue-600 font-bold text-sm border border-blue-100">
                                            {{ $category->products_count }} Products
                                        </span>
                                    </td>
                                    <td class="px-6 py-5">
                                        @if($category->is_active)
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-bold bg-[#7b8f5a]/10 text-[#7b8f5a] border border-[#7b8f5a]/20">
                                                <span class="w-2 h-2 rounded-full bg-[#7b8f5a] mr-2 animate-pulse"></span>
                                                Active
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-bold bg-gray-100 text-gray-500 border border-gray-200">
                                                <span class="w-2 h-2 rounded-full bg-gray-400 mr-2"></span>
                                                Inactive
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-5 text-right">
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="w-10 h-10 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center hover:bg-orange-600 hover:text-white transition duration-300 shadow-sm"
                                                title="Edit Category">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                                class="inline-block"
                                                onsubmit="return confirm('Are you sure you want to delete this category? This action cannot be undone.')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition duration-300 shadow-sm"
                                                    title="Delete Category">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-20 text-center">
                                        <div class="flex flex-col items-center">
                                            <div
                                                class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                                <i class="fas fa-folder-open text-gray-300 text-4xl"></i>
                                            </div>
                                            <h3 class="text-xl font-bold text-gray-400">No categories found</h3>
                                            <p class="text-gray-400 mt-2">Start by creating your first product category.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($categories->hasPages())
                    <div class="px-6 py-6 bg-gray-50 border-t border-gray-100">
                        {{ $categories->links() }}
                    </div>
                @endif
            </div>

            <!-- Quick Stats Row -->


        </div>
    </div>

    <style>
        @keyframes fade-in-down {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-down {
            animation: fade-in-down 0.5s ease-out;
        }
    </style>
@endsection