<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Events
                </h2>
            </div>
            <div class="mb-6 p-4">
                <div class="flex justify-center gap-4">
                    <x-primary-button id="upcomingBtn">Upcoming Events</x-primary-button>
                    <x-secondary-button id="pastBtn">Past Events</x-secondary-button>
                </div>
            </div>

            <div id="upcomingEvents">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
                    @forelse ($upcomingEvents as $event)
                        <a href="{{ route('events.show', $event->id) }}" class="bg-white rounded-lg shadow-lg overflow-hidden block hover:bg-blue-50 transition duration-150 ease-in-out">
                            <div class="p-6">
                                <h3 class="font-bold text-lg mb-2">{{ $event->title }}</h3>
                                <p class="text-gray-600 text-sm mb-4">Date: {{ $event->date->format('F d, Y') }}</p>
                                <p class="text-gray-600 text-sm mb-4">Time: {{ $event->time }}</p>
                                <p class="text-gray-600 text-sm">Location: {{ $event->location }}</p>
                            </div>
                        </a>
                    @empty
                        <p class="text-gray-600">No upcoming events found.</p>
                    @endforelse
                </div>
            </div>

            <div id="pastEvents" class="hidden">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
                    @forelse ($pastEvents as $event)
                        <a href="{{ route('events.show', $event->id) }}" class="bg-white rounded-lg shadow-lg overflow-hidden block hover:bg-gray-50 transition duration-150 ease-in-out">
                            <div class="p-6">
                                <h3 class="font-bold text-lg mb-2">{{ $event->title }}</h3>
                                <p class="text-gray-600 text-sm mb-4">Date: {{ $event->date->format('F d, Y') }}</p>
                                <p class="text-gray-600 text-sm mb-4">Time: {{ $event->time }}</p>
                                <p class="text-gray-600 text-sm">Location: {{ $event->location }}</p>
                            </div>
                        </a>
                    @empty
                        <p class="text-gray-600">No past events found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('upcomingBtn').addEventListener('click', function() {
            document.getElementById('upcomingEvents').style.display = 'block';
            document.getElementById('pastEvents').style.display = 'none';
        });

        document.getElementById('pastBtn').addEventListener('click', function() {
            document.getElementById('upcomingEvents').style.display = 'none';
            document.getElementById('pastEvents').style.display = 'block';
        });
    </script>
</x-app-layout>
