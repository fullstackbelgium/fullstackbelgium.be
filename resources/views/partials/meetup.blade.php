<div class="flex">
    <header class="w-1/3">
        <figure class="block w-24 mb-3">
            <a href="https://www.meetup.com/fullstack{{ $location }}" target="_blank" rel="noopener" title="View on meetup.com">
                <img src="{{ url("/svg/full-stack-{$location}.svg") }}" alt="Full Stack {{ ucfirst($location) }}">
            </a>
        </figure>
        <div class="w-full">
            <h2 class="font-bold text-xl">
                <a href="https://www.meetup.com/fullstack{{ $location }}" target="_blank" rel="noopener" title="View on meetup.com">
                    Full Stack {{ ucfirst($location) }}
                    <span class="inline-block w-4" >
                        {{ svg('meetup') }}
                    </span>
                </a>
            </h2>
            <p class="text-sm text-gray-700">
                Every 2<sup>nd</sup> Wednesday of the month
            </p>
        </div>
    </header>
    <div class="flex-1">
        <h3 class="text-sm text-gray-700 mb-2">
            Next meetup:
        </h3>
        <p class="text-xl mb-6">
            <a href="#" target="_blank" rel="noopener" title="View on meetup.com">
                <time class="font-medium" datetime="2019-03-13">April 10<sup>th</sup></time>
                at Code d'Or
                <span class="inline-block w-4" >
                    {{ svg('meetup') }}
                </span>
            </a>
        </p>
        <ol class="mb-6 -ml-2 leading-tight">
            <li class="flex items-start pl-2 py-2">
                <time class="inline-block font-bold text-sm w-16 mt-1/2">19:00</time>
                <p class="flex-1">Doors</p>
            </li>
            <li class="flex items-start pl-2 py-2 bg-gray-200">
                <time class="inline-block font-bold text-sm w-16 mt-1/2">20:00</time>
                <p class="flex-1">
                    Getting started with event sourcing in a Laravel app
                    <br>
                    <span class="text-sm text-gray-700">by Freek Van der Herten</span>
                </p>
            </li>
            <li class="flex items-start pl-2 py-2">
                <time class="inline-block font-bold text-sm w-16 mt-1/2">20:45</time>
                <p class="flex-1">
                    Mingle
                </p>
            </li>
            <li class="flex items-start pl-2 py-2 bg-gray-200">
                <time class="inline-block font-bold text-sm w-16 mt-1/2">21:00</time>
                <p class="flex-1">
                    Connecting microservices with gRPC
                    <br>
                    <span class="text-sm text-gray-700">by Frederick Vanbrabant</span>
                </p>
            </li>
            <li class="flex items-start pl-2 py-2">
                <time class="inline-block font-bold text-sm w-16 mt-1/2">21:45</time>
                <p class="flex-1">
                    Mingle
                </p>
            </li>
        </ol>
        <p>The venue will provide drinks and some small snacks.</p>
    </div>
</div>
