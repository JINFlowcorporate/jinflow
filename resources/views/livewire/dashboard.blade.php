<div class="flex-1 overflow-auto focus:outline-none">
    {{--  <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:border-none">
          <button type="button" class="px-4 border-r border-gray-200 text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500 lg:hidden">
              <span class="sr-only">Open sidebar</span>
              <!-- Heroicon name: outline/menu-alt-1 -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
              </svg>
          </button>
      </div>--}}
    <main class="flex-1 relative pb-8 z-0 overflow-y-auto">
        <!-- Page header -->
        <div class="bg-white shadow">
            <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                    <div class="flex-1 min-w-0">
                        <!-- Profile -->
                        <div class="flex items-center">
                            <img class="hidden h-16 w-16 rounded-full sm:block"
                                 src="{{ $profile_photo_path }}"
                                 alt="">
                            <div>
                                <div class="flex items-center">
                                    <img class="h-16 w-16 rounded-full sm:hidden"
                                         src="{{ $profile_photo_path }}"
                                         alt="">
                                    <h1 class="ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                        {{ __('dashboard.hello') }}, {{ $fullname }}
                                    </h1>
                                </div>
                                <dl class="mt-6 flex flex-col sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap">
                                    <dd class="flex items-center text-sm text-gray-500 font-medium capitalize sm:mr-6">
                                        <p>Code ref. : {{ $referrer_code }}</p>
                                    </dd>
                                    @if(\Illuminate\Support\Facades\Auth::user()->is_active)
                                        <dd class="mt-3 flex items-center text-sm text-gray-500 font-medium sm:mr-6 sm:mt-0">
                                            <!-- Heroicon name: solid/check-circle -->
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                 fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            {{ __('dashboard.account-verified') }}
                                        </dd>
                                    @else
                                        <dd class="mt-3 flex items-center text-sm text-gray-500 font-medium sm:mr-6 sm:mt-0">
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-red-400"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                 fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            {{ __('dashboard.account-not-verified') }}
                                        </dd>
                                    @endif
                                    <x-jet-danger-button class="ml-2" wire:click="logout">
                                        {{ __('admin.buttons.logout') }}
                                    </x-jet-danger-button>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-lg leading-6 font-medium text-gray-900">{{ __('dashboard.overview') }}</h2>
                <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Card -->

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: outline/scale -->
                                    <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            {{ __('dashboard.invested') }}
                                        </dt>
                                        <dd>
                                            <div class="text-lg font-medium text-gray-900">
                                                ${{ $invested }}
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <a href="{{ route('holdings') }}" class="font-medium text-cyan-700 hover:text-cyan-900">
                                    {{ __('dashboard.view-all') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: outline/scale -->
                                    <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            {{ __('dashboard.rent') }}
                                        </dt>
                                        <dd>
                                            <div class="text-lg font-medium text-gray-900">
                                                ${{ $rent }}
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: outline/scale -->
                                    <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            {{ __('dashboard.can_recover') }}
                                        </dt>
                                        <dd>
                                            <div class="text-lg font-medium text-gray-900">
                                                ${{ number_format($can_recover, 2, ',', ' ') }}
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        @if($can_recover > 0)
                            <div class="bg-gray-50 px-5 py-3">
                                <div class="text-sm">
                                    <p wire:click="$toggle('modalVisible')"
                                       class="cursor-pointer font-medium text-cyan-700 hover:text-cyan-900">
                                        {{ __('dashboard.recover') }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">
                {{ __('dashboard.recent-activity') }}
            </h2>

            <div>
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col mt-2">
                        <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('dashboard.transaction') }}
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('dashboard.amount') }}
                                    </th>
                                    <th class="hidden px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider md:block">
                                        {{ __('dashboard.status') }}
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('dashboard.date') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @if($data->count())
                                    @foreach($data as $item)
                                <tr class="bg-white">
                                    <td class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <div class="flex">
                                            <a href="#" class="group inline-flex space-x-2 truncate text-sm">
                                                <!-- Heroicon name: solid/cash -->
                                                <svg
                                                    class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                          d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                                <p class="text-gray-500 truncate group-hover:text-gray-900">
                                                    {{ __('dashboard.payment-to') }} {{ \Illuminate\Support\Facades\Auth::user()->firstname }} {{ \Illuminate\Support\Facades\Auth::user()->lastname }}
                                                </p>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                        <span class="text-gray-900 font-medium">${{ number_format($item->amount, 2, ',', ' ') }}</span>
                                        USD
                                    </td>
                                    <td class="hidden px-6 py-4 whitespace-nowrap text-sm text-gray-500 md:block">
                                        @if($item->is_validate)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                              {{ __('dashboard.success') }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                              {{ __('dashboard.pending') }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                        <time datetime="2020-07-11">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</time>
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
                            <!-- Pagination -->
                            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                {{ $data->links('custom-pagination-links-view') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-jet-dialog-modal wire:model="modalVisible">
        <x-slot name="title">
            {{ __('dashboard.modal.title') }}
        </x-slot>

        <x-slot name="content">
            <div class="flex flex-col items-start">
                <label class="text-xs" for="to_recover">{{ __('dashboard.modal.label') }}</label>
                <x-jet-input id="to_recover" wire:model="to_recover" type="number" min="0" max="{{ $can_recover }}" class="p-2 text-xs mt-2" placeholder="Ex. : 589"></x-jet-input>
                @error('to_recover') <span class="text-red-600 text-xs mt-2">{{ $message }}</span> @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('dashboard.send-request') }}
            </x-jet-button>

            <x-jet-secondary-button wire:click="$toggle('modalVisible')" wire:loading.attr="disabled">
                {{ __('admin.buttons.close') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
