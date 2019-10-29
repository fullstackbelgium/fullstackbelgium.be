@if ($event->intro)
Dear members,<br/>
<br/>
{!! $event->intro !!}<br/>
We hope to see you soon,<br/>
Dries & Rias<br/>
<br>
PS: Please remember to change your RSVP if you cannot attend.<br>
@else
More info about the event soon...<br>
@endif
<br>
EVENTY<br>
<br>
    We're also happy to announce <a href="https://eventy.io/">Eventy, a new platform for managing your events</a>. Eventy is currently under construction but as soon as it's ready we'll be moving with the user group to our new home. Visit https://eventy.io to subscribe to the newsletter and follow the twitter account at https://twitter.com/eventyio to be the first to know when it launches.
    <br/>
<br/>
SCHEDULE<br>
{!! $event->schedule !!}<br/>

TALKS<br>
@if (!$event->speaker_1_title && !$event->speaker_2_title)
Want to speak at this event? Contact dries.vints@gmail.com!
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
