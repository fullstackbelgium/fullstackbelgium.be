<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Full Stack Belgium</title>
    <meta name="description" content="Organising meetups on front-end, back-end, devops and everything in between in the cities of Antwerp, Ghent and Brussels">

    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://use.typekit.net/hje0ebn.css">
</head>
<body class="font-sans text-black leading-normal bg-grey-lightest">
    <header class="max-w-xl px-6 sm:px-12 mx-auto mb-12 md:mb-24">
        <div class="pt-6 flex items-center sm:items-end justify-between">
            <figure class="hidden sm:block absolute pin-r pin-t mt-4" style="width: 18rem">
                {{ svg('belgium') }}
            </figure>
            <a class="block rounded-full border-4 border-white shadow-lg w-32 mr-8" href="{{ url('/') }}">
                {{ svg('full-stack-belgium') }}
            </a>
            <nav class="tracking-wide bg-grey-lightest text-grey-darker py-1 leading-none sm:mt-8 mb-1">
                <ul class="sm:flex text-right">
                    <li class="mb-4 sm:mb-0 sm:mr-3 md:mr-5 font-bold text-black hidden md:block">Home</li>
                    <li class="mb-4 sm:mb-0 sm:mr-3 md:mr-5">Meetups</li>
                    <li class="mb-4 sm:mb-0 sm:mr-3 md:mr-5">Slack</li>
                    <li class="mb-4 sm:mb-0 sm:mr-3 md:mr-5">Twitter</li>
                    <li>Contact</li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="max-w-xl px-6 sm:px-12 lg:px-24 mx-auto mb-16 md:mb-32">
            <section class="text-2xl md:w-2/3 pb-16 md:pb-20 md:border-b">
                <p>Organising meetups on front-end, back-end, devops and everything in between in the cities of <strong class="font-medium">Antwerp</strong>, <strong class="font-medium">Ghent</strong> and <strong class="font-medium">Brussels</strong>.</p>
            </section>
            <div class="flex flex-col items-end" style="margin-top: -2.4rem;">
                <div class="w-full md:max-w-min-content">
                    <section class="md:flex bg-white rounded-sm shadow-lg p-6 whitespace-no-wrap">
                        <h2 class="mb-2 mr-8 font-bold">
                            Our next meetups
                        </h2>
                        <ol>
                            <li class="flex items-center mb-1">
                                <p class="w-24 mr-2">
                                    <span class="uppercase font-medium text-xs text-white bg-ghent py-1 px-2 rounded-full">
                                        Ghent
                                    </span>
                                </p>
                                <p style="margin-top: 0.2rem">
                                    <time class="font-medium" datetime="2019-03-13">March 13<sup>th</sup></time>
                                    at Clarabridge
                                    <a class="inline-block w-4" href="#" target="_blank" title="View on meetup.com">
                                        {{ svg('meetup') }}
                                    </a>
                                </p>
                            </li>
                            <li class="flex items-center mb-1">
                                <p class="w-24 mr-2">
                                    <span class="uppercase font-medium text-xs text-white bg-antwerp py-1 px-2 rounded-full">
                                        Antwerp
                                    </span>
                                </p>
                                <p style="margin-top: 0.2rem">
                                    <time class="font-medium" datetime="2019-03-27">March 27<sup>th</sup></time>
                                    at Spilberg
                                    <a class="inline-block w-4" href="#" target="_blank" title="View on meetup.com">
                                        {{ svg('meetup') }}
                                    </a>
                                </p>
                            </li>
                            <li class="flex items-center mb-1">
                                <p class="w-24 mr-2">
                                    <span class="uppercase font-medium text-xs text-white bg-brussels py-1 px-2 rounded-full">
                                        Brussels
                                    </span>
                                </p>
                                <p style="margin-top: 0.2rem">
                                    <time class="font-medium" datetime="2019-03-03">April 3<sup>rd</sup></time>
                                    at BeCode
                                    <a class="inline-block w-4" href="#" target="_blank" title="View on meetup.com">
                                        {{ svg('meetup') }}
                                    </a>
                                </p>
                            </li>
                        </ol>
                    </section>
                    <p class="mr-1 mt-3 text-xs text-grey-darker text-center md:text-right">
                        Can't join any of our meetups? Hang out with us in our <a class="link link--small" href="#">Slack group</a> instead!
                    </p>
                </div>
            </div>
        </div>
        <section class="max-w-xl px-6 sm:px-12 lg:px-24 mx-auto mb-8 md:mb-16">
            <p class="md:text-center text-lg mb-4 md:mb-8">
                🎉 Thanks to all <strong class="font-bold">235</strong> attendees for joining last month's meetups!
            </p>
            <ul class="md:flex -mx-2 mb-6 md:mb-8">
                <li class="flex-1 mb-4 md:mb-0 px-2">
                    <img class="border-white border-8 rounded-sm shadow-lg" src="{{ url('images/meetups/meetup-dummy-1.jpg') }}">
                </li>
                <li class="flex-1 mb-4 md:mb-0 px-2">
                    <img class="border-white border-8 rounded-sm shadow-lg" src="{{ url('images/meetups/meetup-dummy-2.jpg') }}">
                </li>
                <li class="flex-1 px-2">
                    <img class="border-white border-8 rounded-sm shadow-lg" src="{{ url('images/meetups/meetup-dummy-3.jpg') }}">
                </li>
            </ul>
            <div class="md:px-12">
                <p class="md:text-center">
                    We're always on the lookout for speakers, sponsors and venues for our user groups.
                    <a class="link" href="#">Talk to us</a> if you want to get involved.
                </p>
            </div>
        </section>
        <section class="bg-white pt-10 pb-12">
            <div class="max-w-xl px-6 sm:px-12 lg:px-24 mx-auto">
                <h2 class="text-center font-bold mb-10">Full Stack Belgium is organised by</h2>
                <ul class="flex flex-wrap justify-center">
                    <li class="w-full sm:w-1/2 md:w-1/3 mb-8 md:mb-0 text-center">
                        <img class="inline-block w-24 mb-3 rounded-full" src="{{ url('images/dries.jpg') }}" alt="Headshot of Dries Vints">
                        <p>Dries Vints</p>
                        <p class="text-xs text-grey-dark">
                            <a class="link link--small mr-1" href="https://twitter.com/driesvints">@driesvints</a>
                            <a class="link link--small" href="https://driesvints.com">driesvints.com</a>
                        </p>
                    </li>
                    <li class="w-full sm:w-1/2 md:w-1/3 mb-8 md:mb-0 px-2 text-center">
                        <img class="inline-block w-24 mb-3 rounded-full" src="{{ url('images/freek.jpg') }}" alt="Headshot of Freek Van der Herten">
                        <p>Freek Van der Herten</p>
                        <p class="text-xs text-grey-dark">
                            <a class="link link--small mr-1" href="https://twitter.com/freekmurze">@freekmurze</a>
                            <a class="link link--small" href="https://murze.be">murze.be</a>
                        </p>
                    </li>
                    <li class="w-full sm:w-1/2 md:w-1/3 px-2 text-center">
                        <img class="inline-block w-24 mb-3 rounded-full" src="{{ url('images/rias.jpg') }}" alt="Headshot of Rias Van der Veken">
                        <p>Rias Van der Veken</p>
                        <p class="text-xs text-grey-dark">
                            <a class="link link--small mr-1" href="https://twitter.com/riasvdv">@riasvdv</a>
                            <a class="link link--small" href="https://rias.be">rias.be</a>
                        </p>
                    </li>
                </ul>
            </div>
        </section>
    </main>
    <footer class="max-w-xl px-6 sm:px-12 lg:px-24 mx-auto">
        <div class="py-6 md:flex justify-between text-xs text-grey-dark tracking-wide">
            <ul class="flex mb-2 md:mb-0">
                <li class="mr-3 md:mr-6"><a href="#">Contact</a></li>
                <li class="mr-3 md:mr-6"><a href="#">Policy</a></li>
                <li><a href="#">Code of conduct</a></li>
            </ul>
            <p>&copy; {{ now()->format('Y') }} Full Stack Belgium</p>
        </div>
    </footer>
