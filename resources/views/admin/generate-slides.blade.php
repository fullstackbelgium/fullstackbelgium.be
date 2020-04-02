@php($group = \Statamic\Facades\Entry::find($event->group))
@php($sponsor = \Statamic\Facades\Entry::find($event->sponsor))
@php($venue = \Statamic\Facades\Entry::find($event->venue))
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>{{ $group->title }}</title>

    <link rel="stylesheet" href="/revealjs/css/reset.css">
    <link rel="stylesheet" href="/revealjs/css/reveal.css">
    <link rel="stylesheet" href="/revealjs/css/theme.css">

    <style>
        .reveal a,
        .reveal .controls,
        .reveal .progress {
            color: {{ $group->color }}
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
                <img class="w-1/2" src="{{ $group->augmentedValue('logo')->value()->url() }}" alt="">
            </section>

            @if ($event->venue)
                <section>
                    <h2>Thanks to</h2>
                    <img class="w-2/5 my-1" src="{{ optional($venue->augmentedValue('logo')->value())->url() }}" alt="">
                    <h2>for hosting</h2>
                </section>
            @endif

            @if ($event->sponsor)
                <section>
                    <h2>Thanks to</h2>
                    <img class="w-2/5 my-1" style="width: 80%;" src="{{ optional($sponsor->augmentedValue('logo')->value())->url() }}" alt="">
                    <h2>for sponsoring</h2>
                </section>
            @endif

            @php(
                $nextEvent = \Statamic\Facades\Entry::query()
                    ->where('collection', 'events')
                    ->where('date', '>', $event->date())
                    ->where('group', $event->group)
                    ->first()
            )
            @if ($nextEvent)
                <section class="text-left px-12" data-markdown>
                    <textarea class="leading-normal" data-template>
                        ## Our next event <span style="color: {{ $group->color  }}">{{ $nextEvent->date()->format('d/m') }}</span>@if($nextEvent->venue)<br><small>at <span style="color: {{ $group->color  }}">{{ \Statamic\Facades\Entry::find($nextEvent->venue)->title }}</span></small>@endif
                        @foreach ($nextEvent->speakers as $speaker)
                        **{{ $speaker['talk_title'] }}**<br>
                        &mdash; {{ $speaker['name'] }}
                        @endforeach
                        @if (count($nextEvent->speakers) < 2)
                        **You?**<br>
                        &mdash; Contact dries.vints@gmail.com to claim your slot!
                        @endif
                    </textarea>
                </section>
            @endif

            @foreach ($otherGroups as $otherGroup)
                @php(
                    $nextEvent = \Statamic\Facades\Entry::query()
                        ->where('collection', 'events')
                        ->where('group', $otherGroup->id())
                        ->where('date', '>=', now())
                        ->first()
                )

                @if ($nextEvent)
                    <section class="text-left px-12" data-markdown>
                        <textarea class="leading-normal" data-template>
                            ## Our next <span style="color: {{ $otherGroup->color }}">{{ str_replace('Full Stack ', '', $otherGroup->title) }}</span><br>event: <span style="color: {{ $otherGroup->color }}">{{ $nextEvent->date()->format('d/m') }}</span>@if($nextEvent->venue)<br><small>at <span style="color: {{ $otherGroup->color  }}">{{ \Statamic\Facades\Entry::find($nextEvent->venue)->title }}</span></small>@endif
                            @foreach ($nextEvent->speakers as $speaker)
                            **{{ $speaker['talk_title'] }}**<br>
                            &mdash; {{ $speaker['name'] }}
                            @endforeach
                            @if (count($nextEvent->speakers) < 2)
                            **You?**<br>
                            &mdash; Contact dries.vints@gmail.com to claim your slot!
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
            </section>

            <section>
                <img src="{{ asset('images/eventy.png') }}" alt="">
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
                    <img class="w-1/2" src="{{ optional($group->augmentedValue('logo')->value())->url() }}" alt="">
                    <div class="ml-auto" style="margin-right: 50px;">
                        <h2>Enjoy!</h2>
                        <p style="color: {{ $group->color }}">fullstackbelgium.be</p>
                        <p style="color: {{ $group->color }}">twitter.com/fullstackbe</p>
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
