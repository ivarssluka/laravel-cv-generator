<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Message -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-semibold mb-4">{{ __("Welcome back,") }} {{ Auth::user()->name }}!</h3>
                    <p class="mb-4">{{ __("You're logged in! Here you can manage your CVs, update your profile, and more.") }}</p>
                    <a href="{{ route('cvs.create') }}" class="bg-green-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-green-700 transition">Create New CV</a>
                </div>
            </div>

            <!-- CV List Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-semibold mb-4">{{ __("Your CVs") }}</h3>

                    @if($cvs->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">You have not created any CVs yet.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($cvs as $cv)
                                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-6">
                                    <h3 class="text-2xl font-bold mb-2">{{ $cv->personalDetails->name }} {{ $cv->personalDetails->surname }}</h3>
                                    <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $cv->personalDetails->email }}</p>
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('cvs.show', $cv->id) }}" class="text-green-600 hover:text-green-800 font-semibold">View</a>
                                        <a href="{{ route('cvs.edit', $cv->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold">Edit</a>
                                        <form action="{{ route('cvs.destroy', $cv->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
