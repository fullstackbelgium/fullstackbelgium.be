@component('layouts.app', [
    'title' => 'Slack',
    'active' => 'slack',
])
    <div class="wrapper mb-8">
        <section class="md:w-2/3">
            <div class="markup mb-10">
                <h1>Join our Slack community</h1>
                <p class="text-xl">
                    Looking for answers to tech questions? Want to mingle with fellow Belgian developers? Sharing your favorite meme? Then our Slack is the place to be!
                </p>
            </div>
            <p>
                <span class="inline-flex flex-col items-center">
                    <a class="button text-lg mb-1"
                        target="_blank"
                        href="https://join.slack.com/t/fullstackbelgium/shared_invite/enQtMzYxNjMwNTM3NDU2LTE5Nzk3NDkwMmNjMThhODM2MzM2MTE0NzMxZjIwNWZkNjAwMDc3NmZlYWQ0NGVmZTc4NWJkMzMzODAzZjVmZGU">
                        Join us on Slack →
                    </a>
                    <span class="block text-2xs text-gray-600 font-normal">
                        several Belgians are typing…
                    </span>
                </span>
            </p>
        </section>
    </div>
@endcomponent
