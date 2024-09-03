@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">{{ $cv->personalDetails->name }} {{ $cv->personalDetails->surname }}</h2>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-6">
            <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Personal Details</h3>
            <p class="mb-2"><strong>Email:</strong> {{ $cv->personalDetails->email }}</p>
            <p class="mb-2"><strong>Phone Number:</strong> {{ $cv->personalDetails->phone_number }}</p>
            <p class="mb-2"><strong>Address:</strong> {{ $cv->personalDetails->address }}</p>
            <p class="mb-2"><strong>LinkedIn:</strong> <a href="{{ $cv->personalDetails->linkedin }}"
                                                          class="text-blue-600 hover:text-blue-800">{{ $cv->personalDetails->linkedin }}</a>
            </p>
            <p class="mb-2"><strong>GitHub:</strong> <a href="{{ $cv->personalDetails->github }}"
                                                        class="text-blue-600 hover:text-blue-800">{{ $cv->personalDetails->github }}</a>
            </p>
            <p class="mb-2"><strong>Description:</strong> {{ $cv->personalDetails->description }}</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-6">
            <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-100">Education</h3>
            @foreach($cv->education as $education)
                <div class="mb-4">
                    <p class="font-bold mb-2">{{ $education->degree }} at {{ $education->institution }}</p>
                    <p class="mb-2 font-semibold">From: {{ $education->start_date }} to: {{ $education->end_date }}</p>
                </div>
            @endforeach
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-100">Work Experience</h3>
            @foreach($cv->workExperience as $work)
                <div class="mb-4">
                    <p class="font-bold mb-2">{{ $work->position }} at {{ $work->company }}</p>
                    <p class="font-semibold mb-2">From: {{ $work->start_date }} to: {{ $work->end_date }}</p>
                    <p class="mb-2"><strong>Description: </strong>{{ $work->description }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            <a href="{{ route('cvs.pdf', $cv->id) }}"
               class="bg-blue-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition">Download
                PDF</a>
        </div>
    </div>
@endsection
