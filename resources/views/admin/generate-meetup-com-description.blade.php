@if ($event->intro)
Dear meetup members,<br/>
<br/>
{!! $event->intro !!}<br/>
We hope to see you soon,<br/>
Dries & Rias<br/>
<br>
PS: Please remember to change your RSVP if you cannot attend.<br>
@else
More info about the meetup soon...<br>
@endif
<br/>
SCHEDULE<br>
{!! $event->schedule !!}<br/>

TALKS<br>
@if (!$event->speaker_1_title && !$event->speaker_2_title)
Want to speak at this meetup? Contact dries.vints@gmail.com!
@endif
@if ($event->speaker_1_title && $event->speaker_1_name)
{{ $event->speaker_1_title }} by {{ $event->speaker_1_name }}<br>
@endif
@if ($event->speaker_1_abstract)
{!! $event->speaker_1_abstract !!}<br>
@endif
@if ($event->speaker_1_bio)
Speaker: {!! $event->speaker_1_bio !!}<br>
@endif
@if ($event->speaker_1_length)
Length: {{ $event->speaker_1_length }}min<br><br>
@endif
<br>
@if ($event->speaker_2_title && $event->speaker_2_name)
{{ $event->speaker_2_title }} by {{ $event->speaker_2_name }}<br>
@endif
@if ($event->speaker_2_abstract)
{!! $event->speaker_2_abstract !!}<br>
@endif
@if ($event->speaker_2_bio)
Speaker: {!! $event->speaker_2_bio !!}<br>
@endif
@if ($event->speaker_2_length)
Length: {{ $event->speaker_2_length }}min<br><br>
@endif
