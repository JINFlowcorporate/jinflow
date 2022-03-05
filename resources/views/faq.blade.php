@section('title', __('pages.faq'))

<x-app-layout>
<div class="bg-white">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
        <div>

            <iframe class="mx-auto mb-4" title="vimeo-player" src="https://player.vimeo.com/video/684667163?h=c3d5854473" width="640" height="360" frameborder="0" allowfullscreen></iframe>
            </div>
        <div class="lg:mx-auto lg:text-center">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                {{ __('faq.faq') }}
            </h2>
            <p class="mt-4 text-gray-500">{!! __('faq.subtitle') !!}</p>
        </div>
        <div class="mt-20">
            <dl class="space-y-10 lg:space-y-0 lg:grid lg:grid-cols-2 lg:gap-x-8 lg:gap-y-10">
                @foreach(__('faq.questions') as $question)
                    <div>
                        <dt class="font-semibold text-gray-900">
                            {!! $question['title'] !!}
                        </dt>
                        <dd class="mt-3 text-gray-500">
                            {!! $question['text'] !!}
                        </dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>
</div>
</x-app-layout>
@include('footer')
