<div class="space-y-8 divide-y divide-gray-200 p-6 overflow-y-scroll w-full">
    <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{ __('holdings.title') }}
        </h3>
    </div>

    <div class="mt-10">
        @if($biens->count())
            <div class="mt-10 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach($biens as $bien)
                    <div class="group relative">
                        @if(isset($bien->images[0]->image) && !empty($bien->images[0]->image))
                            <div
                                class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none shadow-md">
                                <img src="{{ URL::asset('storage/' . $bien->images[0]->image) }}" alt="Product 1"
                                     class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                            </div>
                        @endif
                        <div class="p-6 mt-2 flex justify-between rounded-md bg-white shadow-md">
                            <div>
                                @if(isset($bien->slug) && !empty($bien->slug))
                                    <h3 class="text-sm text-gray-700">
                                        <a href="{{ route('biens', ['slug' => $bien->slug]) }}" target="_blank"
                                           rel="noreferrer noopener">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            <p>{{ $bien->name }}</p>
                                        </a>
                                    </h3>
                                @endif
                                @if(isset($bien->total_price) && !empty($bien->total_price))
                                    <p class="text-sm mt-2 font-medium text-gray-900">Total: ${{ $bien->total_price }}</p>
                                @endif
                            </div>
                            @if(isset($bien->quantity) && !empty($bien->quantity))
                                <div>
                                    <p class="text-sm font-medium text-gray-900">x{{ $bien->quantity }}</p>
                                    <p class="mt-2 text-sm text-gray-500">${{ $bien->price_per_token }}/u</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="py-4 text-sm whitespace-no-wrap">
                {{ __('admin.errors.no-result') }}
            </p>
        @endif
    </div>
</div>