</body>
</html>
<!--
           ___  ____
          /   \/    \
     ____/  __/      \________________
   _/                 \               \__       ___
  /  ___               \                 \_____/   )_
 /  /                  |                    ___    __)
/     __               |     __             \  \___)
|    / (\              |    /  \             \
|    \_(/  (__)        /   / /\ \            |
|            |     ___/   /  __  \           |
|            /    /      /  ____  \          /
|           /    (      /__/    \__\        |
|       ___/                               /
|      /  |   \                            |
|      |  |   |                            |
|     /   |   |          \_______/         |
|     |   |   |          |   |   |         |
|     |   |/\ |   _      |   | _ |  _      |
|    /    | /\| _/ \     |   |/ \|_/ \     |
|    |    \ | |// / \    |   || ||/ / \    |
|    |     \\/| | | |    |   \\_/|| | |    |
\___/          \\_\_/____/       \\_\_/____/

  ____  _   _ ____       _          _
 |  _ \| | | |  _ \     / \   _ __ | |___      _____ _ __ _ __
 | |_) | |_| | |_) |   / _ \ | '_ \| __\ \ /\ / / _ \ '__| '_ \
 |  __/|  _  |  __/   / ___ \| | | | |_ \ V  V /  __/ |  | |_) |
 |_|   |_| |_|_|     /_/   \_\_|_|_|\__| \_/\_/ \___|_|_ | .__/
  _ __   _____   _____ _ __   / _| ___  _ __ __ _  ___| ||_|
 | '_ \ / _ \ \ / / _ \ '__| | |_ / _ \| '__/ _` |/ _ \ __|
 | | | |  __/\ V /  __/ |    |  _| (_) | | | (_| |  __/ |_
 |_| |_|\___| \_/ \___|_|    |_|  \___/|_|  \__, |\___|\__|
                                            |___/
-->
