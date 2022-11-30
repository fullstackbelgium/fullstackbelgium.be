<html>
<body>
<p>
    <strong>{{ $event->determineMeetupComName() }} on {{ $event->date->format('l \t\h\e jS ') }}</strong>
</p>
Dear members,<br>
<br>
{!! markdownToHtml($event->intro) !!}<br>
<br>
If you want to attend this event, please RSVP on <a href="{{ $event->meetup_com_url }}">the event page at meetup.com</a>. If you cannot attend, <b>please remember to change your RSVP</b>.<br>
<br />
We hope to see you there,<br />
<br />
Dries, Rias & Freek
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
</body>
</html>
