<x-mail::message>

# You have registered for {{ $title }}

**Date:** {{ $date }}

**Location:** {{ $location }}

<x-mail::button :url="config('app.url') . '/events/' . $eventID ">
Event Page
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
