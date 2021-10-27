<form wire:submit.prevent="send" class="space-y-8 divide-y divide-gray-200 p-6 overflow-y-scroll w-full" role="form">
    <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            KYC
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            This information will be displayed publicly so be careful what you share.
        </p>
    </div>

    <div>
        <div class="flex flex-col mt-2">
            <div class="sm:grid sm:gap-4 sm:pt-5 mt-4">
                <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Passeport
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="passport_kyc" name="passport_kyc" type="file" wire:model="passport_kyc">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            {{--<p class="text-xs text-gray-500">
                                PNG, JPG, GIF up to 10MB
                            </p>--}}
                        </div>
                    </div>
                </div>
                @error('passport_kyc') <span class="error">{{ $message }}</span> @enderror

                @if(isset($passport_file) && !empty($passport_file))
                    <a class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ $passport_file }}" download="">Télécharger le document</a>
                @endif
            </div>

            <div class="sm:grid sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5 mt-4">
                <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Permis de conduire
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="driver_kyc" name="driver_kyc" type="file" wire:model="driver_kyc">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            {{--<p class="text-xs text-gray-500">
                                PNG, JPG, GIF up to 10MB
                            </p>--}}
                        </div>
                    </div>
                </div>
                @error('driver_kyc') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="sm:grid sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5 mt-4">
                <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Justificatif de domicile
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="proof_address_kyc" name="proof_address_kyc" type="file" wire:model="proof_address_kyc">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            {{--<p class="text-xs text-gray-500">
                                PNG, JPG, GIF up to 10MB
                            </p>--}}
                        </div>
                    </div>
                </div>
                @error('proof_address_kyc') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="pt-5">
        <div class="flex justify-end">
            <button type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </div>
</form>
