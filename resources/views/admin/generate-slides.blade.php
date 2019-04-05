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
            <img class="w-1/2" src="{{ asset('/storage/'.$event->venue_logo) }}" alt="">
            <h2>for hosting</h2>
        </section>
        @foreach ($event->sponsors as $sponsor)
            <section>
                <h2>Thanks to</h2>
                <img class="w-1/2" src="{{ asset('/storage/'.$sponsor->logo) }}" alt="">
                <h2>for sponsoring</h2>
            </section>
        @endforeach
        <?php $nextMeetup = $event->meetup->eventAfter($event) ?>
        @if ($nextMeetup)
            <section class="text-left px-12" data-markdown>
                <textarea data-template>
                    ## Our next meetup <span style="color: {{ $event->meetup->color  }}">{{ \Illuminate\Support\Carbon::parse($nextMeetup->name)->format('d/m') }}</span></h2>
                    {{ $nextMeetup->speaker_1_abstract }}

                    @if ($nextMeetup->speaker_2_abstract)
                    {{ $nextMeetup->speaker_2_abstract }}
                    @else
                    **You?**
                    - Contact dries.vints@gmail.com to claim your slot!
                    @endif
                </textarea>
            </section>
        @endif
        <section>
            <h2>Join us</h2>
            <img class="w-1/3" src="{{ asset('images/full-stack-belgium.png') }}" alt="">
            <p>fullstackbelgium.be</p>
        </section>
        <section style="background: url({{ asset('images/fseu-bg.png') }}); background-size: cover;">
            <img class="w-1/2" src="{{ asset('images/fseu.png') }}" alt="">
        </section>
        <section class="text-left px-12">
            <div class="flex">
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
