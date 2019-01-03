@component('mail::message')
# Room {{ $room->roomNo }} has been created.

The body of your message.

@component('mail::button', ['url' => url('/rooms/'. $room->id)])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
