<header class="bg-palette-2-medium-blue">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Top">
        <div class="w-full py-6 flex items-center justify-between border-b border-palette-2-light-beige lg:border-none">
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <img class="h-10 w-auto" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=white" alt="">
                </a>
                <div class="hidden ml-10 space-x-8 lg:block">
                    <a href="{{ route('nos-biens') }}" class="text-base font-medium text-white hover:text-indigo-50" key="Pricing">
                        Nos biens
                    </a>

                    <a href="{{ route('team') }}" class="text-base font-medium text-white hover:text-indigo-50" key="Docs">
                        Notre équipe
                    </a>

                    <a href="{{ route('faq') }}" class="text-base font-medium text-white hover:text-indigo-50" key="Company">
                        FAQ
                    </a>

                    @livewire('cart-counter')
                </div>
            </div>
            <div class="ml-10 space-x-4">
                @if (Route::has('login'))
                    <div class="hidden sm:block">
                        @auth

                            <a href="{{ url(\Illuminate\Support\Facades\Auth::user()->is_admin) ? '/admin/dashboard' : '/dashboard' }}" class="text-base font-medium text-white hover:text-indigo-50">
                                <img class="rounded-full" width="30px" height="30px" style="width: 40px;" src="https://media-exp1.licdn.com/dms/image/C4D03AQGfHmKFdlMOxw/profile-displayphoto-shrink_800_800/0/1618677968141?e=1637193600&v=beta&t=1pJpzGKKP461g0f-XQ_sovAhsAwvZFybKxU_VhLDLQc" alt="">
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-block bg-palette-2-grey py-2 px-4 border border-transparent rounded-md text-base font-medium bg-palette-2-dark-beige text-palette-2-dark-blue hover:bg-indigo-50 transition-all duration-150 ease-in-out">Mon compte</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-block bg-palette-2-dark-blue py-2 px-4 border border-transparent rounded-md text-base font-medium bg-palette-2-dark-blue text-palette-2-light-beige hover:bg-indigo-700 transition-all duration-150 ease-in-out">Créer un compte</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
        <div class="py-4 flex flex-wrap justify-center space-x-6 lg:hidden">


            <a href="{{ route('nos-biens') }}" class="text-base font-medium text-white hover:text-indigo-50" key="Pricing">
                Nos biens
            </a>

            <a href="#" class="text-base font-medium text-white hover:text-indigo-50" key="Docs">
                Notre équipe
            </a>

            <a href="{{ route('faq') }}" class="text-base font-medium text-white hover:text-indigo-50" key="Company">
                FAQ
            </a>
        </div>
    </nav>
</header>
