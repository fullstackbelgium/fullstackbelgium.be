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
            <p class="text-sm text-gray-700">
                {{ $meetup->schedule }}
            </p>
        </div>
    </header>
    <div class="flex-1">
        <h3 class="text-sm text-gray-700 mb-2">
            Next meetup:
        </h3>
        @php($nextEvent = $meetup->upcomingEvents->first())
        @if ($nextEvent)
            <p class="text-xl mb-6">
                <a href="{{ $nextEvent->meetup_com_url }}" target="_blank" rel="noopener" title="View on meetup.com">
                    @if ($nextEvent->date->startOfDay() > \Carbon\Carbon::now()->startOfDay())
                        <time class="font-medium" datetime="{!! $nextEvent->date->format('Y-m-d') !!}">{!! $nextEvent->date->format('F j<\s\up>S<\/\s\up>') !!}</time>
                    @else
                        <span class="font-medium">Today!</span>
                    @endif
                    at {{ $nextEvent->venue_name }}
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
        @endif
    </div>
</div>
