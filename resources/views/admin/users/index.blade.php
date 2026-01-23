@extends('admin.layouts.app')

@section('page-title', 'Users Management')

@section('content')
    <div class="min-h-screen py-8" style="background-color: #fefae0;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4" data-aos="fade-down">
                <div>
                    <h1 class="text-3xl font-bold" style="color: #8B4513;">
                        <i class="fas fa-users mr-3"></i>Users Management
                    </h1>
                    <p class="text-gray-600 mt-2">Manage your customers and administrators</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.users.create') }}"
                        class="bg-[#7b8f5a] hover:bg-[#6c7d4e] text-white px-6 py-3 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-3">
                        <i class="fas fa-plus mr-3"></i>
                        Add New Admin
                    </a>
                    <div class="flex items-center space-x-4">
                        <div
                            class="bg-white px-6 py-3 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-3">
                            <span class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Total Users</span>
                            <span class="text-2xl font-bold text-[#8B4513]">{{ $users->total() }}</span>
                        </div>
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

            @if(session('error'))
                <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-r-xl animate-fade-in-down"
                    role="alert">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-3"></i>
                        <p>{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <!-- Admins Section -->
            <h2 class="text-2xl font-bold mb-4 mt-12" style="color: #8B4513;" data-aos="fade-right">
                <i class="fas fa-user-shield mr-2"></i>Administrators
            </h2>
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 mb-12" data-aos="fade-up">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100">
                                <th class="px-6 py-5 text-sm font-bold uppercase tracking-wider text-gray-500">Admin</th>
                                <th class="px-6 py-5 text-sm font-bold uppercase tracking-wider text-gray-500">Contact Info
                                </th>
                                <th class="px-6 py-5 text-sm font-bold uppercase tracking-wider text-gray-500">Joined Date
                                </th>
                                <th class="px-6 py-5 text-sm font-bold uppercase tracking-wider text-gray-500 text-right">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($admins as $admin)
                                <tr class="hover:bg-purple-50/30 transition duration-200">
                                    <td class="px-6 py-5">
                                        <div class="flex items-center space-x-4">
                                            <div
                                                class="w-12 h-12 rounded-2xl bg-gradient-to-br from-purple-600 to-indigo-600 flex items-center justify-center text-white text-xl font-bold shadow-md">
                                                {{ substr($admin->name, 0, 1) }}
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="text-lg font-bold text-gray-800">{{ $admin->name }}</span>
                                                <span
                                                    class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-purple-100 text-purple-700 uppercase tracking-tighter mt-1 w-fit">Admin
                                                    Account</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center text-gray-600">
                                            <i class="fas fa-envelope w-5 text-purple-500"></i>
                                            <span class="text-sm font-medium">{{ $admin->email }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-sm font-semibold text-gray-700">{{ $admin->created_at ? $admin->created_at->format('M d, Y') : 'N/A' }}</span>
                                            <span
                                                class="text-xs text-gray-400">{{ $admin->created_at ? $admin->created_at->diffForHumans() : '' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 text-right">
                                        @if($admin->email !== 'admin@bohofurniture.com')
                                            <form action="{{ route('admin.users.destroy', $admin->id) }}?type=admin" method="POST"
                                                class="inline-block"
                                                onsubmit="return confirm('Are you sure you want to delete this administrator?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition duration-300">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-xs text-gray-400 italic">Protected</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Users Section -->
            <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;" data-aos="fade-right">
                <i class="fas fa-user mr-2"></i>Customers
            </h2>
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100" data-aos="fade-up">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100">
                                <th class="px-6 py-5 text-sm font-bold uppercase tracking-wider text-gray-500">User</th>
                                <th class="px-6 py-5 text-sm font-bold uppercase tracking-wider text-gray-500">Contact Info
                                </th>
                                <th class="px-6 py-5 text-sm font-bold uppercase tracking-wider text-gray-500">Joined Date
                                </th>
                                <th class="px-6 py-5 text-sm font-bold uppercase tracking-wider text-gray-500 text-right">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($users as $user)
                                <tr class="hover:bg-[#7b8f5a]/5 transition duration-200">
                                    <td class="px-6 py-5">
                                        <div class="flex items-center space-x-4">
                                            <div
                                                class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#8B4513] to-[#A0522D] flex items-center justify-center text-white text-xl font-bold shadow-md">
                                                {{ substr($user->name, 0, 1) }}
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="text-lg font-bold text-gray-800">{{ $user->name }}</span>
                                                <span class="text-xs text-gray-400 font-mono">Customer Account</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex flex-col space-y-1">
                                            <div class="flex items-center text-gray-600">
                                                <i class="fas fa-envelope w-5 text-[#7b8f5a]"></i>
                                                <span class="text-sm font-medium">{{ $user->email }}</span>
                                            </div>
                                            <div class="flex items-center text-gray-600">
                                                <i class="fas fa-phone w-5 text-[#7b8f5a]"></i>
                                                <span class="text-sm">{{ $user->phone ?? 'No phone' }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-sm font-semibold text-gray-700">{{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}</span>
                                            <span
                                                class="text-xs text-gray-400">{{ $user->created_at ? $user->created_at->diffForHumans() : '' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 text-right">
                                        <div class="flex items-center justify-end space-x-3">
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                                class="inline-block"
                                                onsubmit="return confirm('Are you sure you want to delete this customer?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition duration-300 shadow-sm {{ $user->id === auth()->id() ? 'opacity-50 cursor-not-allowed' : '' }}"
                                                    title="Delete User" {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-20 text-center">
                                        <div class="flex flex-col items-center">
                                            <div
                                                class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                                <i class="fas fa-user-slash text-gray-300 text-4xl"></i>
                                            </div>
                                            <h3 class="text-xl font-bold text-gray-400">No customers found</h3>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($users->hasPages())
                    <div class="px-6 py-6 bg-gray-50 border-t border-gray-100">
                        {{ $users->links() }}
                    </div>
                @endif
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