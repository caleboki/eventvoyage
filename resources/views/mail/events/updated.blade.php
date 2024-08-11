<x-mail::message>

# {{ $title }} has been updated!

Click on the Event Page button to see the updated details of this event

**Date:** {{ $date }}

**Location:** {{ $location }}

<x-mail::button :url="config('app.url') . '/events/' . $eventID ">
Event Page
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
