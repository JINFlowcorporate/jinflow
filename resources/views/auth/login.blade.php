@section('title', __('pages.login'))

<x-guest-layout>
    <div class="min-h-screen flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <a href="{{ route('home') }}">
                        <svg class="h-12 w-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 772.92 122.04"><defs><style>.cls-1{fill:#264461;}</style></defs><g id="Calque_2" data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M26.67,34.31V47.94l9.62-9.63V24.69Z"/><polygon class="cls-1" points="11.61 49.37 11.61 72.62 1.98 63 0 61.02 1.98 59 11.61 49.37"/><polygon class="cls-1" points="60.98 0 60.98 122.04 26.67 87.68 26.67 72.04 36.29 62.41 36.29 83.69 51.35 98.75 51.35 9.63 60.98 0"/><polygon class="cls-1" points="36.29 24.69 36.29 38.31 26.67 47.94 26.67 34.31 36.29 24.69"/><polygon class="cls-1" points="142.92 61.02 140.94 63 131.31 72.62 131.31 49.37 140.94 59 142.92 61.02"/><polygon class="cls-1" points="116.25 34.31 116.25 87.68 106.63 97.31 106.63 73.75 91.56 39.94 91.56 112.37 81.94 122.04 81.94 0 86.29 4.39 91.56 9.63 91.56 16.19 106.63 50.03 106.63 24.69 116.25 34.31"/><path class="cls-1" d="M236.8,10.61V83.93c0,9-2.52,16.15-7.56,21.19s-12,7.56-21.08,7.56c-9.74,0-17.41-2.86-22.91-8.47S177,90.57,177,80.26h16.15c0,5.5,1.15,9.85,3.55,12.83s6,4.59,10.77,4.59c4.47,0,7.79-1.26,9.85-3.9a15.58,15.58,0,0,0,3.21-10.08V10.38H236.8Z"/><path class="cls-1" d="M272.2,10.61v101H255.93v-101Z"/><path class="cls-1" d="M373.69,111.65H357.43L308.28,37.08v74.57H292V10.73h16.27l49.15,74.92V10.73h16.26Z"/><path class="cls-1" d="M453.19,10.61V23.79H409.78V55.18h35.74v12.6H409.78v44H393.51v-101h59.68Z"/><path class="cls-1" d="M484.12,98.94h34.94v12.71H467.74v-101H484V98.94Z"/><path class="cls-1" d="M604.06,15.88a46.94,46.94,0,0,1,17.87,18.45A54.09,54.09,0,0,1,628.46,61a54.14,54.14,0,0,1-6.53,26.69,47.72,47.72,0,0,1-17.87,18.44,52.16,52.16,0,0,1-51,0,48,48,0,0,1-18-18.44A54.31,54.31,0,0,1,528.46,61a53,53,0,0,1,6.64-26.69,48,48,0,0,1,18-18.45,52.23,52.23,0,0,1,51,0ZM561.33,28.94a30.21,30.21,0,0,0-11.8,12.72c-2.86,5.5-4.23,12-4.23,19.36a42,42,0,0,0,4.23,19.36,31,31,0,0,0,11.8,12.71,33.56,33.56,0,0,0,17.3,4.47,32.42,32.42,0,0,0,17.07-4.47,29.94,29.94,0,0,0,11.69-12.71c2.86-5.5,4.23-12,4.23-19.36a41.93,41.93,0,0,0-4.23-19.36A31.47,31.47,0,0,0,595.7,28.94a35.27,35.27,0,0,0-34.37,0Z"/><path class="cls-1" d="M772.92,10.61l-25.2,101H727.67L706.36,33.52l-21.31,78.13H665l-25.21-101h17.88l17.41,82.25,22.22-82.25h18.1l22.23,82.25,17.41-82.25Z"/></g></g></svg>
                    </a>
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                        {{ __('auth.form.login') }}
                    </h2>
                </div>

                <div class="mt-8">
                    <div class="mt-6">
                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf

                        @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div>
                                <x-jet-label for="email" value="{{ __('account-details.email') }}" />
                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus />
                                @error('email') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="password" value="{{ __('account-details.password') }}" />
                                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="current-password" />
                                @error('password') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="block mt-4">
                                    <label for="remember_me" class="flex items-center">
                                        <x-jet-checkbox id="remember_me" name="remember" />
                                        <span class="ml-2 text-sm text-gray-600">{{ __('auth.form.remember-me') }}</span>
                                    </label>
                                </div>

                                {{--<div class="text-sm">
                                    @if (Route::has('password.request'))
                                        <a class="font-medium text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                                            {{ __('auth.form.forgot') }}
                                        </a>
                                    @endif
                                </div>--}}
                            </div>

                            <div>
                                <button style="padding-top: 10px; padding-bottom: 10px;" type="submit" class="w-full flex justify-center px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-palette-2-dark-blue hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('admin.buttons.login') }}
                                </button>
                            </div>

                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                                {{ __('auth.form.create-account') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1505904267569-f02eaeb45a4c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80" alt="">
        </div>
    </div>
</x-guest-layout>
