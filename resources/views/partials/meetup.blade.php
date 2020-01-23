@php($nextEvent = $meetup->upcomingEvents->first())
@if ($nextEvent)
<div class="md:flex">
    <header class="md:w-1/3 mb-6 md:mb-0">
        <figure class="block w-24 mb-3">
            <a href="https://www.meetup.com/{{ $meetup->meetup_com_id }}" target="_blank" rel="noopener" title="View on meetup.com">
                <img src="{{ asset('storage/'.$meetup->logo) }}" alt="{{ $meetup->name }}">
            </a>
        </figure>
        <div class="w-full">
            <h2 class="font-bold text-xl">
                <a href="https://www.meetup.com/{{ $meetup->meetup_com_id }}" target="_blank" rel="noopener" title="View on meetup.com">
                    {{ $meetup->name }}
                    <span class="inline-block w-4" >
                        {{ svg('meetup') }}
                    </span>
                </a>
            </h2>
            <div class="my-3">
                <h3 class="text-sm text-gray-700 mb-3">Sponsors</h3>
                @foreach($nextEvent->sponsors as $sponsor)
                    <figure class="w-16 h-16 rounded-full mb-3 bg-gray-200 p-2 border-2 border-gray-200">
                        <a class="flex justify-center items-center w-full h-full" href="{{ $sponsor->url }}" target="_blank" rel="noopener">
                            <img src="{{ asset('storage/'.$sponsor->logo) }}" alt="{{ $sponsor->name }}">
                        </a>
                    </figure>
                @endforeach
                <div class="text-sm">Your logo here? <a href="{{ url('contact') }}#sponsors" class="text-belgium underline">Get in touch!</a></div>
            </div>
        </div>
    </header>
    <div class="flex-1">
        <h3 class="text-sm text-gray-700 mb-2">
            Next event:
        </h3>
        <p class="text-xl mb-6">
            <a href="{{ $nextEvent->meetup_com_url }}" target="_blank" rel="noopener" title="View on meetup.com">
                @if ($nextEvent->date->startOfDay() > \Carbon\Carbon::now()->startOfDay())
                    <time class="font-medium" datetime="{!! $nextEvent->date->format('Y-m-d') !!}">{!! $nextEvent->date->format('F j<\s\up>S<\/\s\up>') !!}</time>
                @else
                    <span class="font-medium">Today!</span>
                @endif
                at {{ $nextEvent->venue->name }}
                <span class="inline-block w-4" >
                    {{ svg('meetup') }}
                </span>
            </a>
        </p>
        <ol class="mb-6 -ml-2 leading-tight">
            @php($schedule = \Illuminate\Support\Carbon::createFromTime(19, 00, 00, "Europe/Brussels"))
            <li class="flex items-start pl-2 py-2">
                <time class="inline-block font-bold text-sm w-16 mt-1/2">{{ $schedule->format('H:i') }}</time>
                <p class="flex-1">Doors</p>
            </li>
            @php($schedule->addHour())
            <li class="flex items-start pl-2 py-2 bg-gray-200">
                <time class="inline-block font-bold text-sm w-16 mt-1/2">{{ $schedule->format('H:i') }}</time>
                <p class="flex-1">
                    {{ $nextEvent->speaker_1_title }}
                    <br>
                    <span class="text-sm text-gray-700">by {{ $nextEvent->speaker_1_name }}</span>
                </p>
            </li>
            @php($schedule->addMinutes($nextEvent->speaker_1_length))
            <li class="flex items-start pl-2 py-2">
                <time class="inline-block font-bold text-sm w-16 mt-1/2">{{ $schedule->format('H:i') }}</time>
                <p class="flex-1">
                    Mingle
                </p>
            </li>
            @php($schedule->addMinutes(15))
            <li class="flex items-start pl-2 py-2 bg-gray-200">
                <time class="inline-block font-bold text-sm w-16 mt-1/2">{{ $schedule->format('H:i') }}</time>
                <p class="flex-1">
                    @if ($nextEvent->speaker_2_title)
                        {{ $nextEvent->speaker_2_title }}
                        <br>
                        <span class="text-sm text-gray-700">by {{ $nextEvent->speaker_2_name }}</span>
                    @else
                        You?
                        <br>
                        <span class="text-sm text-gray-700"><a href="{{ url('contact') }}" class="link">Contact us</a> to claim your slot!</span>
                    @endif
                </p>
            </li>
            @php($schedule->addMinutes($nextEvent->speaker_2_length ?? 30))
            <li class="flex items-start pl-2 py-2">
                <time class="inline-block font-bold text-sm w-16 mt-1/2">{{ $schedule->format('H:i') }}</time>
                <p class="flex-1">
                    Mingle
                </p>
            </li>
        </ol>
        {!! $nextEvent->venue_info !!}
    </div>
</div>
@if (! $loop->last)
    <hr class="h-px w-2/3 bg-gray-400 my-12 md:mt-20 md:mb-24">
@endif
@endif
