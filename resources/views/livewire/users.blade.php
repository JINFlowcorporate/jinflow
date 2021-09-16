<div class="p-6">
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
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.words.firstname') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.words.email') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Active</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if ($data->count())
                            @foreach ($data as $item)
                                <tr>
                                    <td class="px-6 py-2">{{ $item->lastname }}</td>
                                    <td class="px-6 py-2">{{ $item->firstname }}</td>
                                    <td class="px-6 py-2">{{ $item->email }}</td>
                                    <td class="px-6 py-2">{{ $item->is_active ? __('admin.yes') : __('admin.no') }}</td>
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
        {{ $data->links() }}
    </div>

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('admin.users.create-or-update-user') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="username" value="{{ __('admin.words.username') }}" />
                <x-jet-input wire:model="username" id="username" class="block mt-1 w-full" type="text" />
                @error('username') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="firstname" value="{{ __('admin.words.firstname') }}" />
                <x-jet-input wire:model="firstname" id="firstname" class="block mt-1 w-full" type="text" />
                @error('firstname') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="lastname" value="{{ __('admin.words.lastname') }}" />
                <x-jet-input wire:model="lastname" id="lastname" class="block mt-1 w-full" type="text" />
                @error('lastname') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('admin.words.email') }}" />
                <x-jet-input wire:model="email" id="email" class="block mt-1 w-full" type="text" />
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('admin.words.password') }}" />
                <div class="relative">
                    <x-jet-input wire:model="password" id="password" class="block mt-1 w-full" type="password" />
                </div>
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('admin.users.phone') }}" />
                <x-jet-input wire:model="phone" id="phone" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('phone') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="address" value="{{ __('admin.users.address') }}" />
                <x-jet-input wire:model="address" id="address" class="block mt-1 w-full" type="text" />
                @error('address') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="city" value="{{ __('admin.users.city') }}" />
                <x-jet-input wire:model="city" id="city" class="block mt-1 w-full" type="text" />
                @error('city') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="state" value="{{ __('admin.users.state') }}" />
                <x-jet-input wire:model="state" id="state" class="block mt-1 w-full" type="text" />
                @error('state') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="zipcode" value="{{ __('admin.users.zipcode') }}" />
                <x-jet-input wire:model="zipcode" id="zipcode" class="block mt-1 w-full" type="number" inputmode="numeric" />
                @error('zipcode') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <label>
                    <input name="us_citizen" class="form-checkbox" type="checkbox" {{ $us_citizen ? 'checked' : '' }}
                           wire:model="us_citizen"/>
                    <span class="ml-2 text-sm text-gray-600">
                            {{ __('admin.users.us_citizen') }}
                            </span>
                </label>
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
