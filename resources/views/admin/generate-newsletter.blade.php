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

{!! markdownToHtml($event->speaker_1_abstract) !!}<br/>
{!! markdownToHtml($event->speaker_2_abstract) !!}<br/>

<br />

We hope to see you there,
<br />
<br />
<br />
<br />
<br />
Dries & Rias
</body>
</html>
