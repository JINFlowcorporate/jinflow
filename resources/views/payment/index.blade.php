<x-guest-layout>
    @include('navigation-menu')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    <form action="{{ route('store-payment') }}" id="form" method="post" class="p-6 bg-palette-2-dark-blue rounded-lg mt-10 w-1/2 md:w-full mx-auto">
        @csrf
        <div>
            <input type="hidden" name="payment_method" id="payment_method" />
            <div id="card-element"></div>
            <div class="mt-2 text-sm text-red-500" id="card-errors"></div>
        </div>
        <button id="submit-button" type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">Payer ${{ $total }}</button>
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
