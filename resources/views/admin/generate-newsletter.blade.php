<html>
<body>
Dear Meetup members,<br /><br/>
{!! markdownToHtml($event->intro) !!}<br/>
If you want to attend this meetup, please RSVP on <a href="{{ $event->meetup_com_url }}">the event page at meetup.com</a><br/><br />

@if ($event->sponsors->count() > 0)
    <h2>Sponsors</h2>
    @foreach ($event->sponsors as $sponsor)
        @if ($sponsor->pivot->message)
            {!! markdownToHtml($sponsor->pivot->message) !!}<br/>
        @endif
    @endforeach
@endif

<h2>Schedule</h2>
{!! markdownToHtml($event->schedule) !!}<br/>

<div>
    @if ($event->speaker_1_title && $event->speaker_1_name)
        {{ $event->speaker_1_title }} by {{ $event->speaker_1_name }}<br><br>
    @endif
    @if ($event->speaker_1_abstract)
        {!! markdownToHtml($event->speaker_1_abstract) !!}<br>
    @endif
    @if ($event->speaker_1_bio)
        <span>Speaker:</span><br>
        {!! markdownToHtml($event->speaker_1_bio) !!}<br>
    @endif
    @if ($event->speaker_1_length)
        Length: {{ $event->speaker_1_length }}min<br><br>
    @endif
</div>
<br>
<div>
    @if ($event->speaker_2_title && $event->speaker_2_name)
        {{ $event->speaker_2_title }} by {{ $event->speaker_2_name }}<br><br>
    @endif
    @if ($event->speaker_2_abstract)
        {!! markdownToHtml($event->speaker_2_abstract) !!}<br>
    @endif
    @if ($event->speaker_2_bio)
        <span>Speaker:</span><br>
        {!! markdownToHtml($event->speaker_2_bio) !!}<br>
    @endif
    @if ($event->speaker_2_length)
        Length: {{ $event->speaker_2_length }}min<br><br>
    @endif
</div>

<br />

We hope to see you there,
<br />
<br />
<br />
<br />
Dries & Rias
</body>
</html>
