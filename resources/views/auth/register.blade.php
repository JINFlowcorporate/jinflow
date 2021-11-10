@section('title', __('pages.register'))

<x-guest-layout>
    <div class="min-h-screen flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <a href="{{ route('home') }}">
                        <svg class="h-12 w-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 714.2 142.4"><defs><style>.cls-1{fill:#264461;}</style></defs><g id="Calque_2" data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M31.12,40v15.9L42.35,44.7V28.81Z"/><polygon class="cls-1" points="13.54 57.61 13.54 84.74 2.31 73.51 0 71.2 2.31 68.84 13.54 57.61"/><polygon class="cls-1" points="71.15 0 71.15 142.4 31.12 102.31 31.12 84.06 42.35 72.83 42.35 97.65 59.92 115.22 59.92 11.23 71.15 0"/><polygon class="cls-1" points="42.35 28.81 42.35 44.7 31.12 55.94 31.12 40.04 42.35 28.81"/><polygon class="cls-1" points="166.76 71.2 164.46 73.51 153.22 84.74 153.22 57.61 164.46 68.84 166.76 71.2"/><polygon class="cls-1" points="135.65 40.04 135.65 102.31 124.42 113.55 124.42 86.06 106.84 46.6 106.84 131.12 95.61 142.4 95.61 0 100.68 5.12 106.84 11.23 106.84 18.89 124.42 58.38 124.42 28.81 135.65 40.04"/><path class="cls-1" d="M203.8,137.69h-6.3l-1.7,4.5H194l5.8-15.5h1.5l5.9,15.5h-1.8Zm-.6-1.6-2.5-6.9-2.5,6.9Z"/><path class="cls-1" d="M237.1,126.69v15.5h-1.5l-8.7-12.5v12.6h-1.6v-15.5h1.5l8.7,12.6v-12.6h1.6Z"/><path class="cls-1" d="M254.8,140.59v1.6H244.5v-15.5h10.2v1.6h-8.6v5.4H254v1.6h-7.9v5.4Z"/><path class="cls-1" d="M282.4,126.69l-5,15.5h-1.6l-4-12.9-4,12.9h-1.6l-5.1-15.5h1.8l4.1,12.9,4-12.9h1.6l4,12.9,4.1-12.9Z"/><path class="cls-1" d="M310.2,140.59v1.6H299.9v-15.5h10.2v1.6h-8.6v5.4h7.9v1.6h-7.9v5.4Z"/><path class="cls-1" d="M326.8,142.19l-3.3-5.9h-4.3v5.9h-1.6v-15.5h5.8a4.8,4.8,0,0,1,4.9,4.7,4.62,4.62,0,0,1-3.2,4.6l3.5,6.2Zm-7.5-7.4h4.2a3.2,3.2,0,0,0,0-6.4h-4.2Z"/><path class="cls-1" d="M344.6,137.69h-6.3l-1.7,4.5h-1.8l5.8-15.5h1.5l5.9,15.5h-1.8Zm-.6-1.6-2.5-6.9-2.5,6.9Z"/><path class="cls-1" d="M367.6,126.69v15.5H366v-15.5Z"/><path class="cls-1" d="M386.9,126.69v15.5h-1.5l-8.7-12.5v12.6h-1.6v-15.5h1.5l8.7,12.6v-12.6h1.6Z"/><path class="cls-1" d="M417.9,138.19l1.4.7a7.32,7.32,0,0,1-6.4,3.5,7.91,7.91,0,0,1,0-15.8,7.55,7.55,0,0,1,6.4,3.5l-1.4.7a6,6,0,0,0-5-2.7,6.31,6.31,0,0,0,0,12.6A5.25,5.25,0,0,0,417.9,138.19Z"/><path class="cls-1" d="M435,137.69h-6.3l-1.7,4.5h-1.8l5.8-15.5h1.5l5.9,15.5h-1.7Zm-.6-1.6-2.5-6.9-2.5,6.9Z"/><path class="cls-1" d="M456.3,137.89c0,3-2.8,4.5-5.6,4.5-3.5,0-5.6-1.7-6.2-3.4l1.5-.5c.6,1.5,2.3,2.3,4.7,2.3,1.6,0,4.1-.7,4.1-2.9,0-1.7-1.3-2.1-4.3-2.7s-5.5-1.4-5.5-4.2c0-2.3,1.7-4.4,5.5-4.4,2.7,0,4.7,1.4,5.3,3.3l-1.5.5c-.4-1.7-2.1-2.3-3.8-2.3-2.4,0-3.9,1-3.9,2.8,0,1.5,1.3,2.2,4.2,2.7S456.3,134.89,456.3,137.89Z"/><path class="cls-1" d="M475,126.69v15.5h-1.6v-6.9h-8.5v6.9h-1.6v-15.5h1.6v7h8.5v-7Z"/><path class="cls-1" d="M495.3,128.29v5.4h7.1v1.6h-7.1v6.9h-1.6v-15.5h10.2v1.6Z"/><path class="cls-1" d="M520,140.59v1.6h-9.3v-15.5h1.6v13.9Z"/><path class="cls-1" d="M540.8,134.49c0,4.4-3.1,7.9-7.5,7.9s-7.5-3.5-7.5-7.9a7.51,7.51,0,1,1,15,0Zm-1.6,0c0-3.5-2.4-6.3-5.9-6.3s-5.9,2.8-5.9,6.3,2.4,6.3,5.9,6.3,5.9-2.8,5.9-6.3Z"/><path class="cls-1" d="M567.9,126.69l-5,15.5h-1.6l-4-12.9-4,12.9h-1.6l-5.1-15.5h1.8l4.1,12.9,4-12.9h1.6l4,12.9,4.1-12.9Z"/><path class="cls-1" d="M246.2,15.09v64c0,7.9-2.2,14.1-6.6,18.5s-10.5,6.6-18.4,6.6c-8.5,0-15.2-2.5-20-7.4s-7.2-11.9-7.2-20.9h14.1c0,4.8,1,8.6,3.1,11.2s5.2,4,9.4,4c3.9,0,6.8-1.1,8.6-3.4a13.63,13.63,0,0,0,2.8-8.8v-64h14.2Z"/><path class="cls-1" d="M277.1,15.09v88.2H262.9V15.09Z"/><path class="cls-1" d="M365.7,103.29H351.5l-42.9-65.1v65.1H294.4V15.19h14.2l42.9,65.4V15.19h14.2Z"/><path class="cls-1" d="M435.1,15.09v11.5H397.2V54h31.2V65H397.2v38.4H383V15.19h52.1Z"/><path class="cls-1" d="M462.1,92.19h30.5v11.1H447.8V15.09H462v77.1Z"/><path class="cls-1" d="M566.8,19.69a41,41,0,0,1,15.6,16.1,47.31,47.31,0,0,1,5.7,23.3,47.31,47.31,0,0,1-5.7,23.3,41.64,41.64,0,0,1-15.6,16.1,45.58,45.58,0,0,1-44.5,0,41.89,41.89,0,0,1-15.7-16.1,47.36,47.36,0,0,1-5.8-23.3,46.31,46.31,0,0,1,5.8-23.3,41.89,41.89,0,0,1,15.7-16.1,45.58,45.58,0,0,1,44.5,0Zm-37.3,11.4a26.35,26.35,0,0,0-10.3,11.1,36.28,36.28,0,0,0-3.7,16.9A36.57,36.57,0,0,0,519.2,76a27,27,0,0,0,10.3,11.1A29.29,29.29,0,0,0,544.6,91a28.31,28.31,0,0,0,14.9-3.9A26.13,26.13,0,0,0,569.7,76a36.28,36.28,0,0,0,3.7-16.9,36.57,36.57,0,0,0-3.7-16.9,27.44,27.44,0,0,0-10.2-11.1,30.8,30.8,0,0,0-30,0Z"/><path class="cls-1" d="M714.2,15.09l-22,88.2H674.7l-18.6-68.2-18.6,68.2H620l-22-88.2h15.6l15.2,71.8,19.4-71.8H664l19.4,71.8,15.2-71.8Z"/></g></g></svg>
                    </a>
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                        {{ __('auth.form.register') }}
                    </h2>
                </div>

                <div class="mt-8">
                    <div class="mt-6">
                        <form method="POST" action="{{ route('register') }}" class="space-y-6">
                            @csrf

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <x-jet-label for="lastname" value="{{ __('account-details.lastname') }}" />
                                    <x-jet-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
                                    @error('us_citizen') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <x-jet-label for="firstname" value="{{ __('account-details.firstname') }}" />
                                    <x-jet-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block font-medium text-sm text-gray-700" for="username">{{ __('account-details.username') }}</label>
                                    <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" autofocus autocomplete="username" />
                                </div>

                                <div>
                                    <x-jet-label for="email" value="{{ __('account-details.email') }}" />
                                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <x-jet-label for="password" value="{{ __('account-details.password') }}" />
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                </div>

                                <div>
                                    <x-jet-label for="password_confirmation" value="{{ __('account-details.confirm-password') }}" />
                                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <x-jet-label for="referred_by" value="{{ __('account-details.referred_by') }}" />
                                    <x-jet-input id="referred_by" class="block mt-1 w-full" type="text" name="referred_by" :value="old('referred_by')" autofocus autocomplete="referred_by" />
                                </div>

                                <div class="flex items-end relative">
                                    <button style="padding-top: 10px; padding-bottom: 10px;" type="submit" class="w-full flex justify-center px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-palette-2-dark-blue hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ __('admin.buttons.register') }}
                                    </button>
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 absolute right-0" style="top: calc(100% + 5px);" href="{{ route('login') }}">
                                        {{ __('auth.form.already') }}
                                    </a>
                                </div>
                            </div>
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
