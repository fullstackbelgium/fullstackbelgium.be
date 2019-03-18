@php($active = $active ?? null)

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    @isset($title)
        <title>{{ $title }} — Full Stack Belgium</title>
    @else
        <title>Full Stack Belgium</title>
    @endisset

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
<body class="bg-gray-200 font-sans text-black leading-normal">
    <div class="flex flex-col min-h-screen">
        <header class="w-full max-w-5xl px-6 sm:px-12 mx-auto mb-12 md:mb-24">
            <div class="pt-6 flex items-center sm:items-end justify-between">
                <figure class="hidden sm:block absolute right-0 top-0 mt-4" style="width: 18rem">
                    {{ svg('belgium') }}
                </figure>
                <a class="block rounded-full border-4 border-white shadow-lg w-32 mr-8" href="{{ url('/') }}">
                    {{ svg('full-stack-belgium') }}
                </a>
                <nav class="tracking-wide bg-gray-200 text-gray-700 py-1 leading-none sm:mt-8 mb-1">
                    <ul class="sm:flex text-right">
                        <li class="mb-4 sm:mb-0 sm:mr-3 md:mr-5 hidden md:block {{ $active === 'home' ? 'font-bold text-black' : '' }}">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="mb-4 sm:mb-0 sm:mr-3 md:mr-5 {{ $active === 'meetups' ? 'font-bold text-black' : '' }}">
                            <a href="{{ url('meetups') }}">Meetups</a>
                        </li>
                        <li class="mb-4 sm:mb-0 sm:mr-3 md:mr-5 {{ $active === 'slack' ? 'font-bold text-black' : '' }}">
                            <a href="{{ url('slack') }}">Slack</a>
                        </li>
                        <li class="mb-4 sm:mb-0 sm:mr-3 md:mr-5">
                            <a href="https://twitter.com/fullstackbe" target="_blank">Twitter</a>
                        </li>
                        <li class="{{ $active === 'contact' ? 'font-bold text-black' : '' }}">
                            <a href="{{ url('contact') }}">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="w-full flex-1">
            {{ $slot }}
        </main>
        <footer class="w-full max-w-5xl px-6 sm:px-12 lg:px-24 mx-auto">
            <div class="py-6 md:flex justify-between text-xs text-gray-600 tracking-wide">
                <ul class="flex mb-2 md:mb-0">
                    <li class="mr-3 md:mr-6"><a href="{{ url('contact') }}">Contact</a></li>
                    <li class="mr-3 md:mr-6"><a href="{{ url('policy') }}">Policy</a></li>
                    <li><a href="{{ url('code-of-conduct') }}">Code of conduct</a></li>
                </ul>
                <p>
                    &copy; {{ now()->format('Y') }}
                    <a href="{{ url('/') }}">
                        Full Stack Belgium
                    </a>
                </p>
            </div>
        </footer>
    </div>
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
