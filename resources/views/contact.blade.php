@component('layouts.app', [
    'title' => 'Contact',
    'active' => 'contact',
])
    <section class="wrapper markup pb-4 md:pb-16">
        <div class="md:w-2/3">
            <h1>Contact</h1>
            <p class="text-xl">We are always on the lookout for <a href="#speakers">speakers</a>, companies that want to
                <a href="#venues">host an event</a> or companies that want to contribute and <a href="#sponsors">sponsor</a> an event. Don't be a stranger, <strong>get in touch!</strong></p>
        </div>
    </section>

    <section class="bg-white border-t border-b border-gray-300 pt-10 pb-4 md:pt-24 md:pb-16">
        <div class="wrapper markup">
            <div class="md:flex items-start mb-8 md:mb-12">
                <h2 id="speakers" class="w-1/3">
                    Speakers
                </h2>
                <div class="markup flex-1 md:mt-1">
                    <p>We are always looking for speakers that want to speak at our events.</p>
                    <ul>
                        <li class="mb-2">No experience required! We <strong>actively</strong> encourage new speakers to try out giving a talk.</li>
                        <li class="mb-2">Talks should be around 30 minutes long</li>
                        <li class="mb-2">Topics can be anything web development related, soft or hard skills...</li>
                    </ul>
                    <p>All we need from you is a few details:</p>
                    <ul>
                        <li class="mb-2">Topic or title of your talk with an abstract</li>
                        <li class="mb-2">Duration of your talk (an estimate, 10min, 20min, 40min)</li>
                        <li class="mb-2">A short bio of yourself</li>
                        <li class="mb-2">Which event(s) you would like to speak at (Antwerp or Ghent)</li>
                    </ul>
                    <p class="mb-0">
                        <a class="no-link text-belgium font-medium" href="mailto:dries@vints.io">
                            <span class="link is-thick">Get in touch with Dries</span> →
                        </a>
                    </p>
                </div>
            </div>
            <hr class="h-px w-2/3 bg-gray-400 my-12 md:mt-20 md:mb-24">
            <div class="md:flex items-start mb-8 md:mb-12">
                <h2 id="venues" class="w-1/3">
                    Venues
                </h2>
                <div class="markup flex-1 md:mt-1">
                    <p>Our events wouldn't be possible without a place to host them at, we're specifically looking for venues in <strong>Antwerp</strong> and <strong>Ghent</strong>.</p>
                    <ul>
                        <li class="mb-2">Venues can host at least 40-50 people</li>
                        <li class="mb-2">Should be easily accessible with public transport and ideally in the centre of the city</li>
                        <li class="mb-2">A way for speakers to project their slides, either whitescreen & beamer or digital alternative</li>
                        <li class="mb-2">Providing drinks and/or some snacks or food is <strong>not required</strong> but is always much appreciated</li>
                    </ul>
                    <p>Hosting an event also gives you the following benefit:</p>
                    <ul>
                        <li class="mb-2">A short pitch of max. 5 minutes to the attendees of an event: an opportunity to introduce your company and highlight any job listings you have</li>
                    </ul>
                    <p class="mb-0">
                        <a class="no-link text-belgium font-medium" href="mailto:dries@vints.io">
                            <span class="link is-thick">Get in touch with Dries</span> →
                        </a>
                    </p>
                </div>
            </div>
            <hr class="h-px w-2/3 bg-gray-400 my-12 md:mt-20 md:mb-24">
            <div class="md:flex items-start mb-8 md:mb-12">
                <h2 id="sponsors" class="w-1/3">
                    Sponsorships
                </h2>
                <div class="markup flex-1 md:mt-1">
                    <p>If you're looking to highlight some vacancies you have, or want to promote your company at one of our events, we offer the following packages for sponsorships:</p>
                    <p><strong>Bronze</strong> &euro;100 / event</p>
                    <ul>
                        <li class="mb-2">Shout-out on Twitter from the <a href="https://twitter.com/fullstackbe" target="_blank">@fullstackbe</a> account (<strong>Always</strong> limited to one tweet per month) with a message &amp; link of your choice</li>
                        <li class="mb-2">Thank you in the opening pitch at one event + logo in the opening slides</li>
                    </ul>
                    <p><strong>Silver</strong> &euro;200 / event</p>
                    <ul>
                        <li class="mb-2">Everything from our <strong>Bronze</strong> package</li>
                        <li class="mb-2">Your message of choice in a monthly newsletter sent to the full member list of one of our user groups</li>
                    </ul>
                    <p><strong>Gold</strong> &euro;300 / 2 events</p>
                    <ul>
                        <li class="mb-2">Everything from our <strong>Silver</strong> package but for both events</li>
                    </ul>
                    <p class="mb-0">
                        Want to help us out and sponsor one of our events, or have a different proposal?<br>
                        <a class="no-link text-belgium font-medium" href="mailto:dries@vints.io">
                            <span class="link is-thick">Get in touch with Dries</span> →
                        </a>
                    </p>
                </div>
            </div>
            <hr class="h-px w-2/3 bg-gray-400 my-12 md:mt-20 md:mb-24">
            <div class="md:flex items-start mb-8 md:mb-12">
                <h2 id="other" class="w-1/3">
                    Other inquiries
                </h2>
                <div class="markup flex-1 md:mt-1">
                    <p>Have a question not related to speaking, hosting or sponsoring?</p>
                    <p class="mb-0">
                        <a class="no-link text-belgium font-medium" href="mailto:dries@vints.io">
                            <span class="link is-thick">Get in touch with Dries</span> →
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endcomponent
