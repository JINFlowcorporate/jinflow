    <form action="{{ route('store-payment') }}" id="form" method="post" class="mt-12">
        @csrf
        <div class="w-full p-6 flex">
            <div style="margin-left: auto; width: 40%;">
                <b class="text-gray-800">{{ __('cart.customer') }}</b>
                <div class="mt-4">
                    <label class="block text-sm text-gray-00" for="lastname">{{ __('admin.words.lastname') }}</label>
                    <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md @error('lastname') is-invalid @enderror" id="lastname" wire:model="lastname" name="lastname" type="text" placeholder="{{ __('admin.words.lastname') }}" aria-label="{{ __('admin.words.lastname') }}">
                </div>
                <div class="mt-4">
                    <label class="block text-sm text-gray-600" for="firstname">{{ __('admin.words.firstname') }}</label>
                    <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md @error('firstname') is-invalid @enderror" id="firstname" wire:model="firstname" name="firstname" type="text" placeholder="{{ __('admin.words.firstname') }}" aria-label="{{ __('admin.words.firstname') }}">
                </div>
                <div class="mt-4">
                    <label class="block text-sm text-gray-600" for="email">{{ __('admin.words.email') }}</label>
                    <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md @error('email') is-invalid @enderror" id="email" wire:model="email" name="email" type="email" inputmode="email" placeholder="{{ __('admin.words.email') }}" aria-label="E-mail">
                </div>
                <div class="mt-4">
                    <label class=" block text-sm text-gray-600" for="address">{{ __('admin.users.address') }}</label>
                    <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md @error('address') is-invalid @enderror" id="address" wire:model="address" name="address" type="text" placeholder="{{ __('admin.users.address') }}" aria-label="{{ __('admin.users.address') }}">
                </div>
                <div class="mt-2">
                    <label class="hidden text-sm block text-gray-600" for="city">{{ __('admin.users.city') }}</label>
                    <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md @error('city') is-invalid @enderror" id="city" wire:model="city" name="city" type="text" placeholder="{{ __('admin.users.city') }}" aria-label="{{ __('admin.users.city') }}">
                </div>
                <div class="flex justify-between mt-2">
                    <div class="inline-block -mx-1 pl-1 w-1/2">
                        <label class="hidden block text-sm text-gray-600" for="zipcode">{{ __('admin.users.zipcode') }}</label>
                        <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md @error('zipcode') is-invalid @enderror" id="zipcode" wire:model="zipcode"  name="zipcode" type="number" inputmode="numeric" placeholder="{{ __('admin.users.zipcode') }}" aria-label="{{ __('admin.users.zipcode') }}">
                    </div>
                    <div class="inline-block w-1/2">
                        <label class="hidden block text-sm text-gray-600" for="billing_country">{{ __('admin.users.country') }}</label>
                        <input class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md @error('billing_country') is-invalid @enderror" id="billing_country" wire:model="billing_country" name="billing_country" type="text" placeholder="{{ __('admin.users.country') }}" aria-label="{{ __('admin.users.country') }}">
                    </div>
                </div>

                <b class="text-gray-800 pt-10 block">{{ __('cart.method') }}</b>

                <div>
                    <label class="text-base font-medium text-gray-900">Notifications</label>
                    <p class="text-sm leading-5 text-gray-500">How do you prefer to receive notifications?</p>
                    <fieldset class="mt-4">
                        <legend class="sr-only">Notification method</legend>
                        <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                            <div class="flex items-center">
                                <input id="coinbase" name="coinbase" type="radio" checked wire:change="changeCoinbase('{{ 'coinbase' }}')" wire:model="coinbase" value="coinbase" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="coinbase" class="ml-3 block text-sm font-medium text-gray-700">
                                    Coinbase
                                </label>
                            </div>

                            <div class="flex items-center">
                                <input id="stripe" name="coinbase" type="radio" wire:change="changeCoinbase('{{ 'stripe' }}')" wire:model="coinbase" value="stripe" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="stripe" class="ml-3 block text-sm font-medium text-gray-700">
                                    Stripe
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>

                <div class="mt-4">
                    <input type="hidden" name="payment_method" id="payment_method" />
                    <div id="card-element"></div>
                    <div class="mt-2 text-sm text-red-500" id="card-errors"></div>
                </div>
            </div>

            <div class="p-6 block w-1/3 ml-10 bg-gray-100 flex flex-col justify-between rounded-md" style="margin-right: auto;">
                <ul role="list">
                    @if($biens)
                        @foreach($biens as $bien)
                            <li class="pb-4 flex">
                                <div class="flex-shrink-0 border border-gray-200 rounded-md overflow-hidden" style="width: 50px;">
                                    <img width="50" height="50" src="{{ \Illuminate\Support\Facades\URL::asset(/*'storage/' . */\App\Models\Biens::where('id', $bien->id)->first()->mainImage()->image) }}" alt="Property image" class="w-full h-full object-center object-cover">
                                </div>

                                <div class="ml-4 flex-1 flex flex-col">
                                    <div>
                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                            <h3>
                                                {{ $bien->name }}
                                            </h3>
                                            <p class="ml-4 font-bold">
                                                ${{ number_format($bien->price * $bien->qty, 2, ',', ' ') }}
                                            </p>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ $bien->name }}
                                        </p>
                                    </div>
                                    <div class="flex-1 flex items-end justify-between text-sm">
                                        <p class="text-gray-500">
                                            {{ __('cart.quantity') }}: {{ $bien->qty }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>

                <div class="w-full">
                    @if($coinbase === 'stripe')
                        <button id="submit-button" type="submit" class="w-full py-3 px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">{{ __('cart.pay') }} ${{ $total }}</button>
                    @else
                        <button wire:click.prevent="coinbaseMethod" id="submit-coinbase" type="button" class="w-full py-3 px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">{{ __('cart.pay') }} ${{ $total }}</button>
                    @endif
                </div>
            </div>
        </div>
    </form>

        @section('javascript')
        <script src="https://js.stripe.com/v3/"></script>

        <script>
            const stripe = Stripe(" {{ env('STRIPE_KEY') }} ");
            const elements = stripe.elements();
            const cardElement = elements.create('card', {
                classes: {
                    base: ' w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md'
                }
            });
            window.addEventListener('methodChanged', event => {
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
                        document.getElementById('form').submit();
                    }
                });
            });
        </script>
        @endsection
