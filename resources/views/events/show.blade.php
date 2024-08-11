<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="text-left">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $event->title }}
            </h2>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-4">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Event Details
                </h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <!-- Description -->
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Description
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $event->description }}
                        </dd>
                    </div>
                    <!-- Date -->
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Date
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $event->date->format('F d, Y') }}
                        </dd>
                    </div>
                    <!-- Time -->
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Time
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $event->time }}
                        </dd>
                    </div>
                    <!-- Location -->
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Location
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $event->location }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Registration and Edit Button -->
        <div class="mt-5 flex justify-start space-x-4">
            @if(auth()->id() === $event->user_id)
                <a href="{{ route('events.edit', $event->id) }}" class="inline-flex items-center px-4 py-2 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                    Edit
                </a>
            
            @endif

            @if($event->isUserRegistered(auth()->id()))
                @php
                    $registration = $event->registrations()->where('user_id', auth()->id())->first();
                @endphp
                <form action="{{ route('registrations.destroy', $registration->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    
                    <x-danger-button>
                        {{ __('Unregister') }}
                    </x-danger-button>
                </form>
            @else
                <form action="{{ route('registrations.store') }}" method="POST" class="inline">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    {{-- <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition">
                        Register
                    </button> --}}
                    <x-primary-button>{{ __('Register') }}</x-primary-button>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>
