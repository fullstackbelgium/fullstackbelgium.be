@if ($event->event_intro)
Dear members,<br/>
<br/>
{!! $event->event_intro !!}<br/>
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
{!! $event->event_schedule !!}<br/>

TALKS<br>
@forelse ($event->speakers as $speaker)
    {{ $speaker['talk_title'] }} by {{ $speaker['name'] }}<br>
    @if ($speaker['abstract'])
        {!! $speaker['abstract'] !!}<br>
    @endif
    @if ($speaker['bio'])
        Speaker: {!! $speaker['bio'] !!}<br>
    @endif
    @if ($speaker['length'])
        Length: {{ $speaker['length'] }}min<br><br>
    @endif
    <br>
@empty
    Want to speak at this event? Contact dries.vints@gmail.com!
@endforelse
