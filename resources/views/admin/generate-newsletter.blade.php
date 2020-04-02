<html>
<body>
<p>
    <strong>{{ $event->title }} on {{ $event->date()->format('l \t\h\e jS ') }}</strong>
</p>
Dear members,<br>
<br>
{!! \Statamic\Modifiers\Modify::value($event->intro)->markdown() !!}

If you want to attend this event, please RSVP on <a href="{{ meetupUrl($event) }}">the event page at meetup.com</a>. If you cannot attend, <b>please remember to change your RSVP</b>.<br>
<br>
<b>Eventy</b><br>
<br>
We're also happy to announce <a href="https://eventy.io/">Eventy, a new platform for managing your events</a>. Eventy is currently under construction but as soon as it's ready we'll be moving with the user group to our new home. Make sure you <a href="https://eventy.io/">subscribe to the newsletter</a> and <a href="https://twitter.com/eventyio">follow the twitter account</a> to be the first to know when it launches.
<br>
<br>

@if ($event->sponsors->count() > 0)
    <p><b>Sponsors</b></p>
    @foreach ($event->sponsors as $sponsor)
        @if ($sponsor->pivot->message)
            {!! markdownToHtml($sponsor->pivot->message) !!}<br/>
        @endif
    @endforeach
@endif

<p><b>Schedule</b></p>
{!! markdownToHtml($event->schedule) !!}<br/>
<br/>
<p><b>Talks</b></p>
<div>
    @if ($event->speaker_1_title && $event->speaker_1_name)
        <b>{{ $event->speaker_1_title }}</b> by {{ $event->speaker_1_name }}<br /><br />
    @endif
    @if ($event->speaker_1_abstract)
        {!! markdownToHtml($event->speaker_1_abstract) !!}<br />
    @endif
    @if ($event->speaker_1_bio)
        {!! str_replace("<div>", "<div><b>Speaker: </b>", markdownToHtml($event->speaker_1_bio)) !!}<br />
    @endif
    @if ($event->speaker_1_length)
        <b>Length:</b> {{ $event->speaker_1_length }}min<br /><br />
    @endif
</div>
<br />
<div>
    @if ($event->speaker_2_title && $event->speaker_2_name)
        <b>{{ $event->speaker_2_title }}</b> by {{ $event->speaker_2_name }}<br /><br />
    @endif
    @if ($event->speaker_2_abstract)
        {!! markdownToHtml($event->speaker_2_abstract) !!}<br />
    @endif
    @if ($event->speaker_2_bio)
        {!! str_replace("<div>", "<div><b>Speaker: </b>", markdownToHtml($event->speaker_2_bio)) !!}<br />
    @endif
    @if ($event->speaker_2_length)
        <b>Length:</b> {{ $event->speaker_2_length }}min<br /><br />
    @endif
</div>
<br />
We hope to see you there,<br />
<br />
Dries & Rias
</body>
</html>
