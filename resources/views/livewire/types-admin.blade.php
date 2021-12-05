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
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.words.lastname') }} (FR)-</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.words.lastname') }} (EN)-</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if ($data->count())
                            @foreach ($data as $item)
                                <tr>
                                    <td class="px-6 py-2">{{ $item->translate('fr')->name }}</td>
                                    <td class="px-6 py-2">{{ $item->translate('en')->name }}</td>
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
                <x-jet-label for="name_fr" value="{{ __('Title (FR)') }}" />
                <x-jet-input wire:model="name_fr" id="name_fr" class="block mt-1 w-full" type="text" />
                @error('name_fr') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="name_en" value="{{ __('Title (EN)') }}" />
                <x-jet-input wire:model="name_en" id="name_en" class="block mt-1 w-full" type="text" />
                @error('name_en') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
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
