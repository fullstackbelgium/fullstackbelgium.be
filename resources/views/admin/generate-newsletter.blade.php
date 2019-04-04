<html>
<body>
Dear Meetup members,<br /><br/>
{!! markdownToHtml($event->intro) !!}<br/>
If you want to attend this meetup, please RSVP on <a href="{{ $event->meetup_com_url }}">the event page at meetup.com</a><br/><br />

<h2>Sponsors</h2>
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
Dries & Rias
</body>
</html>
