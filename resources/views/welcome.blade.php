@section('title', __('pages.home'))

<x-app-layout>
    <!-- This example requires Tailwind CSS v2.0+ -->
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
                    <!--
                      Mobile menu, show/hide based on menu open state.
                      Entering: "duration-150 ease-out"
                        From: "opacity-0 scale-95"
                        To: "opacity-100 scale-100"
                      Leaving: "duration-100 ease-in"
                        From: "opacity-100 scale-100"
                        To: "opacity-0 scale-95"
                    -->
                    <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                        <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                        </div>
                    </div>
                </div>
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block text-palette-2-dark-beige xl:inline">{{ __('home.main.invest-with-jinflow') }}</span>
                            <span class="block text-palette-2-medium-blue xl:inline">{{ __('home.main.new-area') }}</span>
                        </h1>
                        <p class="mt-3 text-base text-opacity-70 text-palette sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            {{ __('home.main.text') }}
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md bg-palette-2-dark-beige text-palette-2-dark-blue hover:bg-indigo-50 transition-all duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                    {{ __('home.main.invest') }}
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-palette-2-light-beige bg-palette-2-dark-blue hover:bg-indigo-700 transition-all duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                    {{ __('home.main.how-work') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1505880167668-ec27c3eb9110?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2768&q=80" alt="">
        </div>
    </div

        <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-gradient-to-r flex flex-col items-center from-palette-2-dark-blue to-palette-2-medium-blue py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
        <div class="mx-auto grid gap-4 grid-cols-1 md:grid-cols-3 items-center justify-between text-center">
            <div>
                <p class="text-3xl text-center font-extrabold text-white sm:text-4xl block">{{ __('home.info.block-1') }}</p>
                <p class="block text-center text-white mt-2">{{ __('home.info.text-1') }}</p>
            </div>
            <div>
                <p class="text-3xl text-center font-extrabold text-white sm:text-4xl block">{{ __('home.info.block-2') }}</p>
                <p class="block text-center text-white mt-2">{{ __('home.info.text-2') }}</p>
            </div>
            <div>
                <p class="text-3xl text-center font-extrabold text-white sm:text-4xl block">{{ __('home.info.block-3') }}</p>
                <p class="block text-center text-white mt-2">{{ __('home.info.text-3') }}</p>
            </div>
        </div>
        <a href="#" class="mt-8 w-full inline-block mx-auto items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md bg-palette-2-dark-beige text-palette-2-dark-blue hover:bg-indigo-50 transition-all duration-150 ease-in-out sm:w-auto">
            {{ __('home.info.understand') }}
        </a>
    </div>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="relative bg-white pt-16 overflow-hidden">
        <div class="relative pb-16">
            <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">
                <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-16 lg:max-w-none lg:mx-0 lg:px-0">
                    <div>
                        <div>
            <span class="h-12 w-12 rounded-md flex items-center justify-center bg-palette-2-dark-blue">
              <!-- Heroicon name: outline/inbox -->
              <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
              </svg>
            </span>
                        </div>
                        <div class="mt-6">
                            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">
                                {{ __('home.innovation.title') }}
                            </h2>
                            <p class="mt-4 text-lg text-gray-500">
                                {!! __('home.innovation.text') !!}
                            </p>
                            <div class="mt-6">
                                <a href="#" class="inline-flex px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-s bg-palette-2-dark-blue text-palette-2-light-beige hover:bg-indigo-700 transition-all duration-150 ease-in-out">
                                    {{ __('home.innovation.get-started') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 border-t border-gray-200 pt-6">
                        <blockquote>{{ __('home.innovation.blockquote') }}
                            <div>
                                <p class="text-base text-gray-500">
                                </p>
                            </div>
                            <footer class="mt-3">
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0">
                                        <img class="h-6 w-6 rounded-full" src="https://media-exp1.licdn.com/dms/image/C4D03AQGfHmKFdlMOxw/profile-displayphoto-shrink_800_800/0/1618677968141?e=1637193600&v=beta&t=1pJpzGKKP461g0f-XQ_sovAhsAwvZFybKxU_VhLDLQc" alt="">
                                    </div>
                                    <div class="text-base font-medium text-gray-700">
                                        {{ __('home.innovation.quentin') }}
                                    </div>
                                </div>
                            </footer>
                        </blockquote>
                    </div>
                </div>
                <div class="mt-12 sm:mt-16 lg:mt-0">
                    <div class="pl-4 -mr-48 sm:pl-6 md:-mr-16 lg:px-0 lg:m-0 lg:relative lg:h-full">
                        <div class="w-full h-full rounded-xlring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none">
                            <img class="w-full rounded-xl shadow-xl align-content: flex-end; ring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none" src="https://images.unsplash.com/photo-1505880167668-ec27c3eb9110?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2768&q=80" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-24">
                <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">
                    <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-32 lg:max-w-none lg:mx-0 lg:px-0 lg:col-start-2">
                        <div>
                            <div>
            <span class="h-12 w-12 rounded-md flex items-center justify-center bg-palette-2-dark-blue">
              <!-- Heroicon name: outline/sparkles -->
              <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
              </svg>
            </span>
                            </div>
                            <div class="mt-6">
                                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">
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
                            <img class="w-full rounded-xl shadow-xl align-content: flex-end; ring-1 ring-black ring-opacity-5 lg:absolute lg:right-0 lg:h-full lg:w-auto lg:max-w-none" src="https://images.unsplash.com/photo-1505880167668-ec27c3eb9110?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2768&q=80" alt="Customer profile user interface">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="relative bg-gray-900">
            <div class="h-80 w-full absolute bottom-0 xl:inset-0 xl:h-full">
                <div class="h-full w-full xl:grid xl:grid-cols-2">
                    <div class="h-full xl:relative xl:col-start-2">
                        <img class="h-full w-full object-cover opacity-25 xl:absolute xl:inset-0" src="https://media-exp1.licdn.com/dms/image/C4E03AQFFXUNPGm6D0g/profile-displayphoto-shrink_800_800/0/1593460092038?e=1629936000&v=beta&t=oPSylbq5P7dRYsCpdIbYJHdFLyckb7y8IYZiIzCFgbI" alt="People working on laptops">
                        <div aria-hidden="true" class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-gray-900 xl:inset-y-0 xl:left-0 xl:h-full xl:w-32 xl:bg-gradient-to-r"></div>
                    </div>
                </div>
            </div>
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 xl:grid xl:grid-cols-2 xl:grid-flow-col-dense xl:gap-x-8">
                <div class="relative pt-12 pb-64 sm:pt-24 sm:pb-64 xl:col-start-1 xl:pb-24">
                    <h2 class="text-sm font-semibold text-palette-2-dark-beige tracking-wide uppercase">
                        {{ __('home.experiences.our-experience') }}
                    </h2>
                    <p class="mt-3 text-3xl font-extrabold text-white">{!! __('home.experiences.text-1') !!}</p>
                    <p class="mt-5 text-lg text-gray-300">{!! __('home.experiences.text-2') !!}</p>
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
        </div>


        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
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
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-palette-2-dark-blue text-palette-2-light-beige">
                                    <!-- Heroicon name: outline/globe-alt -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{ __('home.jinflow.investissment') }}</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                {{ __('home.jinflow.text-2') }}
                            </dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-palette-2-dark-blue text-palette-2-light-beige">
                                    <!-- Heroicon name: outline/scale -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{ __('home.jinflow.possession') }}</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                {{ __('home.jinflow.text-3') }}
                            </dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-palette-2-dark-blue text-palette-2-light-beige">
                                    <!-- Heroicon name: outline/lightning-bolt -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{ __('home.jinflow.agree') }}</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                {{ __('home.jinflow.text-4') }}
                            </dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-palette-2-dark-blue text-palette-2-light-beige">
                                    <!-- Heroicon name: outline/annotation -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                    </svg>
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
                        <input id="emailAddress" name="emailAddress" type="email" autocomplete="email" required class="w-full px-5 py-3 border border-transparent placeholder-gray-500 focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white focus:border-white sm:max-w-xs rounded-md" placeholder="Ton meilleur email">
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
