
<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="text-left">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create New Event') }}
            </h2>
        </div>

        <form method="POST" action="{{ route('events.store') }}">
            @csrf
            <!-- Title Field -->
            <input
                type="text"
                name="title"
                placeholder="{{ __('Event Title') }}"
                value="{{ old('title') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-4"
                required
            />

            <!-- Description Field -->
            <textarea
                name="description"
                placeholder="{{ __('Event Description') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-4"
                required
            >{{ old('description') }}</textarea>

            <!-- Date Field -->
            <input
                type="date"
                name="date"
                value="{{ old('date') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-4"
                required
            />

            <!-- Time Field -->
            <input
                type="time"
                name="time"
                value="{{ old('time') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-4"
                required
            />

            <!-- Location Field -->
            <input
                type="text"
                name="location"
                placeholder="{{ __('Event Location') }}"
                value="{{ old('location') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-4"
                required
            />

            <!-- Error Messages -->
            @foreach(['title', 'description', 'date', 'time', 'location'] as $field)
                <x-input-error :messages="$errors->get($field)" class="mt-2" />
            @endforeach

            <!-- Submit Button -->
            <x-primary-button class="mt-4">{{ __('Create Event') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
