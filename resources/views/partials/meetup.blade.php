<div class="flex">
    <header class="w-1/3">
        <figure class="block w-24 mb-3">
            <a href="https://www.meetup.com/fullstack{{ $location }}" target="_blank" title="View on meetup.com">
                {{ svg("full-stack-{$location}") }}
            </a>
        </figure>
        <div class="w-full">
            <h2 class="font-bold text-xl">
                <a href="https://www.meetup.com/fullstack{{ $location }}" target="_blank" title="View on meetup.com">
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
        <p class="text-xl mb-8">
            <a href="#" target="_blank" title="View on meetup.com">
                <time class="font-medium" datetime="2019-03-13">April 10<sup>th</sup></time>
                at Code d'Or
                <span class="inline-block w-4" >
                    {{ svg('meetup') }}
                </span>
            </a>
        </p>
        <div class="markup">
            <p>For our second meetup we have two developers from the Antwerp company Spatie speaking. Sebastian De Deyne will introduce a cool new react feature called hooks. Freek Van der Herten will introduce us into the wonderful world of event sourcing.</p>
            <p>A big thanks to Code d'Or for hosting us! They'll provide us with drinks and some small snacks.</p>
        </div>
        {{-- <div class="-mx-8">
            @component('components.gallery')
                <ul class="flex -mx-px">
                    <li class="flex-1 px-px md:mb-0">
                        <img class="cursor-zoom-in" src="{{ url('images/meetups/meetup-dummy-1.jpg') }}"
                            data-gallery-item data-src="/images/meetups/meetup-dummy-1.jpg" data-w="1024" data-h="768">
                    </li>
                    <li class="flex-1 px-px md:mb-0">
                        <img class="cursor-zoom-in" src="{{ url('images/meetups/meetup-dummy-2.jpg') }}"
                            data-gallery-item data-src="/images/meetups/meetup-dummy-2.jpg" data-w="1024" data-h="768">
                    </li>
                    <li class="flex-1 px-px">
                        <img class="cursor-zoom-in" src="{{ url('images/meetups/meetup-dummy-3.jpg') }}"
                            data-gallery-item data-src="/images/meetups/meetup-dummy-3.jpg" data-w="2048 " data-h="1536">
                    </li>
                </ul>
            @endcomponent
        </div> --}}
    </div>
</div>
