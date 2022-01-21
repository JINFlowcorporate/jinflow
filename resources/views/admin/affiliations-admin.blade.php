@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div>
                        <h3 class="text-lg leading-6 font-bold text-gray-900">
                            List of affiliation fees
                        </h3>
                    </div>

                    {{-- The data table --}}
                    <div class="mt-10 flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                        <tr>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Order') }}</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('User') }}</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('E-mail') }}</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Rate') }}</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Amount') }}</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Date') }}</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @if (\App\Models\ReferralLog::all()->count())
                                            @foreach (\App\Models\ReferralLog::orderBy('created_at','desc')->get() as $item)
                                                <tr>
                                                    <td class="px-6 py-2">#{{ $item->order->id }}</td>
                                                    <td class="px-6 py-2">{{ $item->user->id }} - {{$item->user->lastname}} {{$item->user->firstname}}</td>
                                                    <td class="px-6 py-2">{{$item->user->email}}</td>
                                                    <td class="px-6 py-2">{{ $item->rate }}%</td>
                                                    <td class="px-6 py-2">${{ $item->total }}</td>
                                                    <td class="px-6 py-2">
                                                        <time
                                                            datetime="{{ $item->created_at }}">{{ \Carbon\Carbon::parse($item->created_at)->format('D M Y') }}</time>
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


                </div>

            </div>
        </div>
    </div>
@endsection
