<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        My Events
                    </h2>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
                        @forelse ($userEvents as $event)
                            <a href="{{ route('events.show', $event->id) }}" class="bg-white rounded-lg shadow-lg overflow-hidden block hover:bg-gray-50 transition duration-150 ease-in-out">
                                <div class="p-6">
                                    <h3 class="font-bold text-lg mb-2">{{ $event->title }}</h3>
                                    <p class="text-gray-600 text-sm mb-4">Date: {{ $event->date->format('F d, Y') }}</p>
                                    <p class="text-gray-600 text-sm">Location: {{ $event->location }}</p>
                                </div>
                            </a>
                        @empty
                            <p>You have not created any events yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
