<form wire:submit.prevent="update" class="space-y-8 divide-y divide-gray-200 p-6 overflow-y-scroll w-full" role="form">
    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
        <div>
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Profile
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    This information will be displayed publicly so be careful what you share.
                </p>
            </div>
        </div>

        <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div class="space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Username
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="username" value="{{ $username }}" type="text" name="username" id="username" autocomplete="username"
                               class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>

                    @error('username') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                {{--<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="photo" class="block text-sm font-medium text-gray-700">
                        Photo
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="flex items-center">
                                  <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                      <path
                                          d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                  </span>
                            <button type="button"
                                    class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Change
                            </button>
                        </div>
                    </div>
                </div>--}}

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="firstname" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        First name
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="firstname" value="{{ $firstname }}" type="text" name="firstname‹" id="firstname" autocomplete="given-name"
                               class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                    @error('firstname') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="lastname" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Last name
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="lastname" value="{{ $lastname }}" type="text" name="lastname" id="lastname" autocomplete="family-name"
                               class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                    @error('lastname') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

            {{--    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="birthdate" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Birthdate
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="user.birthdate" value="{{ $user->birthdate }}" type="datetime-local" name="birthdate" id="birthdate"
                               class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>--}}


                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Email address
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="email" value="{{ $email }}" id="email" name="email" inputmode="email" type="email" autocomplete="email"
                               class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                    </div>
                    @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="phone" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Phone number
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="phone" value="{{ $phone }}" id="phone" name="phone" inputmode="numeric" type="number" autocomplete="phone"
                               class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                    </div>
                    @error('phone') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                {{--<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Country / Region
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <select id="country" name="country" autocomplete="country"
                                class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            <option>United States</option>
                            <option>Canada</option>
                            <option>Mexico</option>
                        </select>
                    </div>
                </div>--}}

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="address" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Street address
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="address" value="{{ $address }}" type="text" name="address" id="address" autocomplete="address"
                               class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                    </div>
                    @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="city" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        City
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="city" value="{{ $city }}" type="text" name="city" id="city"
                               class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                    @error('city') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="state" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        State / Province
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="state" value="{{ $state }}" type="text" name="state" id="state"
                               class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                    @error('state') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="zipcode" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        ZIP / Postal
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="zipcode" value="{{ $zipcode }}" type="number" name="zipcode" id="zipcode" inputmode="numeric" autocomplete="postal-code"
                               class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                    @error('zipcode') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="relative flex items-start">
                    <div class="flex items-center h-5">
                        <input wire:model="us_citizen" value="{{ $us_citizen }}" {{ $us_citizen ? 'checked' : '' }} id="us_citizen" aria-describedby="us_citizen" name="us_citizen" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="us_citizen" class="font-medium text-gray-700">US citizen</label>
                    </div>
                    @error('us_citizen') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="pt-5">
        <div class="flex justify-end">
            <button type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </div>
</form>
