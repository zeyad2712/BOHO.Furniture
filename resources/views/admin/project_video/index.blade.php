@extends('admin.layouts.app')

@section('page-title', 'Manage Project Video')

@section('content')
    <div class="p-6">
        <div class="max-w-4xl mx-auto">
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-[#7b8f5a]/10 border-l-4 border-[#7b8f5a] text-[#7b8f5a]">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Current Video Preview -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8" data-aos="fade-up">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800">Current Project Video</h3>
                </div>
                <div class="p-6 flex flex-col items-center">
                    @if($projectVideo)
                        <div class="w-full bg-black rounded-xl overflow-hidden shadow-lg mb-4">
                            <video controls class="w-full h-auto" style="max-height: 400px;">
                                <source src="{{ asset('storage/' . $projectVideo->video_path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="w-full space-y-2">
                            <p class="text-gray-800 font-semibold">Title: {{ $projectVideo->title ?? 'None' }}</p>
                            <p class="text-gray-500 text-sm">Description: {{ $projectVideo->description ?? 'None' }}</p>
                        </div>
                    @else
                        <div
                            class="w-full h-64 bg-gray-50 rounded-xl flex items-center justify-center border-2 border-dashed border-gray-200">
                            <div class="text-center">
                                <i class="fas fa-video text-4xl text-gray-300 mb-2"></i>
                                <p class="text-gray-400">Default video currently active</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Update Form -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden" data-aos="fade-up"
                data-aos-delay="100">
                <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="text-xl font-bold text-gray-800">Upload New Video</h3>
                </div>
                <div class="p-6">
                    <form action="{{ route('admin.project-video.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-6">
                            <!-- File Input -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Select Video (Max: 20MB, Recommended: MP4 format)
                                </label>
                                <input type="file" name="video" required
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#7b8f5a] file:text-white hover:file:bg-[#6c7d4e] transition duration-200">
                                @error('video')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Title -->
                            <!-- <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Section Title</label>
                                <input type="text" name="title" value="{{ $projectVideo->title ?? '' }}"
                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-[#7b8f5a] focus:ring focus:ring-[#7b8f5a] focus:ring-opacity-20 transition duration-200"
                                    placeholder="e.g., Our Latest Projects">
                                @error('title')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div> -->

                            <!-- Description -->
                            <!-- <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Section Description</label>
                                <textarea name="description" rows="4"
                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-[#7b8f5a] focus:ring focus:ring-[#7b8f5a] focus:ring-opacity-20 transition duration-200"
                                    placeholder="Describe your projects...">{{ $projectVideo->description ?? '' }}</textarea>
                                @error('description')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div> -->

                            <!-- Submit -->
                            <div class="pt-4">
                                <button type="submit"
                                    class="w-full bg-[#7b8f5a] text-white font-bold py-3 rounded-xl shadow-lg hover:shadow-xl hover:translate-y-[-2px] transition duration-300 flex items-center justify-center space-x-2">
                                    <i class="fas fa-upload"></i>
                                    <span>Update Project Video</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection