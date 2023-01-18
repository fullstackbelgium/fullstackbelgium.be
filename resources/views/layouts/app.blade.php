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

    <meta name="description" content="Organising events on front-end, back-end, devops and everything in between in the cities of Antwerp and Ghent">

    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/images/favicons/site.webmanifest">
    <link rel="mask-icon" href="/images/favicons/safari-pinned-tab.svg" color="#6859ea">
    <link rel="shortcut icon" href="/images/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="/images/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://use.typekit.net/hje0ebn.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=Array.from" defer></script>
    @vite(['resources/css/app.css', 'resources/css/vendor.css', 'resources/js/app.js'])

    @production
        <!-- Fathom - beautiful, simple website analytics -->
        <script src="https://boom.laravel.io/script.js" data-site="KXNVRTKF" defer></script>
        <!-- / Fathom -->
    @endproduction
</head>
<body class="bg-gray-200 font-sans text-black leading-normal">
    <div class="flex flex-col min-h-screen">
        <section class="bg-europe-dark border-t-4 border-europe-light text-white font-medium pt-3 pb-4 mb-4">
            <div class="wrapper text-center">
                <a class="focus:underline focus:bg-transparent" href="https://fullstackeurope.com/" target="_blank" rel="noopener">
                    Join us at Full Stack Europe, our conference in Antwerp  →
                </a>
            </div>
        </section>

        <header class="wrapper mb-12 md:mb-24">
            <div class="pt-6 flex items-center justify-between relative">
                <figure class="hidden sm:block absolute right-0 top-0 mt-4" style="width: 18rem">
                    {{ svg('belgium') }}
                </figure>

                <a tabindex="-1" class="logo block w-48 mt-5 mr-8 relative" href="{{ url('/') }}" title="Full Stack Belgium">
                    <img src="{{ asset('images/logo.svg') }}" alt="Full Stack Belgium">
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
                        <li class="mb-3 sm:mb-0 sm:mr-3 md:mr-5">
                            <a href="https://www.instagram.com/fullstackbe/" target="_blank"  rel="noopener">Instagram</a>
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
                    &copy; {{ date('Y') }}
                    <a href="{{ url('/') }}">
                        Full Stack Belgium
                    </a>
                </p>
            </div>
        </footer>
    </div>
</body>
</html>
