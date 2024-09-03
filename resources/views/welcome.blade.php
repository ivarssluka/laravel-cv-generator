<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Your Professional CV</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50 bg-white text-gray-900">

<nav class="bg-white dark:bg-black shadow-md">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-900 dark:text-white">CV Builder</a>

        <div>
            @if (Route::has('login'))
                <div class="space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-900 dark:text-white">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                           class="text-gray-900 dark:text-white hover:text-gray-700">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="bg-green-600 text-white py-2 px-4 rounded-full shadow-md hover:bg-green-700 transition">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>

<section class="bg-gradient-to-r from-green-500 to-teal-600 text-white">
    <div class="container mx-auto px-6 py-16 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-4">Create Your Professional CV</h1>
        <p class="text-xl mb-8">Stand out with a beautifully crafted resume that highlights your skills and
            experience</p>
        <a href="{{ route('register') }}"
           class="bg-white text-green-600 py-3 px-6 rounded-full font-semibold shadow-md hover:bg-gray-200 transition">Start
            Building Now</a>
    </div>
</section>

<section class="container mx-auto px-6 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold">Why Choose Our CV Builder?</h2>
        <p class="text-gray-600">Everything you need to create the perfect CV</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <div class="mb-4">
                <svg class="w-12 h-12 mx-auto text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold mb-2">Easy to Use</h3>
            <p class="text-gray-600">Create a CV in minutes with our user-friendly interface.</p>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <div class="mb-4">
                <svg class="w-12 h-12 mx-auto text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 12h.01M20 12c0 4.418-3.582 8-8 8s-8-3.582-8-8c0-4.418 3.582-8 8-8s8 3.582 8 8z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold mb-2">Professional Templates</h3>
            <p class="text-gray-600">Choose from a variety of professionally designed templates.</p>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <div class="mb-4">
                <svg class="w-12 h-12 mx-auto text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M7 8h10M7 12h10m-9 4h9"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold mb-2">Customizable</h3>
            <p class="text-gray-600">Personalize your CV to fit your unique style and needs.</p>
        </div>
    </div>
</section>

<section class="bg-gray-100 py-16">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold">What Our Users Say</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <p class="text-gray-600 mb-4">"Creating my CV was so easy and the final result was simply outstanding.
                    Landed my dream job!"</p>
                <h4 class="font-bold">John Doe</h4>
                <p class="text-gray-600 text-sm">Marketing Specialist</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6">
                <p class="text-gray-600 mb-4">"The templates are beautiful and the process is super intuitive. Highly
                    recommended!"</p>
                <h4 class="font-bold">Jane Smith</h4>
                <p class="text-gray-600 text-sm">Graphic Designer</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-green-600 text-white py-16">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Create Your CV?</h2>
        <p class="text-xl mb-8">Join thousands of professionals who trust our CV builder.</p>
        <a href="{{ route('register') }}"
           class="bg-white text-green-600 py-3 px-6 rounded-full font-semibold shadow-md hover:bg-gray-200 transition">Start
            Your CV Now</a>
    </div>
</section>

</body>
</html>
