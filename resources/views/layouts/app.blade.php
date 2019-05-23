@php($active = $active ?? null)

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">

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
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">

    <style>{{ inline_mix('css/app.css') }}</style>
    <link rel="stylesheet" href="https://use.typekit.net/hje0ebn.css">
    <link rel="preload" href="{{ mix('css/vendor.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=Array.from" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>

    @preload
</head>
<body class="bg-gray-200 font-sans text-black leading-normal">
    <div class="flex flex-col min-h-screen">
        <section class="bg-europe-dark border-t-4 border-europe-light text-white font-medium pt-3 pb-4 mb-4">
            <div class="wrapper text-center">
                <a class="focus:underline focus:bg-transparent" href="https://fullstackeurope.com/" target="_blank" rel="noopener">
                    We're doing a conference! Join us at Hilton Antwerp Old Town for Full Stack Europe 2019 →
                </a>
            </div>
        </section>
        <header class="w-full max-w-5xl px-6 sm:px-12 mx-auto mb-12 md:mb-24">
            <div class="pt-6 flex items-center sm:items-end justify-between relative">
                <figure class="hidden sm:block absolute right-0 top-0 mt-4" style="width: 18rem">
                    {{ svg('belgium') }}
                </figure>
                <a tabindex="-1" class="block rounded-full border-4 border-white shadow-lg w-32 mr-8 relative" href="{{ url('/') }}" title="Full Stack Belgium">
                    {{ svg('full-stack-belgium') }}
                </a>
                <nav class="bg-gray-200 text-gray-700 py-1 leading-none sm:mt-8 mb-1 relative">
                    <ul class="sm:flex text-right">
                        <li class="mb-3 sm:mb-0 sm:mr-3 md:mr-5 {{ $active === 'home' ? 'font-bold text-black' : '' }}">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="mb-3 sm:mb-0 sm:mr-3 md:mr-5 {{ $active === 'slack' ? 'font-bold text-black' : '' }}">
                            <a href="{{ url('slack') }}">Slack</a>
                        </li>
                        <li class="mb-3 sm:mb-0 sm:mr-3 md:mr-5">
                            <a href="https://twitter.com/fullstackbe" target="_blank"  rel="noopener">Twitter</a>
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
            <div class="py-6 md:flex justify-between text-xs text-gray-700">
                <ul class="flex mb-2 md:mb-0">
                    <li class="mr-3 md:mr-6"><a href="{{ url('contact') }}">Contact</a></li>
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
