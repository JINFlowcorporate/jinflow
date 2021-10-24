<div class="bg-white">
    <div class="pt-6">
        <!-- Image gallery -->
        <div class="mt-6 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8">
            <div class="hidden aspect-w-3 aspect-h-4 rounded-lg overflow-hidden lg:block">
                <img src="{{ $item->images[0]->image }}" alt="Two each of gray, white, and black shirts laying flat." class="w-full h-full object-center object-cover">
            </div>
            <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                    <img src="{{ $item->images[1]->image }}" alt="Model wearing plain black basic tee." class="w-full h-full object-center object-cover">
                </div>
                <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                    <img src="{{ $item->images[2]->image }}" alt="Model wearing plain gray basic tee." class="w-full h-full object-center object-cover">
                </div>
            </div>
            <div class="aspect-w-4 aspect-h-5 sm:rounded-lg sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4">
                <img src="{{ $item->images[3]->image }}" alt="Model wearing plain white basic tee." class="w-full h-full object-center object-cover">
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
                <h2 class="sr-only">Product information</h2>
                <p class="text-3xl text-gray-900">${{ number_format($item->price, 2, ',', ' ') }}</p>

                <form @if($item->total_tokens > 0) wire:submit.prevent="addToCart({{ $item->id }}) @endif" class="mt-10" method="post">
                    @csrf
                    <div class="mt-10">
                        <h3 class="text-sm font-medium text-gray-900">Financials</h3>

                        <div class="mt-4">
                            <ul role="list" class="pl-4 list-disc text-sm space-y-2">
                                <li class="text-gray-400"><span class="text-gray-600">Gross Rent / year</span><span class="ml-10">${{ $item->gross_rent_year }}</span></li>

                                <li class="text-gray-400"><span class="text-gray-600">Gross Rent / month</span><span class="ml-10">${{ $item->gross_rent_month }}</span></li>

                                <li class="text-gray-400"><span class="text-gray-600">Net Rent / month</span><span class="ml-10">${{ $item->net_rent_month }}</span></li>

                                <li class="text-gray-400"><span class="text-gray-600">Net Rent / year</span><span class="ml-10">${{ $item->net_rent_year }}</span></li>
                            </ul>
                        </div>
                        @if($item->total_tokens > 0)
                            <div class="flex mt-5 items-center justify-between">
                                <label for="quantity" class="text-sm text-gray-900 font-medium">Quantity</label>
                                <input id="quantity" wire:model="quantity" type="number" min="0" max="{{ $item->total_tokens }}" value="{{ $quantity }}">
                            </div>
                        @endif
                    </div>

                    @if($item->total_tokens > 0)
                        <button type="submit" class="mt-10 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add to bag</button>
                    @else
                        <h2 class="uppercase font-bold text-center text-red-600 text-4xl mt-10 bg-red-100 rounded-lg p-5 border-2 border-red-600 border-solid">SOLD-OUT</h2>
                    @endif
                    @if (session()->has('message'))
                        <div class="mt-4 bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">{{ session('message') }}</strong>
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
                    <h3 class="text-sm font-medium text-gray-900">Property Highlights</h3>

                    <div class="mt-4">
                        <ul role="list" class="pl-4 list-disc text-sm space-y-2">
                            <li class="text-gray-400"><span class="text-gray-600">Expected Yield</span><span class="ml-10">{{ $item->expected_yield }}%</span></li>

                            <li class="text-gray-400"><span class="text-gray-600">Rent start date</span><span class="ml-10">{{ $item->rent_start_date }}</span></li>

                            <li class="text-gray-400"><span class="text-gray-600">Rent per token</span><span class="ml-10">${{ $item->gross_rent_year }}/Year</span></li>

                            <li class="text-gray-400"><span class="text-gray-600">Token price</span><span class="ml-10">${{ $item->tokens_price }}</span></li>

                            <li class="text-gray-400"><span class="text-gray-600">Total Token</span><span class="ml-10">{{ $item->total_tokens }}</span></li>
                        </ul>
                    </div>
                </div>

                <div class="mt-10">
                    <h2 class="text-sm font-medium text-gray-900">Property Type</h2>

                    <div class="mt-4">
                        <ul role="list" class="pl-4 list-disc text-sm space-y-2">
                            <li class="text-gray-400"><span class="text-gray-600">Type</span><span class="ml-10">{{ $item->type }}</span></li>

                            <li class="text-gray-400"><span class="text-gray-600">Nb beds</span><span class="ml-10">{{ $item->nb_beds }}</span></li>

                            <li class="text-gray-400"><span class="text-gray-600">Nb bathroom</span><span class="ml-10">{{ $item->nb_bathroom }}</span></li>

                            <li class="text-gray-400"><span class="text-gray-600">Square feet</span><span class="ml-10">{{ $item->square_feet }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="flex justify-between items-center bg-palette-2-dark-blue">
    <div class="w-1/2 p-6">
        <h2 class="font-bold text-2xl mb-6 text-white">About the property</h2>
        <p class="text-white">{{ $item->about }}</p>
    </div>
    <div>
        @php
            echo $item->map
        @endphp
    </div>
</section>

@include('footer')
