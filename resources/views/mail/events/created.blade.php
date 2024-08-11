<x-mail::message>

# {{ $title }} has been created!

**Congratulations!** Now, it's time to share your beautiful new event page and invite your guests.

**Date:** {{ $date }}

**Location:** {{ $location }}

<x-mail::button :url="config('app.url') . '/events/' . $eventID ">
Event Page
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
