@section('title', __('pages.nos-biens'))

<div>
    <div class="max-w-2xl mx-auto lg:max-w-7xl p-5">
        <h2 class="text-2xl mb-6 font-extrabold tracking-tight text-gray-900">{{ __('our-properties.our-properties') }}</h2>
        @if($biens)
        <div>
            @foreach($biens as $key => $bien)
                <a href="{{ route('biens', ['slug' => $bien->slug]) }}" class="mt-10 group flex flex-col justify-between bg-white relative overflow-hidden shadow-xl rounded-lg {{ $key % 2 === 1 ? 'lg:flex-row-reverse' : 'lg:flex-row' }}">
                    @if($bien->total_tokens === 0)
                        <h2 style="left: 50%; top: 50%; transform: translate(-50%, -50%) rotate(15deg);" class="absolute uppercase font-bold text-center text-red-600 text-4xl bg-red-100 rounded-lg p-5 border-2 border-red-600 border-solid">SOLD-OUT</h2>
                    @endif
                    <div class="@if($bien->total_tokens === 0) opacity-25 @endif lg:w-1/2 w-full overflow-hidden">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('storage/' . $bien->images[0]->image) }}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="w-full h-full object-center object-cover group-hover:opacity-75">
                    </div>
                    <div class="@if($bien->total_tokens === 0) opacity-25 @endif lg:w-1/2 w-full p-6 rounded-lg flex flex-col justify-between {{ $key % 2 === 0 ? 'ml-4' : 'mr-4' }}">
                        <h3 class="text-3xl font-bold text-gray-900">
                            {{ $bien->name }}
                        </h3>
                        <p class="mt-2 text-lg font-medium text-gray-700 overflow-ellipsis">
                            {{ substr($bien->description, 0, 450) }}...
                        </p>
                        <p class="mt-2 text-right text-lg font-bold text-gray-700">
                            ${{ number_format($bien->price, 2, ',', ' ') }} USD
                        </p>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $biens->links('custom-pagination-links-view') }}
        </div>
        @endif
    </div>
</div>
