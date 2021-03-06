<div class="fixed inset-0 overflow-hidden z-50 {{ $open ? 'opacity-100 visible' : 'opacity-0 invisible hidden' }}" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <div class="absolute inset-0 overflow-hidden">
        <!--
          Background overlay, show/hide based on slide-over state.

          Entering: "ease-in-out duration-500"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in-out duration-500"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div wire:click="toggleM()" class="absolute inset-0 ease-in-out duration-500 {{ $open ? 'opacity-100 visible' : 'opacity-0 hidden' }}" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.6)"></div>

        <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex transform transition-all ease-in-out duration-500 sm:duration-700 {{ $open ? 'translate-x-0' : 'translate-x-full' }}">
            <!--
              Slide-over panel, show/hide based on slide-over state.

              Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                From: "translate-x-full"
                To: "translate-x-0"
              Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                From: "translate-x-0"
                To: "translate-x-full"
            -->
            <div class="w-screen max-w-md">
                <div class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll">
                    <div class="flex-1 py-6 overflow-y-auto px-4 sm:px-6">
                        <div class="flex items-start justify-between">
                            <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                                {{ __('cart.title') }}
                            </h2>
                            <div class="ml-3 h-7 flex items-center">
                                <button type="button" wire:click.prevent="toggleM()" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">{{ __('cart.close-panel') }}</span>
                                    <!-- Heroicon name: outline/x -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="mt-8">
                            <div class="flow-root">
                                @if($biens->count())
                                <ul role="list" class="-my-6 divide-y divide-gray-200">
                                        @foreach($biens as $bien)
                                    <li class="py-6 flex">
                                        <div class="flex-shrink-0 border border-gray-200 rounded-md overflow-hidden" style="width: 50px;">
                                            <img width="50" height="50" src="{{ \Illuminate\Support\Facades\URL::asset(/*'storage/' . */\App\Models\Biens::where('id', $bien->id)->first()->mainImage()->image) }}" alt="Property image" class="w-full h-full object-center object-cover">
                                        </div>

                                        <div class="ml-4 flex-1 flex flex-col">
                                            <div>
                                                <div class="flex justify-between text-base font-medium text-gray-900">
                                                    <h3 class="font-bold">{{ $bien->name }}</h3>
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

                                                <div class="flex">
                                                    <button wire:click.prevent="removeItemCart('{{ $bien->rowId }}')" type="button" class="font-medium text-indigo-600 hover:text-indigo-500">{{ __('cart.remove') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                        @endforeach
                                </ul>
                                @else
                                    <p>{{ __('cart.empty-cart') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                        <div class="flex justify-between text-base font-medium text-gray-900">
                            <p>Total</p>
                            <p class="font-bold">${{ $total }}</p>
                        </div>
{{--                        <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>--}}
                        @if($cartCount > 0)
                            @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->is_active)
                                <div class="mt-6">
                                    <a href="{{ route('checkout') }}" class="flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">{{ __('cart.checkout') }}</a>
                                </div>
                            @else
                                <a class="block mt-6 font-bold text-indigo-600 hover:text-indigo-500" href="{{ route('kyc_stuff') }}">{{ __('cart.verify-my-account') }} ???</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
