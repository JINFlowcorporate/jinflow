@if(\Illuminate\Support\Facades\Route::currentRouteName() !== 'checkout')
    <div wire:click="$emitTo('cart-controller', 'toggleMenu')" class="cursor-pointer inline-block">
        <div class="text-base inline-flex font-medium text-white hover:text-indigo-50" key="Company">
            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <span>({{ $cart_count }})</span>
        </div>
    </div>
@endif
