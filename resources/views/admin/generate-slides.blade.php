<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>{{ $event->meetup->name }}</title>

    <link rel="stylesheet" href="/revealjs/css/reset.css">
    <link rel="stylesheet" href="/revealjs/css/reveal.css">
    <link rel="stylesheet" href="/revealjs/css/theme.css">

    <style>
        .reveal a,
        .reveal .controls,
        .reveal .progress {
            color: {{ $event->meetup->color }}
        }

        .reveal .progress {
            bottom: 80px;
            height: 5px;
        }

        .w-2\/5 {
            width: 40%;
        }

        .my-1 {
            margin-top: 0.25rem;
            margin-bottom: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="reveal">
        <div class="slides">
            <section>
                <img class="w-1/2" src="{{ asset('/storage/'.$event->meetup->logo) }}" alt="">
            </section>

            @if ($event->venue)
                <section>
                    <h2>Thanks to</h2>
                    <img class="w-2/5 my-1" src="{{ asset('/storage/'.$event->venue->logo) }}" alt="">
                    <h2>for hosting</h2>
                </section>
            @endif

            @foreach ($event->sponsors as $sponsor)
                <section>
                    <h2>Thanks to</h2>
                    <img class="w-2/5 my-1" style="width: 80%;" src="{{ asset('/storage/'.$sponsor->logo) }}" alt="">
                    <h2>for sponsoring</h2>
                </section>
            @endforeach

            <?php $nextMeetup = $event->meetup->eventAfter($event) ?>

            @if ($nextMeetup)
                <section class="text-left px-12" data-markdown>
                    <textarea class="leading-normal" data-template>
                        ## Our next event <span style="color: {{ $event->meetup->color  }}">{{ $nextMeetup->date->format('d/m') }}</span>@if($nextMeetup->venue)<br><small>at <span style="color: {{ $event->meetup->color  }}">{{ $nextMeetup->venue->name }}</span></small>@endif
                        **{{ $nextMeetup->speaker_1_title }}**<br>
                        &mdash; {{ $nextMeetup->speaker_1_name }}

                        @if ($nextMeetup->speaker_2_abstract)
                        **{{ $nextMeetup->speaker_2_title }}**<br>
                        &mdash; {{ $nextMeetup->speaker_2_name }}
                        @else
                        **You?**<br>
                        &mdash; Contact dries@vints.io to claim your slot!
                        @endif
                    </textarea>
                </section>
            @endif

            @foreach ($otherMeetups as $otherMeetup)
                <?php $nextEvent = $otherMeetup->eventAfter($event) ?>

                @if ($nextEvent)
                    <section class="text-left px-12" data-markdown>
                        <textarea class="leading-normal" data-template>
                            ## Our next <span style="color: {{ $nextEvent->meetup->color }}">{{ str_replace('Full Stack ', '', $otherMeetup->name) }}</span><br>event: <span style="color: {{ $nextEvent->meetup->color }}">{{ $nextEvent->date->format('d/m') }}</span>@if($nextEvent->venue)<br><small>at <span style="color: {{ $nextEvent->meetup->color  }}">{{ $nextEvent->venue->name }}</span></small>@endif
                            **{{ $nextEvent->speaker_1_title }}**<br>
                            &mdash; {{ $nextEvent->speaker_1_name }}

                            @if ($nextEvent->speaker_2_abstract)
                            **{{ $nextEvent->speaker_2_title }}**<br>
                            &mdash; {{ $nextEvent->speaker_2_name }}
                            @else
                            **You?**<br>
                            &mdash; Contact <a href="mailto:dries@vints.io" style="color: {{ $nextEvent->meetup->color }}">dries@vints.io</a> to claim your slot!
                            @endif
                        </textarea>
                    </section>
                @endif
            @endforeach

            <section>
                <h2>Join us</h2>
                <img class="w-1/3" src="{{ asset('images/full-stack-belgium.png') }}" alt="">
                <p>fullstackbelgium.be</p>
            </section>

            <section>
                <img src="{{ asset('images/fseu.png') }}" alt="">
                <h3 style="color: {{ $event->meetup->color }}">bit.ly/fseu22fsbe</h3>
            </section>

            <section>
                <h2>How can you help?</h2>
                <div class="text-left" style="margin-left: 9rem;">
                    <p>📸 Take pictures</p>
                    <p>🐦 Tweet or share a story on Instagram during the event (mention @fullstackbe)</p>
                    <p>💬 Leave a comment on the event page</p>
                    <p>👤 Bring your colleagues and friends!</p>
                </div>
            </section>

            <section class="text-left px-12">
                <div class="flex items-center">
                    <img class="w-1/2" src="{{ asset('/storage/'.$event->meetup->logo) }}" alt="">
                    <div class="ml-auto" style="margin-right: 50px;">
                        <h2>Enjoy!</h2>
                        <p style="color: {{ $event->meetup->color }}">fullstackbelgium.be</p>
                        <p style="color: {{ $event->meetup->color }}">twitter.com/fullstackbe</p>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <footer>
        Full Stack Belgium
    </footer>

    <script src="/revealjs/js/reveal.js"></script>

    <script>
        // More info about config & dependencies:
        // - https://github.com/hakimel/reveal.js#configuration
        // - https://github.com/hakimel/reveal.js#dependencies
        Reveal.initialize({
            dependencies: [
                { src: '/revealjs/plugin/markdown/marked.js' },
                { src: '/revealjs/plugin/markdown/markdown.js' },
            ]
        });
    </script>
</body>
</html>
