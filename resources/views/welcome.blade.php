@section('title', __('pages.home'))

<x-app-layout>
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <polygon points="50,0 100,0 50,100 0,100" />
                </svg>
                <div>
                    <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                        <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
                            <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                                <div class="flex items-center justify-between w-full md:w-auto">
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                        <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                        </div>
                    </div>
                </div>
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="tracking-tight font-extrabold text-palette-2-dark-beige text-4xl">
                            {{ __('home.main.invest-with-jinflow') }}
                        </h1>
                        <h1 class="tracking-tight font-extrabold text-4xl text-palette-2-medium-blue">{{ __('home.main.new-area') }}</h1>
                        <p class="mt-3 text-base text-opacity-70 text-palette sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            {{ __('home.main.text') }}
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="{{ route('nos-biens') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md bg-palette-2-dark-beige text-white hover:text-palette-2-dark-blue hover:bg-indigo-50 transition-all duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                    {{ __('home.main.invest') }}
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="{{ route('faq') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-palette-2-light-beige bg-palette-2-dark-blue hover:bg-indigo-700 transition-all duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                    {{ __('home.main.how-work') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('images/home/1.jpg') }}" alt="Home">
        </div>
    </div>

    <div class="bg-gradient-to-r flex flex-col items-center from-palette-2-dark-blue to-palette-2-medium-blue py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
        <div class="mx-auto grid gap-4 grid-cols-1 md:grid-cols-3 items-baseline justify-between text-center">
            <div>
                <p class="text-3xl text-center font-extrabold text-white block">{{ __('home.info.block-1') }}</p>
                <p class="block text-center text-white mt-2">{{ __('home.info.text-1') }}</p>
            </div>
            <div>
                <p class="text-3xl text-center font-extrabold text-white block">{{ __('home.info.block-2') }}</p>
                <p class="block text-center text-white mt-2">{{ __('home.info.text-2') }}</p>
            </div>
            <div>
                <p class="text-3xl text-center font-extrabold text-white block">{{ __('home.info.block-3') }}</p>
                <p class="block text-center text-white mt-2">{{ __('home.info.text-3') }}</p>
            </div>
        </div>
    </div>

    <div class="relative bg-white pt-16 overflow-hidden">
        <div class="relative pb-16">
            <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">
                <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-16 lg:max-w-none lg:mx-0 lg:px-0">
                    <div>
                        <div class="h-12 w-12 flex items-center">
                            <img class="h-7 w-7 object-cover rounded-sm" src="{{ asset('images/icons/10.png') }}" alt="Icon">
                        </div>
                        <div>
                            <h2 class="text-3xl font-extrabold tracking-tight text-palette-2-dark-blue">
                                {{ __('home.innovation.title') }}
                            </h2>
                            <p class="mt-4 text-lg text-gray-500">
                                {!! __('home.innovation.text') !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-12 sm:mt-16 lg:mt-0">
                    <div class="pl-4 -mr-48 sm:pl-6 md:-mr-16 lg:px-0 lg:m-0 lg:relative lg:h-full">
                        <div class="w-full h-full rounded-xlring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full">
                            <img class="w-full rounded-xl shadow-xl align-content: flex-end; ring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full" src="{{ asset('images/home/2.jpg') }}" alt="Home mock">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-24">
                <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">
                    <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-32 lg:max-w-none lg:mx-0 lg:px-0 lg:col-start-2">
                        <div>
                            <div class="h-12 w-12 flex items-center">
                                 <img class="h-7 w-7 object-cover rounded-sm" src="{{ asset('images/icons/9.png') }}" alt="Icon">
                            </div>
                            <div>
                                <h2 class="text-3xl font-extrabold tracking-tight text-palette-2-dark-blue">
                                    {{ __('home.innovation.why-american') }}
                                </h2>
                                <p class="mt-4 text-lg text-gray-500">
                                    {!! __('home.innovation.american-text') !!}
                                </p>
                                <div class="mt-6">
                                    <a href="{{ route('nos-biens') }}" class="inline-flex px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm bg-palette-2-dark-blue text-palette-2-light-beige hover:bg-indigo-700 transition-all duration-150 ease-in-out">
                                        {{ __('home.innovation.see-our-properties') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-12 sm:mt-16 lg:mt-0 lg:col-start-1">
                        <div class="pr-4 -ml-48 sm:pr-6 md:-ml-16 lg:px-0 lg:m-0 lg:relative lg:h-full">
                            <img class="w-full rounded-xl shadow-xl align-content: flex-end; ring-1 ring-black ring-opacity-5 lg:absolute lg:right-0 lg:h-full" src="{{ asset('images/home/3.jpg') }}" alt="Customer profile user interface">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="relative bg-palette-2-dark-blue">
            <div class="max-w-4xl mx-auto py-12 sm:py-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8 xl:grid xl:grid-cols-2 items-center xl:grid-flow-col-dense xl:gap-x-8">
                <div class="relative xl:col-start-1">
                    <p class="mt-3 text-3xl font-extrabold text-white">{!! __('home.experiences.text-1') !!}</p>
                    <p class="mt-5 text-lg text-gray-300">{!! __('home.experiences.text-2') !!}</p>
                </div>
                <div class="mt-12 grid grid-cols-1 gap-y-12 gap-x-6 sm:grid-cols-2">
                    <p>
                        <span class="block text-2xl font-bold text-white">{{ __('home.experiences.infos-1.number') }}</span>
                        <span class="mt-1 block text-base text-gray-300">{!! __('home.experiences.infos-1.text') !!}</span>
                    </p>

                    <p>
                        <span class="block text-2xl font-bold text-white">{{ __('home.experiences.infos-2.number') }}</span>
                        <span class="mt-1 block text-base text-gray-300">{!! __('home.experiences.infos-2.text') !!}</span>
                    </p>

                    <p>
                        <span class="block text-2xl font-bold text-white">{{ __('home.experiences.infos-3.number') }}</span>
                        <span class="mt-1 block text-base text-gray-300">{!! __('home.experiences.infos-3.text') !!}</span>
                    </p>

                    <p>
                        <span class="block text-2xl font-bold text-white">{{ __('home.experiences.infos-4.number') }}</span>
                        <span class="mt-1 block text-base text-gray-300">{!! __('home.experiences.infos-4.text') !!}</span>
                    </p>
                </div>
            </div>
        </div>


        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-palette-2-dark-blue sm:text-4xl">
                        {{ __('home.jinflow.jinflow-different') }}
                    </p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                        {{ __('home.jinflow.text-1') }}
                    </p>
                </div>

                <div class="mt-10">
                    <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                        <div class="relative">
                            <dt>
                                <div class="absolute flex h-12 w-12 text-palette-2-dark-blue">
                                    <img class="h-7 w-7 object-cover rounded-sm" src="{{ asset('images/icons/5.png') }}" alt="Icon">
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{ __('home.jinflow.investissment') }}</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                {{ __('home.jinflow.text-2') }}
                            </dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <div class="absolute flex h-12 w-12 text-palette-2-dark-blue">
                                    <img class="h-7 w-7 object-cover rounded-sm" src="{{ asset('images/icons/6.png') }}" alt="Icon">
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{ __('home.jinflow.possession') }}</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                {{ __('home.jinflow.text-3') }}
                            </dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <div class="absolute flex h-12 w-12 text-palette-2-dark-blue">
                                    <img class="h-7 w-7 object-cover rounded-sm" src="{{ asset('images/icons/7.png') }}" alt="Icon">
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{ __('home.jinflow.agree') }}</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                {{ __('home.jinflow.text-4') }}
                            </dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <div class="absolute flex h-12 w-12 text-palette-2-dark-blue">
                                    <img class="h-7 w-7 object-cover rounded-sm" src="{{ asset('images/icons/8.png') }}" alt="Icon">
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{ __('home.jinflow.community') }}</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                {{ __('home.jinflow.text-5') }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-tr from-palette-2-grey to-palette-2-medium-blue">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center">
                <div class="lg:w-0 lg:flex-1">
                    <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl" id="newsletter-headline">
                        {{ __('home.banner.title') }}
                    </h2>
                    <p class="mt-3 max-w-3xl text-lg leading-6 text-gray-300">
                        {!! __('home.banner.text') !!}
                    </p>
                </div>
                <div class="mt-8 lg:mt-0 lg:ml-8">
                    <form class="sm:flex">
                        <label for="emailAddress" class="sr-only">{{ __('home.banner.text') }}</label>
                        <input id="emailAddress" name="emailAddress" type="email" autocomplete="email" required class="w-full px-5 py-3 border border-transparent placeholder-gray-500 focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white focus:border-white sm:max-w-xs rounded-md" placeholder="{{ __('home.banner.placeholder') }}">
                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                            <button type="submit" class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md bg-palette-2-dark-blue text-palette-2-light-beige hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500 transition-all duration-150 ease-in-out">
                                {{ __('home.banner.notify-me') }}
                            </button>
                        </div>
                    </form>
                    <p class="mt-3 text-sm text-gray-300">
                        {!! __('home.banner.about-data') !!}
                    </p>
                </div>
            </div>
        </div>
</x-app-layout>
@include('footer')
