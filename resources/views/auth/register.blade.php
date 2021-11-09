<x-guest-layout>
    <div class="min-h-screen flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <img class="h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
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
                                    <x-jet-label for="username" value="{{ __('account-details.username') }}" />
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
                                    <button style="padding-top: 10px; padding-bottom: 10px;" type="submit" class="w-full flex justify-center px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ __('admin.buttons.register') }}
                                    </button>
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 absolute right-0" style="top: calc(100% + 5px);" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
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
