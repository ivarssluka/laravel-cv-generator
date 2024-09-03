@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">Your CVs</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($cvs as $cv)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
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

        <div class="mt-8">
            <a href="{{ route('cvs.create') }}" class="bg-green-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-green-700 transition">Create New CV</a>
        </div>
    </div>
@endsection
