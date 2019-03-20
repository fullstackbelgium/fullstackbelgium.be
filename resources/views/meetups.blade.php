@component('layouts.app', [
    'title' => 'Meetups',
    'active' => 'meetups',
])
    <div class="wrapper">
        <h1 class="h1">Meetups</h1>
        <div class="box pb-0 overflow-hidden border-t-4 border-antwerp mb-12 z-10">
            <header class="flex flex-col md:flex-row items-center mb-8 md:-ml-2">
                <figure class="block w-24 mb-4 md:mb-0 md:mr-4">
                    {{ svg('full-stack-antwerp') }}
                </figure>
                <div class="w-full">
                    <h2 class="font-bold text-xl">
                        Full Stack Antwerp
                        <a class="inline-block w-4" href="https://www.meetup.com/fullstackghent/" target="_blank" title="View on meetup.com">
                            {{ svg('meetup') }}
                        </a>
                    </h2>
                    <p class="text-sm text-gray-700">
                        Every 2<sup>nd</sup> Wednesday of the month
                    </p>
                </div>
            </header>
            <h3 class="text-sm text-gray-700 mb-2">
                Next meetup:
            </h3>
            <p class="text-xl mb-8">
                <time class="font-medium" datetime="2019-03-13">April 10<sup>th</sup></time>
                at Code d'Or
                <a class="inline-block w-4" href="#" target="_blank" title="View on meetup.com">
                    {{ svg('meetup') }}
                </a>
            </p>
            <div class="whitespace-pre-line mb-6"><!--
                -->For our second meetup we have two developers from the Antwerp company Spatie speaking. Sebastian De Deyne will introduce a cool new react feature called hooks. Freek Van der Herten will introduce us into the wonderful world of event sourcing.

                A big thanks to Code d'Or for hosting us! They'll provide us with drinks and some small snacks.
            </div>
            <details>
                <summary class="text-belgium mb-8 inline-block focus:outline-none focus:bg-yellow">
                    <span class="link is-small text-sm">Details</span>
                </summary>
                <div class="whitespace-pre-line mb-8"><!--
                    -->SCHEDULE
                    19:00 Doors
                    20:00 Talks

                    TALKS
                    Getting started with event sourcing in a Laravel app by Freek Van der Herten

                    In an event sourced app you're storing each event that happens within your app and derive all state from those events.

                    In this practical talk you'll get an intro on what event sourcing is and what the benefits are. After that we'll dive in the Laravel ecosystem and review two packages: laravel-event-projector and EventSauce.

                    Speaker: Freek Van der Herten is a developer and partner at Spatie. The Antwerp based company has an open source first mentality and has released many Laravel, PHP and JavaScript packages, which have been downloaded more than 25 million times. After hours Freek runs https://ohdear.app and co-organises the Full Stack Europe conference.

                    Length: 45 minutes

                    React Hooks With Cocktails by Sebastian De Deyne

                    A few months ago, the React team introduced "Hooks", a new way use various React features with plain functions instead of ES6 class components. In this live-coding session, we'll build a cocktail recipe database to walk through some React basic concepts and introduce Hooks.

                    Cocktails not included, but here's what you'll learn:

                    - How to use hooks to manage component state
                    - How to use hooks for simple side effects
                    - How to use hooks for data fetching
                    - How to write a custom hook

                    Prior React knowledge isn't necessary, but any experience with a modern front-end framework is welcome.

                    Speaker: Sebastian is a backend-turned-frontend developer and designer at Spatie. He has a broad spectrum of interests, ranging from PHP to JavaScript, CSS, and more exotic languages like Elixir.

                    Length: 30-45 minutes
                </div>
            </details>
            <div class="-mx-8">
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
            </div>
        </div>
        <div class="box pb-0 overflow-hidden border-t-4 border-brussels mb-8 md:mb-12">
            <header class="flex flex-col md:flex-row items-center mb-8 md:-ml-2">
                <figure class="block w-24 mb-4 md:mb-0 md:mr-4">
                    {{ svg('full-stack-brussels') }}
                </figure>
                <div class="w-full">
                    <h2 class="font-bold text-xl">
                        Full Stack Brussels
                        <a class="inline-block w-4" href="https://www.meetup.com/fullstackghent/" target="_blank" title="View on meetup.com">
                            {{ svg('meetup') }}
                        </a>
                    </h2>
                    <p class="text-sm text-gray-700">
                        Every 2<sup>nd</sup> Wednesday of the month
                    </p>
                </div>
            </header>
            <h3 class="text-sm text-gray-700 mb-2">
                Next meetup:
            </h3>
            <p class="text-xl mb-8">
                <time class="font-medium" datetime="2019-03-13">April 10<sup>th</sup></time>
                at Code d'Or
                <a class="inline-block w-4" href="#" target="_blank" title="View on meetup.com">
                    {{ svg('meetup') }}
                </a>
            </p>
            <div class="whitespace-pre-line mb-6"><!--
                -->For our second meetup we have two developers from the Antwerp company Spatie speaking. Sebastian De Deyne will introduce a cool new react feature called hooks. Freek Van der Herten will introduce us into the wonderful world of event sourcing.

                A big thanks to Code d'Or for hosting us! They'll provide us with drinks and some small snacks.
            </div>
            <details>
                <summary class="text-belgium mb-8 inline-block focus:outline-none focus:bg-yellow">
                    <span class="link is-small text-sm">Details</span>
                </summary>
                <div class="whitespace-pre-line mb-8"><!--
                    -->SCHEDULE
                    19:00 Doors
                    20:00 Talks

                    TALKS
                    Getting started with event sourcing in a Laravel app by Freek Van der Herten

                    In an event sourced app you're storing each event that happens within your app and derive all state from those events.

                    In this practical talk you'll get an intro on what event sourcing is and what the benefits are. After that we'll dive in the Laravel ecosystem and review two packages: laravel-event-projector and EventSauce.

                    Speaker: Freek Van der Herten is a developer and partner at Spatie. The Antwerp based company has an open source first mentality and has released many Laravel, PHP and JavaScript packages, which have been downloaded more than 25 million times. After hours Freek runs https://ohdear.app and co-organises the Full Stack Europe conference.

                    Length: 45 minutes

                    React Hooks With Cocktails by Sebastian De Deyne

                    A few months ago, the React team introduced "Hooks", a new way use various React features with plain functions instead of ES6 class components. In this live-coding session, we'll build a cocktail recipe database to walk through some React basic concepts and introduce Hooks.

                    Cocktails not included, but here's what you'll learn:

                    - How to use hooks to manage component state
                    - How to use hooks for simple side effects
                    - How to use hooks for data fetching
                    - How to write a custom hook

                    Prior React knowledge isn't necessary, but any experience with a modern front-end framework is welcome.

                    Speaker: Sebastian is a backend-turned-frontend developer and designer at Spatie. He has a broad spectrum of interests, ranging from PHP to JavaScript, CSS, and more exotic languages like Elixir.

                    Length: 30-45 minutes
                </div>
            </details>
            <div class="-mx-8">
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
            </div>
        </div>
        <div class="box pb-0 overflow-hidden border-t-4 border-ghent mb-8 md:mb-12">
            <header class="flex flex-col md:flex-row items-center mb-8 md:-ml-2">
                <figure class="block w-24 mb-4 md:mb-0 md:mr-4">
                    {{ svg('full-stack-ghent') }}
                </figure>
                <div class="w-full">
                    <h2 class="font-bold text-xl">
                        Full Stack Ghent
                        <a class="inline-block w-4" href="https://www.meetup.com/fullstackghent/" target="_blank" title="View on meetup.com">
                            {{ svg('meetup') }}
                        </a>
                    </h2>
                    <p class="text-sm text-gray-700">
                        Every 2<sup>nd</sup> Wednesday of the month
                    </p>
                </div>
            </header>
            <h3 class="text-sm text-gray-700 mb-2">
                Next meetup:
            </h3>
            <p class="text-xl mb-8">
                <time class="font-medium" datetime="2019-03-13">April 10<sup>th</sup></time>
                at Code d'Or
                <a class="inline-block w-4" href="#" target="_blank" title="View on meetup.com">
                    {{ svg('meetup') }}
                </a>
            </p>
            <div class="whitespace-pre-line mb-6"><!--
                -->For our second meetup we have two developers from the Antwerp company Spatie speaking. Sebastian De Deyne will introduce a cool new react feature called hooks. Freek Van der Herten will introduce us into the wonderful world of event sourcing.

                A big thanks to Code d'Or for hosting us! They'll provide us with drinks and some small snacks.
            </div>
            <details>
                <summary class="text-belgium mb-8 inline-block focus:outline-none focus:bg-yellow">
                    <span class="link is-small text-sm">Details</span>
                </summary>
                <div class="whitespace-pre-line mb-8"><!--
                    -->SCHEDULE
                    19:00 Doors
                    20:00 Talks

                    TALKS
                    Getting started with event sourcing in a Laravel app by Freek Van der Herten

                    In an event sourced app you're storing each event that happens within your app and derive all state from those events.

                    In this practical talk you'll get an intro on what event sourcing is and what the benefits are. After that we'll dive in the Laravel ecosystem and review two packages: laravel-event-projector and EventSauce.

                    Speaker: Freek Van der Herten is a developer and partner at Spatie. The Antwerp based company has an open source first mentality and has released many Laravel, PHP and JavaScript packages, which have been downloaded more than 25 million times. After hours Freek runs https://ohdear.app and co-organises the Full Stack Europe conference.

                    Length: 45 minutes

                    React Hooks With Cocktails by Sebastian De Deyne

                    A few months ago, the React team introduced "Hooks", a new way use various React features with plain functions instead of ES6 class components. In this live-coding session, we'll build a cocktail recipe database to walk through some React basic concepts and introduce Hooks.

                    Cocktails not included, but here's what you'll learn:

                    - How to use hooks to manage component state
                    - How to use hooks for simple side effects
                    - How to use hooks for data fetching
                    - How to write a custom hook

                    Prior React knowledge isn't necessary, but any experience with a modern front-end framework is welcome.

                    Speaker: Sebastian is a backend-turned-frontend developer and designer at Spatie. He has a broad spectrum of interests, ranging from PHP to JavaScript, CSS, and more exotic languages like Elixir.

                    Length: 30-45 minutes
                </div>
            </details>
            <div class="-mx-8">
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
            </div>
        </div>
    </div>
@endcomponent
