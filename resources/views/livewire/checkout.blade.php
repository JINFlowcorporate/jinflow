<div class="flex justify-between">
    <div class="w-full p-6 flex justify-between">
        <div>
            <p class="text-gray-800 font-medium">Customer information</p>
            <div class="mt-4">
                <label class="block text-sm text-gray-00" for="lastname">{{ __('admin.words.lastname') }}</label>
                <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-md sm:text-sm border-gray-300 rounded-md" id="lastname" value="{{ $lastname }}" name="lastname" type="text" wire:model="lastname" placeholder="{{ __('admin.words.lastname') }}" aria-label="{{ __('admin.words.lastname') }}">
            </div>
            <div class="mt-4">
                <label class="block text-sm text-gray-600" for="firstname">{{ __('admin.words.firstname') }}</label>
                <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-md sm:text-sm border-gray-300 rounded-md" id="firstname" value="{{ $firstname }}" name="firstname" type="text" wire:model="firstname" placeholder="{{ __('admin.words.firstname') }}" aria-label="{{ __('admin.words.firstname') }}">
            </div>
            <div class="mt-4">
                <label class="block text-sm text-gray-600" for="email">{{ __('admin.words.email') }}</label>
                <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-md sm:text-sm border-gray-300 rounded-md" id="email" value="{{ $email }}" name="email" type="email" inputmode="email" wire:model="email" placeholder="{{ __('admin.words.email') }}" aria-label="E-mail">
            </div>
            <div class="mt-4">
                <label class=" block text-sm text-gray-600" for="address">{{ __('admin.users.address') }}</label>
                <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-md sm:text-sm border-gray-300 rounded-md" id="address" value="{{ $address }}" name="address" type="text" wire:model="address" placeholder="{{ __('admin.users.address') }}" aria-label="{{ __('admin.users.address') }}">
            </div>
            <div class="mt-2">
                <label class="hidden text-sm block text-gray-600" for="city">{{ __('admin.users.city') }}</label>
                <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-md sm:text-sm border-gray-300 rounded-md" id="city" value="{{ $city }}" name="city" type="text" wire:model="city" placeholder="{{ __('admin.users.city') }}" aria-label="{{ __('admin.users.city') }}">
            </div>
            <div class="flex justify-between mt-2">
                <div class="inline-block -mx-1 pl-1 w-1/2">
                    <label class="hidden block text-sm text-gray-600" for="zipcode">{{ __('admin.users.zipcode') }}</label>
                    <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-md sm:text-sm border-gray-300 rounded-md" id="zipcode" value="{{ $zipcode }}"  name="zipcode" type="number" inputmode="numeric" wire:model="zipcode" placeholder="{{ __('admin.users.zipcode') }}" aria-label="{{ __('admin.users.zipcode') }}">
                </div>
                <div class="inline-block w-1/2">
                    <label class="hidden block text-sm text-gray-600" for="billing_country">{{ __('admin.users.country') }}</label>
                    <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-md sm:text-sm border-gray-300 rounded-md" id="billing_country" value="{{ $billing_country }}" name="billing_country" type="text" wire:model="billing_country" placeholder="{{ __('admin.users.country') }}" aria-label="{{ __('admin.users.country') }}">
                </div>
            </div>
            <div class="block mt-4">
                <span class="text-gray-700">Method payment</span>
                <div>
                    <div class="flex">
                        <div>
                            <label class="block text-sm text-gray-600" for="stripe">{{ __('Stripe') }}</label>
                            <input type="radio" class="form-radio" name="stripe" value="stripe" wire:model="payment_method" checked>
                        </div>
                        <div class="ml-4">
                            <label class="block text-sm text-gray-600" for="coinbase">{{ __('Coinbase') }}</label>
                            <input type="radio" class="form-radio" name="stripe" value="coinbase" wire:model="payment_method">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul role="list" class="p-6 block w-1/3">
            @if($biens)
                @foreach($biens as $bien)
                    <li class="py-6 flex">
                        <div class="flex-shrink-0 border border-gray-200 rounded-md overflow-hidden" style="width: 50px;">
                            <img width="50" height="50" src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="w-full h-full object-center object-cover">
                        </div>

                        <div class="ml-4 flex-1 flex flex-col">
                            <div>
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <h3>
                                        {{ $bien->name }}
                                    </h3>
                                    <p class="ml-4">
                                        ${{ $bien->price * $bien->qty }}
                                    </p>
                                </div>
                                <p class="mt-1 text-sm text-gray-500">
                                    Salmon
                                </p>
                            </div>
                            <div class="flex-1 flex items-end justify-between text-sm">
                                <p class="text-gray-500">
                                    Qty {{ $bien->qty }}
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif

            <div class="mt-4">
                <button id="payment-button" type="submit" wire:click="placeOrder" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">Payer ${{ $total }}</button>
            </div>
        </ul>
    </div>
</div>