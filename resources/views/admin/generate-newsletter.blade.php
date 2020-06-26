<html>
<body>
<p>
    <strong>{{ $event->title }} on {{ $event->date()->format('l \t\h\e jS ') }}</strong>
</p>
Dear members,<br>
<br>
{!! $event->augmentedValue('intro') !!}

If you want to attend this event, please RSVP on <a href="{{ meetupUrl($event) }}">the event page at meetup.com</a>. If you cannot attend, <b>please remember to change your RSVP</b>.<br>
<br>
<b>Eventy</b><br>
<br>
We're also happy to announce <a href="https://eventy.io/">Eventy, a new platform for managing your events</a>. Eventy is currently under construction but as soon as it's ready we'll be moving with the user group to our new home. Make sure you <a href="https://eventy.io/">subscribe to the newsletter</a> and <a href="https://twitter.com/eventyio">follow the twitter account</a> to be the first to know when it launches.
<br>
<br>

@if ($event->sponsor_message)
    <p><b>Sponsors</b></p>
    {{ $event->sponsor_message }}
@endif

<p><b>Schedule</b></p>
{!! $event->augmentedValue('event_schedule') !!}<br/>
<br/>
<p><b>Talks</b></p>
@if ($event->speakers)
    @foreach ($event->speakers as $speaker)
        <div>
            @if ($speaker['talk_title'] && $speaker['name'])
                <b>{{ $speaker['talk_title'] }}</b> by {{ $speaker['name'] }}<br /><br />
            @endif
            @if ($speaker['abstract'])
                {!! $speaker['abstract'] !!}<br />
            @endif
            @if ($speaker['bio'])
                {!! str_replace("<div>", "<div><b>Speaker: </b>", $speaker['bio']) !!}<br />
            @endif
            @if ($speaker['length'])
                <b>Length:</b> {{ $speaker['length'] }}min<br /><br />
            @endif
        </div>
        <br />
    @endforeach
@endif
We hope to see you there,<br />
<br />
Dries & Rias
</body>
</html>
