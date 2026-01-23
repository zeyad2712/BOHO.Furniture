@extends('admin.layouts.app')

@section('page-title', 'Contact Messages')

@section('content')
    <div class="min-h-screen py-8" style="background-color: #fefae0;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div data-aos="fade-down" class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold" style="color: #8B4513;">
                        <i class="fas fa-envelope mr-3"></i>Contact Messages
                    </h1>
                    <p class="text-gray-600 mt-2">Manage inquiries from your customers</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="bg-white px-6 py-3 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-3">
                        <span class="text-gray-500 text-sm font-semibold uppercase tracking-wider">New Messages</span>
                        <span
                            class="text-2xl font-bold text-[#7b8f5a]">{{ \App\Models\Contact::where('status', 'new')->count() }}</span>
                    </div>
                </div>
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

            <!-- Messages Grid/List -->
            <div class="grid grid-cols-1 gap-6">
                @forelse($contacts as $contact)
                    <div data-aos="fade-up" data-aos-delay="{{ ($loop->index % 5) * 100 }}"
                        class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition duration-300">
                        <div class="p-6 md:p-8">
                            <div class="flex flex-col md:flex-row md:items-start justify-between gap-6">

                                <!-- Sender Info -->
                                <div class="flex items-start space-x-4">
                                    <div
                                        class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#8B4513] to-[#A0522D] flex items-center justify-center text-white text-2xl font-bold shadow-md">
                                        {{ substr($contact->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-800">{{ $contact->name }}</h3>
                                        <div class="flex flex-col space-y-1 mt-1">
                                            <div class="flex items-center text-gray-500 text-sm">
                                                <i class="fas fa-phone mr-2 text-[#7b8f5a]"></i>
                                                {{ $contact->phone }}
                                            </div>
                                            <div class="flex items-center text-gray-500 text-sm">
                                                <i class="fas fa-clock mr-2 text-[#7b8f5a]"></i>
                                                {{ $contact->created_at->format('M d, Y - H:i') }}
                                                ({{ $contact->created_at->diffForHumans() }})
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Actions & Status -->
                                <div class="flex flex-col items-end gap-3">
                                    <div class="flex items-center space-x-2">
                                        <span class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider
                                                        @if($contact->status == 'new') bg-[#7b8f5a]/10 text-[#7b8f5a] border border-[#7b8f5a]/20
                                                        @elseif($contact->status == 'read') bg-blue-100 text-blue-700 border border-blue-200
                                                        @else bg-purple-100 text-purple-700 border border-purple-200 @endif">
                                            {{ $contact->status }}
                                        </span>
                                    </div>
                                    <div class="flex items-center space-x-2 mt-2">
                                        <!-- Status Update Actions -->
                                        @if($contact->status != 'read')
                                            <form action="{{ route('admin.contacts.update-status', $contact->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="read">
                                                <button type="submit"
                                                    class="bg-blue-50 text-blue-600 px-4 py-2 rounded-xl text-sm font-bold hover:bg-blue-600 hover:text-white transition duration-200">
                                                    Mark Read
                                                </button>
                                            </form>
                                        @endif

                                        @if($contact->status != 'replied')
                                            <form action="{{ route('admin.contacts.update-status', $contact->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="replied">
                                                <button type="submit"
                                                    class="bg-purple-50 text-purple-600 px-4 py-2 rounded-xl text-sm font-bold hover:bg-purple-600 hover:text-white transition duration-200">
                                                    Mark Replied
                                                </button>
                                            </form>
                                        @endif

                                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST"
                                            onsubmit="return confirm('Delete this message?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-50 text-red-600 p-2 rounded-xl hover:bg-red-600 hover:text-white transition duration-200">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Message Content -->
                            <div
                                class="mt-8 p-6 bg-gray-50 rounded-2xl border border-gray-100 italic text-gray-700 leading-relaxed relative">
                                <i class="fas fa-quote-left absolute -top-3 left-4 text-3xl text-gray-200"></i>
                                {{ $contact->message }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-3xl p-20 shadow-xl border border-gray-100 text-center">
                        <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-envelope-open text-gray-300 text-4xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-400">No messages yet</h3>
                        <p class="text-gray-500 mt-2">When customers contact you, messages will appear here.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $contacts->links() }}
            </div>

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