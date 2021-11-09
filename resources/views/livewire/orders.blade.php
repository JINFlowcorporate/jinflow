<div class="space-y-8 divide-y divide-gray-200 p-6 overflow-y-scroll w-full">
    <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{ __('orders.title') }}
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
                                {{ __('orders.transaction') }}
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('orders.amount') }}
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('orders.date') }}
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                        </thead>

                        @if($data->count())
                            @foreach($data as $item)
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="bg-white">
                            <td class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <div class="flex">
                                    <a href="#" class="group inline-flex space-x-2 truncate text-sm">
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                        <p class="text-gray-500 truncate group-hover:text-gray-900">
                                            #{{ $item->id }}
                                        </p>
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                ${{ $item->total }}
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                <time datetime="{{ $item->created_at }}">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</time>
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                <a href="#" download class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">{{ __('orders.download-invoice') }}</a>
                            </td>
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
