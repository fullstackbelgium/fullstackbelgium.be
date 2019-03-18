@component('layouts.app', [
    'title' => 'Slack',
    'active' => 'slack',
])
    <div class="wrapper">
        <section class="md:w-2/3">
            <div class="markup mb-8">
                <h1>Join our Slack community</h1>
                <p class="text-xl">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus illo est rem sit, perferendis, consequatur provident amet pariatur natus totam alias earum odio? Dicta quidem maxime minima sed laborum accusantium.</p>
            </div>
            <p>
                <a class="button mb-1"
                    target="_blank"
                    href="https://join.slack.com/t/fullstackbelgium/shared_invite/enQtMzYxNjMwNTM3NDU2LTE5Nzk3NDkwMmNjMThhODM2MzM2MTE0NzMxZjIwNWZkNjAwMDc3NmZlYWQ0NGVmZTc4NWJkMzMzODAzZjVmZGU">
                    Join us on Slack →
                </a>
                <span class="block text-2xs text-gray-600 font-normal ml-3">
                    several Belgians are typing…
                </span>
            </p>
        </section>
            {{-- <h1>Several Belgians are typing...</h1> --}}
    </div>
@endcomponent
