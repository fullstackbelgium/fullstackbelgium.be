<html>
<body>
Dear Meetup members,

{!! markdownToHtml($event->intro) !!}<br/>
{!! markdownToHtml($event->sponsors) !!}<br/>

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
Dries, Rias & Freek
</body>
</html>