@component('layouts.app', [
    'title' => 'Slack',
    'active' => 'slack',
])
    <div class="wrapper">
        <section class="md:w-2/3">
            <div class="markup mb-8">
                <h1>Join our Slack community</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus illo est rem sit, perferendis, consequatur provident amet pariatur natus totam alias earum odio? Dicta quidem maxime minima sed laborum accusantium.</p>
            </div>
            <a class="button mb-4"
                target="_blank"
                href="https://join.slack.com/t/fullstackbelgium/shared_invite/enQtMzYxNjMwNTM3NDU2LTE5Nzk3NDkwMmNjMThhODM2MzM2MTE0NzMxZjIwNWZkNjAwMDc3NmZlYWQ0NGVmZTc4NWJkMzMzODAzZjVmZGU">
                Join us on Slack →
            </a>
            <p class="ml-1 text-xs text-grey-dark">
                several Belgians are typing…
            </p>
        </section>
            {{-- <h1>Several Belgians are typing...</h1> --}}
    </div>
@endcomponent
