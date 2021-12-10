@section('title', __('pages.biens'))

<div class="bg-white">
    <div class="pt-6">
        <!-- Image gallery -->
        <div class="mt-6 max-w-2xl mx-auto lg:max-w-7xl sm:px-6 lg:px-8">
            <div class="w-full lg:grid lg:grid-cols-3 lg:gap-x-8">
                <div class="hidden aspect-w-3 aspect-h-4 rounded-lg overflow-hidden lg:block">
                    <img src="{{ URL::asset(/*'storage/' . */$item->images[0]->image) }}" alt="Two each of gray, white, and black shirts laying flat." class="w-full h-full object-center object-cover">
                </div>
                <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                        <img src="{{ URL::asset(/*'storage/' . */$item->images[1]->image) }}" alt="Model wearing plain black basic tee." class="w-full h-full object-center object-cover">
                    </div>
                    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                        <img src="{{ URL::asset(/*'storage/' . */$item->images[2]->image) }}" alt="Model wearing plain gray basic tee." class="w-full h-full object-center object-cover">
                    </div>
                </div>
                <div class="aspect-w-4 aspect-h-5 sm:rounded-lg sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4">
                    <img src="{{ URL::asset(/*'storage/' . */$item->images[3]->image) }}" alt="Model wearing plain white basic tee." class="w-full h-full object-center object-cover">
                </div>
            </div>
        </div>

        <!-- Product info -->
        <div class="max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                    {{ $item->name }}
                </h1>
            </div>

            <!-- Options -->
            <div class="mt-4 lg:mt-0 lg:row-span-3">
                <h2 class="sr-only">{{ __('property.product-information.title') }}</h2>
                <p class="text-3xl text-gray-900 font-bold">${{ number_format($item->price, 2, ',', ' ') }} USD</p>

                <form @if($item->total_tokens > 0) wire:submit.prevent="addToCart({{ $item->id }}) @endif" class="mt-10" method="post">
                    @csrf
                    <div class="mt-10">
                        <h3 class="text-sm font-medium text-gray-900">{{ __('property.product-information.financials') }}</h3>

                        <div class="mt-4">
                            <ul role="list" class="pl-4 list-disc text-sm space-y-2">
                                <li class="flex justify-between items-center text-gray-400"><span class="text-gray-600">{{ __('property.product-information.gross-rent-year') }}</span><span class="ml-10 text-black">${{ $item->gross_rent_year }}</span></li>

                                <li class="flex justify-between items-center text-gray-400"><span class="text-gray-600">{{ __('property.product-information.gross-rent-month') }}</span><span class="ml-10 text-black">${{ $item->gross_rent_month }}</span></li>

                                <li class="flex justify-between items-center text-gray-400"><span class="text-gray-600">{{ __('property.product-information.net-rent-year') }}</span><span class="ml-10 text-black">${{ $item->net_rent_month }}</span></li>

                                <li class="flex justify-between items-center text-gray-400"><span class="text-gray-600">{{ __('property.product-information.net-rent-month') }}</span><span class="ml-10 text-black">${{ $item->net_rent_year }}</span></li>
                            </ul>
                        </div>
                        @if($item->total_tokens > 0)
                            <div class="flex mt-5 flex-col items-start">
                                <label for="quantity" class="text-sm mb-4 text-gray-900 font-medium">{{ __('property.product-information.quantity') }}</label>
                                <x-jet-input id="quantity" wire:model="quantity" type="number" min="0" max="{{ $item->total_tokens }}" value="{{ $quantity }}"></x-jet-input>
                            </div>
                        @endif
                    </div>

                    @if($item->total_tokens > 0)
                        <button type="submit" class="mt-10 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('property.add-to-cart') }}</button>
                    @else
                        <h2 class="uppercase font-bold text-center text-red-600 text-3xl mt-10 bg-red-100 rounded-lg p-5 border-2 border-red-600 border-solid">{{ __('pages.sold-out') }}</h2>
                    @endif
                    @if (session()->has('message'))
                        <div class="mt-4 bg-green-100 text-center border border-green-400 text-green-800 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">{{ session('message') }}</strong>
                        </div>
                    @elseif(session()->has('stock'))
                        <div class="mt-4 bg-red-100 text-center border border-red-400 text-red-800 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">{{ session('stock') }}</strong>
                        </div>
                    @endif
                </form>
            </div>

            <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <!-- Description and details -->
                <div>
                    <h3 class="sr-only">Description</h3>

                    <div class="space-y-6">
                        <p class="text-base text-gray-900">{{ $item->description }}</p>
                    </div>
                </div>

                <div class="mt-10">
                    <h3 class="text-sm font-medium text-gray-900">{{ __('property.property-highlights.title') }}</h3>

                    <div class="mt-4">
                        <ul role="list" class="pl-4 max-w-sm list-disc text-sm space-y-2">
                            <li class="flex items-center justify-between text-gray-400"><span class="text-gray-600">{{ __('property.property-highlights.expected-yield') }}</span><span class="ml-10 text-black">{{ $item->expected_yield }}%</span></li>

                            <li class="flex items-center justify-between text-gray-400"><span class="text-gray-600">{{ __('property.property-highlights.rent-start-date') }}</span><span class="ml-10 text-black">{{ $item->rent_start_date }}</span></li>

                            <li class="flex items-center justify-between text-gray-400"><span class="text-gray-600">{{ __('property.property-highlights.rent-per-token') }}</span><span class="ml-10 text-black">${{ $item->gross_rent_year }}/Year</span></li>

                            <li class="flex items-center justify-between text-gray-400"><span class="text-gray-600">{{ __('property.property-highlights.token-price') }}</span><span class="ml-10 text-black">${{ $item->tokens_price }}</span></li>

                            <li class="flex items-center justify-between text-gray-400"><span class="text-gray-600">{{ __('property.property-highlights.total-token') }}</span><span class="ml-10 text-black">{{ $item->total_tokens }}</span></li>
                        </ul>
                    </div>
                </div>

                <div class="mt-10">
                    <h2 class="text-sm font-medium text-gray-900">{{ __('property.property-type.title') }}</h2>

                    <div class="mt-4">
                        <ul role="list" class="pl-4 max-w-sm list-disc text-sm space-y-2">
                            <li class="flex items-center justify-between list-disc text-gray-400"><span class="text-gray-600">Type</span><span class="ml-10">{{ $item->type }}</span></li>

                            <li class="flex items-center justify-between list-disc text-gray-400"><span class="text-gray-600">{{ __('property.property-type.beds') }}</span><span class="ml-10 text-black">{{ $item->nb_beds }}</span></li>

                            <li class="flex items-center justify-between list-disc text-gray-400"><span class="text-gray-600">{{ __('property.property-type.bathroom') }}</span><span class="ml-10 text-black">{{ $item->nb_bathroom }}</span></li>

                            <li class="flex items-center justify-between list-disc text-gray-400"><span class="text-gray-600">{{ __('property.property-type.square-feet') }}</span><span class="ml-10 text-black">{{ $item->square_feet }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="flex flex-col xl:flex-row justify-between items-center bg-palette-2-dark-blue">
    <div class="w-full xl:w-1/2 p-6">
        <h2 class="font-bold text-2xl mb-6 text-white">{{ __('property.about') }}</h2>
        <p class="text-white">{{ $item->about }}</p>
    </div>
    <div id="maps" class="xl:w-1/2 w-full">
        @php
            echo $item->map
        @endphp
    </div>
</section>

@include('footer')
