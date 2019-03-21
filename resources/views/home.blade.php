@component('layouts.app', ['active' => 'home'])
    <section class="wrapper pb-12">
        <p class="md:w-2/3 text-2xl pb-16 md:pb-24 md:border-b">
            Organising meetups on front-end, back-end, devops and everything in between in the cities of <strong class="font-medium">Antwerp</strong>, <strong class="font-medium">Ghent</strong> and <strong class="font-medium">Brussels</strong>.
        </p>
        <div class="flex flex-col items-end mb-24" style="margin-top: -2.4rem;">
            <div class="w-full md:max-w-min-content">
                <section class="box p-6 md:flex whitespace-no-wrap">
                    <h2 class="mb-2 mr-8 font-bold">
                        Our next meetups
                    </h2>
                    <ol>
                        <li class="flex items-center mb-1">
                            <p class="w-24 mr-2">
                                <span class="uppercase font-medium tracking-wide text-xs text-white bg-antwerp py-1 px-2 rounded-full">
                                    Antwerp
                                </span>
                            </p>
                            <p style="margin-top: 0.2rem">
                                <a href="#" target="_blank"  rel="noopener" title="View on meetup.com">
                                    <time class="font-medium" datetime="2019-03-27">March 27<sup>th</sup></time>
                                    at Spilberg
                                    <span class="inline-block w-4">
                                        {{ svg('meetup') }}
                                    </span>
                                </a>
                            </p>
                        </li>
                        <li class="flex items-center mb-1">
                            <p class="w-24 mr-2">
                                <span class="uppercase font-medium tracking-wide text-xs text-white bg-brussels py-1 px-2 rounded-full">
                                    Brussels
                                </span>
                            </p>
                            <p style="margin-top: 0.2rem">
                                <a href="#" target="_blank"  rel="noopener" title="View on meetup.com">
                                    <time class="font-medium" datetime="2019-03-03">April 3<sup>rd</sup></time>
                                    at BeCode
                                    <span class="inline-block w-4" href="#" target="_blank"  rel="noopener" title="View on meetup.com">
                                        {{ svg('meetup') }}
                                    </span>
                                </a>
                            </p>
                        </li>
                        <li class="flex items-center">
                            <p class="w-24 mr-2">
                                <span class="uppercase font-medium tracking-wide text-xs text-white bg-ghent py-1 px-2 rounded-full">
                                    Ghent
                                </span>
                            </p>
                            <p style="margin-top: 0.2rem">
                                <a href="#" target="_blank"  rel="noopener" title="View on meetup.com">
                                    <time class="font-medium" datetime="2019-03-13">April 10<sup>th</sup></time>
                                    at Code d'Or
                                    <span class="inline-block w-4" href="#" target="_blank"  rel="noopener" title="View on meetup.com">
                                        {{ svg('meetup') }}
                                    </span>
                                </a>
                            </p>
                        </li>
                    </ol>
                </section>
                <p class="mr-1 mt-3 text-xs text-gray-700 text-center md:text-right">
                    Can't join any of our meetups? Hang out with us on <a class="link is-small" href="{{ url('slack') }}">Slack</a> instead!
                </p>
            </div>
        </div>
        <div class="flex items-end">
            <div class="flex-2 mr-4">
                <p class="text-xl">
                    We're always on the lookout for speakers.
                </p>
                <p class="text-gray-700">
                    First time speaker? Prepping a conference talk? All welcome,
                    <a class="link" href="{{ url('contact') }}">get in touch</a>!
                </p>
            </div>
        </div>
    </section>

    <div class="bg-white border-t border-b border-gray-300 pt-24 pb-16">
        <section class="wrapper">
            @include('partials.meetup', ['location' => 'antwerp'])
            <hr class="h-px w-2/3 bg-gray-400 mt-20 mb-24">
            @include('partials.meetup', ['location' => 'brussels'])
            <hr class="h-px w-2/3 bg-gray-400 mt-20 mb-24">
            @include('partials.meetup', ['location' => 'ghent'])
        </section>
    </div>

    <section class="py-8 md:py-24">
        <div class="wrapper text-center">
            <div class="-mx-2 mb-10">
                @component('components.gallery')
                    <ul class="md:flex -mx-px">
                        <li class="flex-1 mb-4 md:mb-0 px-px">
                            <img class="cursor-zoom-in rounded-l-sm" src="{{ url('images/meetups/meetup-dummy-1.jpg') }}" alt="Full Stack Ghent 2019-02-12"
                                data-gallery-item data-src="/images/meetups/meetup-dummy-1.jpg" data-w="1024" data-h="768">
                        </li>
                        <li class="flex-1 mb-4 md:mb-0 px-px">
                            <img class="cursor-zoom-in" src="{{ url('images/meetups/meetup-dummy-2.jpg') }}" alt="Full Stack Ghent 2019-02-12"
                                data-gallery-item data-src="/images/meetups/meetup-dummy-2.jpg" data-w="1024" data-h="768">
                        </li>
                        <li class="flex-1 px-px">
                            <img class="cursor-zoom-in rounded-r-sm" src="{{ url('images/meetups/meetup-dummy-3.jpg') }}" alt="Full Stack Ghent 2019-02-12"
                                data-gallery-item data-src="/images/meetups/meetup-dummy-3.jpg" data-w="2048 " data-h="1536">
                        </li>
                    </ul>
                @endcomponent
            </div>
            <p class="text-2xl mb-4">
                🎉 Thanks to all <strong class="font-bold text-2xl px-2 py-1 bg-white shadow-md rounded-sm">235</strong> attendees for joining last month's meetups! 🎉
            </p>
            <p class="text-gray-700">
                We're always on the lookout for speakers, sponsors and venues for our user groups.
                <br>
                <a class="link is-small" href="{{ url('contact') }}">Talk to us</a> if you want to get involved.
            </p>
        </div>
    </section>

    <section class="bg-white border-t border-b border-gray-300 py-16">
        <div class="wrapper">
            <h2 class="text-center font-bold mb-1">Organised by Dries, Freek and Rias</h2>
            <p class="text-center text-sm text-gray-700 mb-12">Come say hi at our next meetup! 👋</p>
            <ul class="flex flex-wrap justify-center">
                <li class="w-full sm:w-1/2 md:w-1/3 mb-8 md:mb-0 text-center">
                    <img class="inline-block w-24 mb-3 rounded-full border-4 border-white shadow-md" src="{{ url('images/dries.jpg') }}" alt="Headshot of Dries Vints">
                    <p>Dries Vints</p>
                    <p class="text-xs text-gray-600">
                        <a class="link is-small mr-1" href="https://twitter.com/driesvints">@driesvints</a>
                        <a class="link is-small" href="https://driesvints.com">driesvints.com</a>
                    </p>
                </li>
                <li class="w-full sm:w-1/2 md:w-1/3 mb-8 md:mb-0 px-2 text-center">
                    <img class="inline-block w-24 mb-3 rounded-full border-4 border-white shadow-md" src="{{ url('images/freek.jpg') }}" alt="Headshot of Freek Van der Herten">
                    <p>Freek Van der Herten</p>
                    <p class="text-xs text-gray-600">
                        <a class="link is-small mr-1" href="https://twitter.com/freekmurze">@freekmurze</a>
                        <a class="link is-small" href="https://murze.be">murze.be</a>
                    </p>
                </li>
                <li class="w-full sm:w-1/2 md:w-1/3 px-2 text-center">
                    <img class="inline-block w-24 mb-3 rounded-full border-4 border-white shadow-md" src="{{ url('images/rias.jpg') }}" alt="Headshot of Rias Van der Veken">
                    <p>Rias Van der Veken</p>
                    <p class="text-xs text-gray-600">
                        <a class="link is-small mr-1" href="https://twitter.com/riasvdv">@riasvdv</a>
                        <a class="link is-small" href="https://rias.be">rias.be</a>
                    </p>
                </li>
            </ul>
        </div>
    </section>
@endcomponent
