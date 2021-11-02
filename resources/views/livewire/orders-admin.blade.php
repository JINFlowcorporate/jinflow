<div class="p-6">
    {{-- The data table --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Transaction') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Amount') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('E-mail') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Date') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if ($data->count())
                            @foreach ($data as $item)
                                <tr>
                                    <td class="px-6 py-2">#{{ $item->id }}</td>
                                    <td class="px-6 py-2">${{ $item->total }}</td>
                                    <td class="px-6 py-2">{{ \App\Models\User::where('id', $item->user_id)->first()->email }}</td>
                                    <td class="px-6 py-2">
                                        <time
                                            datetime="{{ $item->created_at }}">{{ \Carbon\Carbon::parse($item->created_at)->format('D M Y') }}</time>
                                    </td>
                                    <td class="px-6 py-2 flex justify-end">
                                        <x-jet-button wire:click="detailsShowModal({{ $item->id }})">Voir</x-jet-button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">
                                    {{ __('admin.errors.no-result') }}
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        {{ $data->links() }}
    </div>

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalDetailsVisible">
        <x-slot name="title">
            {{ __('admin.orders.details') }}
        </x-slot>

        <x-slot name="content">
            <div class="flex justify-between">
                @if(!empty($customer))
                    <div class="mt-4">
                        <p class="font-bold">{{ $fullname }}</p>
                        <p>{{ $customer->address }}</p>
                        <p>{{ $customer->city }}</p>
                        <p>{{ $customer->zipcode }}</p>
                    </div>
                @endif
                @if(!empty($order))
                    <div class="mt-4">
                        <p>Total cart : ${{ $order->total }}</p>
                        <p>Total articles : {{ $order->quantity }}</p>
                    </div>
                @endif
            </div>

            <p class="font-bold mt-10">Liste des biens</p>
            @if(isset($biens) && !empty($biens))
                <div class="mt-4 grid grid-cols-2 gap-y-10 gap-x-6 xl:gap-x-8">
                    @foreach($biens as $bien)
                        <div class="group relative">
                            @if(isset($bien->images[0]->image) && !empty($bien->images[0]->image))
                                <div
                                    class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                                    <img src="{{ $bien->images[0]->image }}" alt="Product 1"
                                         class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                                </div>
                            @endif
                            <div class="mt-4 flex justify-between">
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
                                        <p class="text-sm font-medium text-gray-900">Total:
                                            ${{ number_format($bien->total_price, 2, ',', ' ') }}</p>
                                    @endif
                                </div>
                                @if(isset($bien->quantity) && !empty($bien->quantity))
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">x{{ $bien->quantity }}</p>
                                        <p class="mt-1 text-sm text-gray-500">${{ $bien->price_per_token }}/u</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalDetailsVisible')" wire:loading.attr="disabled">
                {{ __('admin.buttons.close') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
