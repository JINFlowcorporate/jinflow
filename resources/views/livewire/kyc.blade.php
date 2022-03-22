<form wire:submit.prevent="send" class="space-y-8 divide-y divide-gray-200 p-6 overflow-y-scroll w-full" role="form">
    <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{ __('kyc.title') }}
        </h3>
    </div>

    <div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="sm:pt-5">
                <label for="cover-photo" class="block text-sm font-bold text-gray-700 sm:mt-px sm:pt-2">
                    {{ __('kyc.passport') }}
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="w-full flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="passport_kyc" name="passport_kyc" type="file" wire:model="passport_kyc">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @error('passport_kyc') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror

                @if(isset($passport_file) && !empty($passport_file))
                <embed src="{{ $passport_file }}" type="application/pdf" style="width: 100%; height: 500px;" frameborder="0">
                <a class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ $passport_file }}" download>{{ __('kyc.download-document') }}</a>
                <button type="submit" wire:click.prevent="deleteFile('passport_kyc', 'passport_file')" class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-200">{{ __('kyc.remove-document') }}</button>
                @endif
            </div>

            <div class="sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="cover-photo" class="block text-sm font-bold text-gray-700 sm:mt-px sm:pt-2">
                    {{ __('kyc.driver') }}
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="w-full flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="driver_kyc" name="driver_kyc" type="file" wire:model="driver_kyc">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @error('driver_kyc') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror

                @if(isset($driver_file) && !empty($driver_file))
                <iframe class="mt-5" src="{{ $driver_file }}" width="100%" height="500px"></iframe>
                <a class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ $driver_file }}" download>{{ __('kyc.download-document') }}</a>
                <button type="submit" wire:click.prevent="deleteFile('driver_kyc', 'driver_file')" class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-200">{{ __('kyc.remove-document') }}</button>
                @endif
            </div>

            <div class="sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="cover-photo" class="block text-sm font-bold text-gray-700 sm:mt-px sm:pt-2">
                    {{ __('kyc.proof') }}
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="w-full flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="proof_address_kyc" name="proof_address_kyc" type="file" wire:model="proof_address_kyc">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @error('proof_address_kyc') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror

                @if(isset($proof_file) && !empty($proof_file))
                <iframe class="mt-5" src="{{ $proof_file }}" width="100%" height="500px"></iframe>
                <a class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ $proof_file }}" download>{{ __('kyc.download-document') }}</a>
                <button type="submit" wire:click.prevent="deleteFile('proof_address_kyc', 'proof_file')" class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-200">{{ __('kyc.remove-document') }}</button>
                @endif
            </div>
        </div>
    </div>
    @if (session()->has('message'))
    <div class="mt-4 bg-red-100 text-center border border-red-400 text-red-800 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">{{ session('message') }}</strong>
    </div>
    @endif
    <div class="pt-5">
        <div class="flex justify-end">
            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('admin.buttons.save') }}
            </button>
        </div>
    </div>
</form>