<div class="p-6">
    <div>
        <h3 class="text-lg leading-6 font-bold text-gray-900">
            List of requests
        </h3>
    </div>

    <div>
        <div>
            <div class="flex flex-col mt-10">
                <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                User
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('orders.amount') }}
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                        </thead>

                        @if($data->count())
                            @foreach($data as $item)
                                <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="bg-white">
                                    <td class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ \App\Models\User::where('id', $item->user_id)->pluck('firstname')->first() }} {{ \App\Models\User::where('id', $item->user_id)->pluck('lastname')->first() }}
                                    </td>
                                    <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                        ${{ $item->amount }}
                                    </td>
                                    @if(!$item->is_validate)
                                        <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                            <x-jet-button wire:click="validateRequest('{{ $item->id }}')">Valider</x-jet-button>
                                        </td>
                                    @endif
                                </tr>
                                </tbody>
                            @endforeach
                        @else
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">
                                    {{ __('admin.errors.no-result') }}
                                </td>
                            </tr>
                        @endif
                    </table>
                    <!-- Pagination -->
                    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $data->links('custom-pagination-links-view') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
