<html>
<body>
Dear Meetup members,

{!! markdownToHtml($event->intro) !!}
{!! markdownToHtml($event->sponsors) !!}

<h2>Schedule</h2>
{!! markdownToHtml($event->schedule) !!}
{!! markdownToHtml($event->speaker_1_abstract) !!}
{!! markdownToHtml($event->speaker_2_abstract) !!}

<br />

We hope to see you there,
<br />
<br />
<br />
<br />
<br />
Dries, Rias & Freek
</body>
</html>