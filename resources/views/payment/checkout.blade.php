<x-guest-layout>
    @include('navigation-menu')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    <form action="{{ route('store-payment') }}" id="form" method="post" class="flex justify-between">
        @csrf
        <div class="w-full p-6 flex justify-between">
            <div>
                <p class="text-gray-800 font-medium">Customer information</p>
                <div class="mt-4">
                    <label class="block text-sm text-gray-00" for="lastname">{{ __('admin.words.lastname') }}</label>
                    <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-md sm:text-sm border-gray-300 rounded-md @error('lastname') is-invalid @enderror" id="lastname" value="{{ old('lastname') ? old('lastname') : $user->lastname }}" name="lastname" type="text" placeholder="{{ __('admin.words.lastname') }}" aria-label="{{ __('admin.words.lastname') }}">
                </div>
                <div class="mt-4">
                    <label class="block text-sm text-gray-600" for="firstname">{{ __('admin.words.firstname') }}</label>
                    <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-md sm:text-sm border-gray-300 rounded-md @error('firstname') is-invalid @enderror" id="firstname" value="{{ old('firstname') ? old('firstname') : $user->firstname }}" name="firstname" type="text" placeholder="{{ __('admin.words.firstname') }}" aria-label="{{ __('admin.words.firstname') }}">
                </div>
                <div class="mt-4">
                    <label class="block text-sm text-gray-600" for="email">{{ __('admin.words.email') }}</label>
                    <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-md sm:text-sm border-gray-300 rounded-md @error('email') is-invalid @enderror" id="email" value="{{ old('email') ? old('email') : $user->email }}" name="email" type="email" inputmode="email" placeholder="{{ __('admin.words.email') }}" aria-label="E-mail">
                </div>
                <div class="mt-4">
                    <label class=" block text-sm text-gray-600" for="address">{{ __('admin.users.address') }}</label>
                    <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-md sm:text-sm border-gray-300 rounded-md @error('address') is-invalid @enderror" id="address" value="{{ old('address') ? old('address') : $user->address }}" name="address" type="text" placeholder="{{ __('admin.users.address') }}" aria-label="{{ __('admin.users.address') }}">
                </div>
                <div class="mt-2">
                    <label class="hidden text-sm block text-gray-600" for="city">{{ __('admin.users.city') }}</label>
                    <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-md sm:text-sm border-gray-300 rounded-md @error('city') is-invalid @enderror" id="city" value="{{ old('city') ? old('city') : $user->city }}" name="city" type="text" placeholder="{{ __('admin.users.city') }}" aria-label="{{ __('admin.users.city') }}">
                </div>
                <div class="flex justify-between mt-2">
                    <div class="inline-block -mx-1 pl-1 w-1/2">
                        <label class="hidden block text-sm text-gray-600" for="zipcode">{{ __('admin.users.zipcode') }}</label>
                        <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-md sm:text-sm border-gray-300 rounded-md @error('zipcode') is-invalid @enderror" id="zipcode" value="{{ old('zipcode') ? old('zipcode') : $user->zipcode }}"  name="zipcode" type="number" inputmode="numeric" placeholder="{{ __('admin.users.zipcode') }}" aria-label="{{ __('admin.users.zipcode') }}">
                    </div>
                    <div class="inline-block w-1/2">
                        <label class="hidden block text-sm text-gray-600" for="billing_country">{{ __('admin.users.country') }}</label>
                        <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-md sm:text-sm border-gray-300 rounded-md @error('billing_country') is-invalid @enderror" id="billing_country" value="{{ old('billing_country') ? old('billing_country') : $user->billing_country }}" name="billing_country" type="text" placeholder="{{ __('admin.users.country') }}" aria-label="{{ __('admin.users.country') }}">
                    </div>
                </div>
                {{--<div class="block mt-4">
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
                </div>--}}
                <div class="mt-4">
                    <input type="hidden" name="payment_method" id="payment_method" />
                    <div id="card-element"></div>
                    <div class="mt-2 text-sm text-red-500" id="card-errors"></div>
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
                    <button id="submit-button" type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">Payer ${{ $total }}</button>
                </div>
            </ul>
        </div>
    </form>

    @section('javascript')
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            const stripe = Stripe(" {{ env('STRIPE_KEY') }} ");
            const elements = stripe.elements();
            const cardElement = elements.create('card', {
                classes: {
                    base: 'StripeElement bg-white w-1/2 p-2 my-2 rounded-lg'
                }
            });
            cardElement.mount('#card-element');
            const cardButton = document.getElementById('submit-button');
            cardButton.addEventListener('click', async(e) => {
                e.preventDefault();
                const { paymentMethod, error } = await stripe.createPaymentMethod(
                    'card', cardElement
                );
                if (error) {
                    alert(error)
                } else {
                    document.getElementById('payment_method').value = paymentMethod.id;
                }
                document.getElementById('form').submit();
            });
        </script>
    @endsection


    @include('footer')
</x-guest-layout>

