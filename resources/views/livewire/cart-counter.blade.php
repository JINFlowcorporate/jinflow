<div wire:click="$emitTo('cart-controller', 'toggleMenu')" class="cursor-pointer inline-block">
    <p class="text-base font-medium text-white hover:text-indigo-50" key="Company">
        Cart ({{ $cart_count }})
    </p>
</div>
