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
    </style>
</head>
<body>
    <div class="reveal">
        <div class="slides">
            <section>
                <img class="w-1/2" src="{{ asset('/storage/'.$event->meetup->logo) }}" alt="">
            </section>
            <section>
                <h2>Thanks to</h2>
                <img class="w-2/5" src="{{ asset('/storage/'.$event->venue_logo) }}" alt="">
                <h2>for hosting</h2>
            </section>

            @foreach ($event->sponsors as $sponsor)
                <section>
                    <h2>Thanks to</h2>
                    <img class="w-2/5" src="{{ asset('/storage/'.$sponsor->logo) }}" alt="">
                    <h2>for sponsoring</h2>
                </section>
            @endforeach

            <?php $nextMeetup = $event->meetup->eventAfter($event) ?>

            @if ($nextMeetup)
                <section class="text-left px-12" data-markdown>
                    <textarea class="leading-normal" data-template>
                        ## Our next meetup <span style="color: {{ $event->meetup->color  }}">{{ $nextMeetup->date->format('d/m') }}</span> <small>at <span style="color: {{ $event->meetup->color  }}">{{ $nextMeetup->venue_name }}</span></small>
                        **{{ $nextMeetup->speaker_1_title }}**<br>
                        &mdash; {{ $nextMeetup->speaker_1_name }}

                        @if ($nextMeetup->speaker_2_abstract)
                        **{{ $nextMeetup->speaker_2_title }}**<br>
                        &mdash; {{ $nextMeetup->speaker_2_name }}
                        @else
                        **You?**<br>
                        &mdash; Contact dries.vints@gmail.com to claim your slot!
                        @endif
                    </textarea>
                </section>
            @endif

            @foreach ($otherMeetups as $otherMeetup)
                <?php $nextEvent = $otherMeetup->eventAfter($event) ?>

                @if ($nextEvent)
                    <section class="text-left px-12" data-markdown>
                        <textarea class="leading-normal" data-template>
                            ## Our next <span style="color: {{ $nextEvent->meetup->color }}">{{ str_replace('Full Stack ', '', $otherMeetup->name) }}</span><br>meetup: <span style="color: {{ $nextEvent->meetup->color }}">{{ $nextEvent->date->format('d/m') }}</span><br><small>at <span style="color: {{ $nextEvent->meetup->color  }}">{{ $nextEvent->venue_name }}</span></small>
                            **{{ $nextEvent->speaker_1_title }}**<br>
                            &mdash; {{ $nextEvent->speaker_1_name }}

                            @if ($nextEvent->speaker_2_abstract)
                            **{{ $nextEvent->speaker_2_title }}**<br>
                            &mdash; {{ $nextEvent->speaker_2_name }}
                            @else
                            **You?**<br>
                            &mdash; Contact <a href="mailto:dries.vints@gmail.com" style="color: {{ $nextEvent->meetup->color }}">dries.vints@gmail.com</a> to claim your slot!
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

            <section style="background: url({{ asset('images/fseu-bg.png') }}); background-size: cover;">
                <img class="w-1/2" src="{{ asset('images/fseu.png') }}" alt="">
            </section>

            <section>
                <h2>Full Stack Europe</h2>
                <p>With talks about...</p>
                <p>
                    Serverless, React, Machine Learning, Chatbots, JavaScript, Application Architecture, Type Hints, Microservices, Linux, Graph Databases, Varnish and much more...
                </p>
                <p>fullstackeurope.com</p>
            </section>

            <section>
                <h2>FSEU ❤️ FSBE</h2>
                <h2>€100 Discount</h2>
                <h2 style="text-transform: lowercase">bit.ly/fullstackeughent</h2>
            </section>

            <section>
                <h2>How can you help?</h2>
                <div class="text-left" style="margin-left: 9rem;">
                    <p>📸 Take pictures</p>
                    <p>🐦 Tweet during the meetup</p>
                    <p>💬 Leave a comment on meetup.com</p>
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
