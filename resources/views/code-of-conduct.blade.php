@component('layouts.app', [
    'title' => 'Code of conduct',
])
    <div class="wrapper">
        <div class="markup md:w-3/4 pb-4 md:pb-8">
            {!! modify($content)->markdown() !!}
        </div>
    </div>
@endcomponent
