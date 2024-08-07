<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
<div class="flex flex-col min-h-[100vh]">
    <header class="px-4 lg:px-6 h-14 flex items-center">
        <a class="flex items-center justify-center" href="{{ url('/') }}">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="h-6 w-6"
          >
            <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
            <line x1="16" x2="16" y1="2" y2="6"></line>
            <line x1="8" x2="8" y1="2" y2="6"></line>
            <line x1="3" x2="21" y1="10" y2="10"></line>
          </svg>
            <!-- SVG Logo -->
            <span class="sr-only">{{ config('app.name') }}</span>
        </a>
        <nav class="ml-auto flex gap-4 sm:gap-6">
            @if (Route::has('login'))
                
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-medium hover:underline underline-offset-4">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium hover:underline underline-offset-4">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm font-medium hover:underline underline-offset-4">Register</a>
                    @endif
                @endauth
                
            @endif
            <!-- Dynamically generate navigation links -->
            {{-- <a class="text-sm font-medium hover:underline underline-offset-4" href="#">Features</a>
            <a class="text-sm font-medium hover:underline underline-offset-4" href="#">Pricing</a>
            <a class="text-sm font-medium hover:underline underline-offset-4" href="#">About</a>
            <a class="text-sm font-medium hover:underline underline-offset-4" href="#">Contact</a> --}}
            
        </nav>
    </header>

    <main class="flex-1">
        <section class="w-full pt-12 md:pt-24 lg:pt-32 border-y">
          <div class="px-4 md:px-6 space-y-10 xl:space-y-16">
            <div class="grid max-w-[1300px] mx-auto gap-4 px-4 sm:px-6 md:px-10 md:grid-cols-2 md:gap-16">
              <div>
                <h1 class="lg:leading-tighter text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl xl:text-[3.4rem] 2xl:text-[3.75rem]">
                  Simplify Your Event Management
                </h1>
                <p class="mx-auto max-w-[700px] text-gray-500 md:text-xl dark:text-gray-400 mt-5">
                  {{ config('app.name') }} is your one-stop solution for seamless event planning and management. Get started today!
                </p>
                <div class="space-x-4 mt-5">
                  <a
                    class="inline-flex h-9 items-center justify-center rounded-md bg-gray-900 px-4 py-2 text-sm font-medium text-gray-50 shadow transition-colors hover:bg-gray-900/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-gray-950 disabled:pointer-events-none disabled:opacity-50 dark:bg-gray-50 dark:text-gray-900 dark:hover:bg-gray-50/90 dark:focus-visible:ring-gray-300"
                    href="{{route('events.create')}}"
                  >
                    Get Started
                  </a>
                </div>
              </div>
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="550" height="310" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                  
                  
              </div>
            </div>
          </div>
        </section>
        <section class="w-full py-12 md:py-24 lg:py-32">
          <div class="container space-y-12 px-4 md:px-6">
            <div class="flex flex-col items-center justify-center space-y-4 text-center">
              <div class="space-y-2">
                
                <h2 class="text-3xl font-bold tracking-tighter sm:text-5xl">Discover Exciting Events Near You</h2>
                <p class="max-w-[900px] text-gray-500 md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed dark:text-gray-400">
                  Explore a variety of events hosted by our community, from music festivals to tech conferences.
                </p>
              </div>
            </div>
            <div class="mx-auto grid items-start gap-8 sm:max-w-4xl sm:grid-cols-2 md:gap-12 lg:max-w-5xl lg:grid-cols-3">
              <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
                <div class="flex flex-col space-y-1.5 p-6">
                  <h3 class="text-2xl font-semibold whitespace-nowrap leading-none tracking-tight">Music Festival</h3>
                </div>
                <div class="p-6">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="200" height="200" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-music">
                        <path d="M9 18V5l12-2v13"></path>
                        <circle cx="6" cy="18" r="3"></circle>
                        <circle cx="18" cy="16" r="3"></circle>
                    </svg>
                      
                      
                </div>
              </div>
              <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
                <div class="flex flex-col space-y-1.5 p-6">
                  <h3 class="text-2xl font-semibold whitespace-nowrap leading-none tracking-tight">Tech Conference</h3>
                </div>
                <div class="p-6">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="200" height="200" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu">
                        <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                        <rect x="9" y="9" width="6" height="6"></rect>
                        <line x1="9" y1="1" x2="9" y2="4"></line>
                        <line x1="15" y1="1" x2="15" y2="4"></line>
                        <line x1="9" y1="20" x2="9" y2="23"></line>
                        <line x1="15" y1="20" x2="15" y2="23"></line>
                        <line x1="20" y1="9" x2="23" y2="9"></line>
                        <line x1="20" y1="14" x2="23" y2="14"></line>
                        <line x1="1" y1="9" x2="4" y2="9"></line>
                        <line x1="1" y1="14" x2="4" y2="14"></line>
                    </svg>
                      
                </div>
              </div>
              <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
                <div class="flex flex-col space-y-1.5 p-6">
                  <h3 class="text-2xl font-semibold whitespace-nowrap leading-none tracking-tight">Art Exhibition</h3>
                </div>
                <div class="p-6">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="200" height="200" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-palette">
                        <path d="M2.459 18.534C3.969 21.858 6.053 24 12.001 24c8.837 0 12-7.163 12-12 0-7.732-7.045-13-12-13-6.627 0-9.545 4.732-11.542 8.466"></path>
                        <circle cx="6.5" cy="10.5" r="1"></circle>
                        <circle cx="10.5" cy="7.5" r="1"></circle>
                        <circle cx="13.5" cy="11.5" r="1"></circle>
                        <circle cx="17.5" cy="7.5" r="1"></circle>
                    </svg>
                      
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="w-full py-12 md:py-24 lg:py-32 bg-gray-100 dark:bg-gray-800">
          <div class="container grid items-center justify-center gap-4 px-4 text-center md:px-6">
            <div class="space-y-3">
              <h2 class="text-3xl font-bold tracking-tighter md:text-4xl/tight">What Our Customers Say</h2>
              <p class="mx-auto max-w-[600px] text-gray-500 md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed dark:text-gray-400">
                Hear from our satisfied customers who have transformed their event management with {{ config('app.name') }}.
              </p>
            </div>
            <div class="mx-auto w-full max-w-sm space-y-2">
              <blockquote class="text-lg font-semibold leading-snug lg:text-xl lg:leading-normal xl:text-2xl">
                "{{ config('app.name') }} has revolutionized our event planning process. It's intuitive, easy to use, and has saved us
                countless hours.“
              </blockquote>
              <div>
                <div class="font-semibold">Jane Doe</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">Event Manager, XYZ Corp</div>
              </div>
            </div>
          </div>
        </section>
       
    </main>

    <footer class="flex flex-col gap-2 sm:flex-row py-6 w-full shrink-0 items-center px-4 md:px-6 border-t">
        <p class="text-xs text-gray-500 dark:text-gray-400">
            © {{ now()->year }} {{ config('app.name') }}. All rights reserved.
        </p>
        <nav class="sm:ml-auto flex gap-4 sm:gap-6">
            <a class="text-xs hover:underline underline-offset-4" href="#">Terms of Service</a>
            <a class="text-xs hover:underline underline-offset-4" href="#">Privacy</a>
        </nav>
    </footer>
</div>
</body>
</html>
