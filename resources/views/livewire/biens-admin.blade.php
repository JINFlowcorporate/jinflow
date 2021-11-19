<div class="p-6">
    <div>
        <h3 class="text-lg leading-6 font-bold text-gray-900">
            List of properties
        </h3>
    </div>

    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModal">
            {{ __('admin.buttons.create') }}
        </x-jet-button>
    </div>

    {{-- The data table --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.words.lastname') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.biens.price') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Tokens') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if ($data->count())
                            @foreach ($data as $item)
                                <tr>
                                    <td class="px-6 py-2">{{ $item->name }}</td>
                                    <td class="px-6 py-2">${{ number_format($item->price, 2, ',', ' ') }}</td>
                                    <td class="px-6 py-2">{{ $item->total_tokens }}</td>
                                    <td class="px-6 py-2 flex justify-end">
                                        <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                                            {{ __('admin.buttons.update') }}
                                        </x-jet-button>
                                        <x-jet-danger-button class="ml-2" wire:click="deleteShowModal({{ $item->id }})">
                                            {{ __('admin.buttons.delete') }}
                                        </x-jet-danger-button>
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
        {{ $data->links('custom-pagination-links-view') }}
    </div>

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('admin.users.create-or-update-user') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('admin.words.lastname') }}" />
                <x-jet-input wire:model="name" id="name" class="block mt-1 w-full" type="text" />
                @error('name') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="about_en" value="{{ __('About (EN)') }}" />
                <div class="rounded-md shadow-sm">
                    <div class="mt-1 bg-white">
                        <div class="body-content">
                            <textarea class="w-full" name="about_en" wire:model="about_en" id="about_en" cols="30" rows="10">{!! $about_en !!}</textarea>
                        </div>
                    </div>
                </div>
                @error('about_en') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="about_fr" value="{{ __('About (FR)') }}" />
                <div class="rounded-md shadow-sm">
                    <div class="mt-1 bg-white">
                        <div class="body-content">
                            <textarea class="w-full" name="about_fr" wire:model="about_fr" id="about_fr" cols="30" rows="10">{!! $about_fr !!}</textarea>
                        </div>
                    </div>
                </div>
                @error('about_fr') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="description_en" value="{{ __('Description (EN)') }}" />
                <div class="rounded-md shadow-sm">
                    <div class="mt-1 bg-white">
                        <div class="body-content">
                            <textarea class="w-full" name="description_en" wire:model="description_en" id="description_en" cols="30" rows="10">{!! $description_en !!}</textarea>
                        </div>
                    </div>
                </div>
                @error('description_en') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="description_fr" value="{{ __('Description (FR)') }}" />
                <div class="rounded-md shadow-sm">
                    <div class="mt-1 bg-white">
                        <div class="body-content">
                            <textarea class="w-full" name="description_fr" wire:model="description_fr" id="description_fr" cols="30" rows="10">{!! $description_fr !!}</textarea>
                        </div>
                    </div>
                </div>
                @error('description_fr') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="map" value="{{ __('admin.biens.map') }}" />
                <x-jet-input wire:model="map" id="map" class="block mt-1 w-full" type="text" />
                @error('map') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="type" value="{{ __('admin.biens.type') }}" />
                <x-jet-input wire:model="type" id="type" class="block mt-1 w-full" type="text" />
                @error('type') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="nb_bathroom" value="{{ __('admin.biens.nb_bathroom') }}" />
                <x-jet-input wire:model="nb_bathroom" id="nb_bathroom" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('nb_bathroom') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="nb_beds" value="{{ __('admin.biens.nb_beds') }}" />
                <x-jet-input wire:model="nb_beds" id="nb_beds" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('nb_beds') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="zipcode" value="{{ __('admin.users.zipcode') }}" />
                <x-jet-input wire:model="zipcode" id="zipcode" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('zipcode') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="state" value="{{ __('admin.users.state') }}" />
                <x-jet-input wire:model="state" id="state" class="block mt-1 w-full" type="text" />
                @error('state') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="city" value="{{ __('admin.users.city') }}" />
                <x-jet-input wire:model="city" id="city" class="block mt-1 w-full" type="text" />
                @error('city') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="square_feet" value="{{ __('admin.biens.square_feet') }}" />
                <x-jet-input wire:model="square_feet" id="square_feet" class="block mt-1 w-full" type="text" />
                @error('square_feet') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="rent_start_date" value="{{ __('admin.biens.rent_start_date') }}" />
                <x-jet-input wire:model="rent_start_date" id="rent_start_date" class="block mt-1 w-full" type="datetime" />
                @error('rent_start_date') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="price" value="{{ __('admin.biens.price') }}" />
                <x-jet-input wire:model="price" id="price" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('price') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="total_tokens" value="{{ __('admin.biens.total_tokens') }}" />
                <x-jet-input wire:model="total_tokens" id="total_tokens" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('total_tokens') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="tokens_price" value="{{ __('admin.biens.tokens_price') }}" />
                <x-jet-input wire:model="tokens_price" id="tokens_price" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('tokens_price') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="expected_yield" value="{{ __('admin.biens.expected_yield') }}" />
                <x-jet-input wire:model="expected_yield" id="expected_yield" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('expected_yield') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="gross_rent_year" value="{{ __('admin.biens.gross_rent_year') }}" />
                <x-jet-input wire:model="gross_rent_year" id="gross_rent_year" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('gross_rent_year') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="gross_rent_month" value="{{ __('admin.biens.gross_rent_month') }}" />
                <x-jet-input wire:model="gross_rent_month" id="gross_rent_month" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('gross_rent_month') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="property_management" value="{{ __('admin.biens.property_management') }}" />
                <x-jet-input wire:model="property_management" id="property_management" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('property_management') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="jinflow_tax" value="{{ __('admin.biens.jinflow_tax') }}" />
                <x-jet-input wire:model="jinflow_tax" id="jinflow_tax" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('jinflow_tax') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="property_tax" value="{{ __('admin.biens.property_tax') }}" />
                <x-jet-input wire:model="property_tax" id="property_tax" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('property_tax') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="insurance" value="{{ __('admin.biens.insurance') }}" />
                <x-jet-input wire:model="insurance" id="insurance" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('insurance') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="net_rent_year" value="{{ __('admin.biens.net_rent_year') }}" />
                <x-jet-input wire:model="net_rent_year" id="net_rent_year" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('net_rent_year') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="net_rent_month" value="{{ __('admin.biens.net_rent_month') }}" />
                <x-jet-input wire:model="net_rent_month" id="net_rent_month" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('net_rent_month') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="yield_token" value="{{ __('admin.biens.yield_token') }}" />
                <x-jet-input wire:model="yield_token" id="yield_token" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('yield_token') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="images_to_upload" value="{{ __('Images') }}" />
                <x-jet-input wire:model="images_to_upload" id="images_to_upload" class="block mt-1 w-full" type="file" multiple />
            </div>

            <div class="flex flex-wrap justify-between flex-shrink-1 gap-4 mt-4">
                @if(!empty($images))
                    @foreach($images as $image)
                        <article class="rounded-lg shadow-lg relative" style="width: 48%">
                            <img alt="Image" class="block h-full w-full object-cover overflow-hidden rounded-lg shadow-lg" src="{{ \Illuminate\Support\Facades\URL::asset('storage/' . $image->image) }}">
                            <x-jet-danger-button style="position: absolute; top: 10px; right: 10px;" wire:click="deleteImage({{ $image->id }})" wire:loading.attr="disabled">
                                {{ __('admin.buttons.delete') }}
                            </x-jet-danger-button>
                        </article>
                    @endforeach
                @endif
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('admin.buttons.cancel') }}
            </x-jet-secondary-button>

            @if ($modelId)
                <x-jet-secondary-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('admin.buttons.update') }}
                </x-jet-secondary-button>
            @else
                <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('admin.buttons.create') }}
                </x-jet-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>

    {{-- The Delete Modal --}}
    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('admin.buttons.delete') }}
        </x-slot>

        <x-slot name="content">
            {{ __('admin.users.sure-to-delete-user') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('admin.buttons.cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('admin.buttons.delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
