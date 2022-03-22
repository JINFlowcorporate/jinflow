@section('title', __('pages.confirmation'))

<x-guest-layout>
    @include('navigation-menu')

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="mb-6 font-bold text-2xl">{{ __('orders.history') }}</h1>
            <div class="border border-gray-200 border-solid rounded-lg">
                <div class="p-6 border-b border-solid border-gray-200 flex items-center">
                    <div>
                        <p class="font-bold">{{ __('orders.nb-order') }}</p>
                        <p>#{{ $order->id }}</p>
                    </div>
                    <div class="ml-10">
                        <p class="font-bold">Date</p>
                        <p>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</p>
                    </div>
                    <div class="ml-10">
                        <p class="font-bold">Total</p>
                        <p>${{ number_format($order->total, 2, ',', ' ') }}</p>
                    </div>
                   <!-- <a href="/" download class="text-indigo-700" style="margin-left: auto;">{{ __('orders.download-invoice') }}</a> -->
                </div>

                @if($order->order_product)
                    @foreach($order->order_product as $bien)
                        <div class="p-6 border-b border-solid border-gray-200 inline-flex w-full article">
                            <img class="rounded-md w-20 h-20" src="{{ \Illuminate\Support\Facades\URL::asset(/*'storage/' . */\App\Models\Biens::where('id', $bien->biens_id)->first()->mainImage()->image) }}" alt="Maison">
                            <div class="w-full relative flex flex-col justify-between pl-4">
                                <div class="flex justify-between">
                                    <p>{{ \App\Models\Biens::where('id', $bien->biens_id)->pluck('name')->first() }}</p>
                                    <p class="font-bold">${{ number_format($bien->total_price, 2, ',', ' ') }}</p>
                                </div>
                                <small class="text-gray-500">x{{ $bien->quantity }}</small>
                                <small class="text-right text-indigo-700"><a target="_blank" rel="noreferrer noopener" href="{{ route('biens', ['slug' => \App\Models\Biens::where('id', $bien->biens_id)->pluck('slug')->first()]) }}">{{ __('orders.view') }}</a></small>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @include('footer')
</x-guest-layout>
