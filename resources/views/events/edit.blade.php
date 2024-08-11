<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="text-left">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Event') }}
            </h2>
        </div>

        <form method="POST" action="{{ route('events.update', $event->id) }}">
            @csrf
            @method('PUT')
            <!-- Title Field -->
            <input
                type="text"
                name="title"
                placeholder="{{ __('Event Title') }}"
                value="{{ old('title', $event->title) }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-4"
                required
            />

            <!-- Description Field -->
            <textarea
                name="description"
                placeholder="{{ __('Event Description') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-4"
                required
            >{{ old('description', $event->description) }}</textarea>

            <!-- Date Field -->
            <input
                type="date"
                name="date"
                value="{{ old('date', $event->date->format('Y-m-d')) }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-4"
                required
            />

            <!-- Time Field -->
            <input
                type="time"
                name="time"
                value="{{ old('time', $event->time) }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-4"
                required
            />

            <!-- Location Field -->
            <input
                type="text"
                name="location"
                placeholder="{{ __('Event Location') }}"
                value="{{ old('location', $event->location) }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-4"
                required
            />

            <!-- Error Messages -->
            @foreach(['title', 'description', 'date', 'time', 'location'] as $field)
                <x-input-error :messages="$errors->get($field)" class="mt-2" />
            @endforeach

            <!-- Submit Button -->
            <x-primary-button class="mt-4">{{ __('Update Event') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
