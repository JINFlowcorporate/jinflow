<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>
    @cloudinaryJS
</head>
<body>
<div class="relative h-screen flex overflow-hidden bg-gray-100">
    <!-- Static sidebar for desktop -->
    <div class="hidden lg:flex lg:flex-shrink-0">
        <div class="flex flex-col w-64">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-col flex-grow bg-palette-2-dark-blue pt-5 pb-4 overflow-y-auto">
                <a href="/" class="flex items-center flex-shrink-0 px-4">
                    <svg class="w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 714.2 142.4"><defs><style>.cls-1{fill:#fff;}</style></defs><g id="Calque_2" data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M31.12,40v15.9L42.35,44.7V28.81Z"/><polygon class="cls-1" points="13.54 57.61 13.54 84.74 2.31 73.51 0 71.2 2.31 68.84 13.54 57.61"/><polygon class="cls-1" points="71.15 0 71.15 142.4 31.12 102.31 31.12 84.06 42.35 72.83 42.35 97.65 59.92 115.22 59.92 11.23 71.15 0"/><polygon class="cls-1" points="42.35 28.81 42.35 44.7 31.12 55.94 31.12 40.04 42.35 28.81"/><polygon class="cls-1" points="166.76 71.2 164.46 73.51 153.22 84.74 153.22 57.61 164.46 68.84 166.76 71.2"/><polygon class="cls-1" points="135.65 40.04 135.65 102.31 124.42 113.55 124.42 86.06 106.84 46.6 106.84 131.12 95.61 142.4 95.61 0 100.68 5.12 106.84 11.23 106.84 18.89 124.42 58.38 124.42 28.81 135.65 40.04"/><path class="cls-1" d="M203.8,137.69h-6.3l-1.7,4.5H194l5.8-15.5h1.5l5.9,15.5h-1.8Zm-.6-1.6-2.5-6.9-2.5,6.9Z"/><path class="cls-1" d="M237.1,126.69v15.5h-1.5l-8.7-12.5v12.6h-1.6v-15.5h1.5l8.7,12.6v-12.6h1.6Z"/><path class="cls-1" d="M254.8,140.59v1.6H244.5v-15.5h10.2v1.6h-8.6v5.4H254v1.6h-7.9v5.4Z"/><path class="cls-1" d="M282.4,126.69l-5,15.5h-1.6l-4-12.9-4,12.9h-1.6l-5.1-15.5h1.8l4.1,12.9,4-12.9h1.6l4,12.9,4.1-12.9Z"/><path class="cls-1" d="M310.2,140.59v1.6H299.9v-15.5h10.2v1.6h-8.6v5.4h7.9v1.6h-7.9v5.4Z"/><path class="cls-1" d="M326.8,142.19l-3.3-5.9h-4.3v5.9h-1.6v-15.5h5.8a4.8,4.8,0,0,1,4.9,4.7,4.62,4.62,0,0,1-3.2,4.6l3.5,6.2Zm-7.5-7.4h4.2a3.2,3.2,0,0,0,0-6.4h-4.2Z"/><path class="cls-1" d="M344.6,137.69h-6.3l-1.7,4.5h-1.8l5.8-15.5h1.5l5.9,15.5h-1.8Zm-.6-1.6-2.5-6.9-2.5,6.9Z"/><path class="cls-1" d="M367.6,126.69v15.5H366v-15.5Z"/><path class="cls-1" d="M386.9,126.69v15.5h-1.5l-8.7-12.5v12.6h-1.6v-15.5h1.5l8.7,12.6v-12.6h1.6Z"/><path class="cls-1" d="M417.9,138.19l1.4.7a7.32,7.32,0,0,1-6.4,3.5,7.91,7.91,0,0,1,0-15.8,7.55,7.55,0,0,1,6.4,3.5l-1.4.7a6,6,0,0,0-5-2.7,6.31,6.31,0,0,0,0,12.6A5.25,5.25,0,0,0,417.9,138.19Z"/><path class="cls-1" d="M435,137.69h-6.3l-1.7,4.5h-1.8l5.8-15.5h1.5l5.9,15.5h-1.7Zm-.6-1.6-2.5-6.9-2.5,6.9Z"/><path class="cls-1" d="M456.3,137.89c0,3-2.8,4.5-5.6,4.5-3.5,0-5.6-1.7-6.2-3.4l1.5-.5c.6,1.5,2.3,2.3,4.7,2.3,1.6,0,4.1-.7,4.1-2.9,0-1.7-1.3-2.1-4.3-2.7s-5.5-1.4-5.5-4.2c0-2.3,1.7-4.4,5.5-4.4,2.7,0,4.7,1.4,5.3,3.3l-1.5.5c-.4-1.7-2.1-2.3-3.8-2.3-2.4,0-3.9,1-3.9,2.8,0,1.5,1.3,2.2,4.2,2.7S456.3,134.89,456.3,137.89Z"/><path class="cls-1" d="M475,126.69v15.5h-1.6v-6.9h-8.5v6.9h-1.6v-15.5h1.6v7h8.5v-7Z"/><path class="cls-1" d="M495.3,128.29v5.4h7.1v1.6h-7.1v6.9h-1.6v-15.5h10.2v1.6Z"/><path class="cls-1" d="M520,140.59v1.6h-9.3v-15.5h1.6v13.9Z"/><path class="cls-1" d="M540.8,134.49c0,4.4-3.1,7.9-7.5,7.9s-7.5-3.5-7.5-7.9a7.51,7.51,0,1,1,15,0Zm-1.6,0c0-3.5-2.4-6.3-5.9-6.3s-5.9,2.8-5.9,6.3,2.4,6.3,5.9,6.3,5.9-2.8,5.9-6.3Z"/><path class="cls-1" d="M567.9,126.69l-5,15.5h-1.6l-4-12.9-4,12.9h-1.6l-5.1-15.5h1.8l4.1,12.9,4-12.9h1.6l4,12.9,4.1-12.9Z"/><path class="cls-1" d="M246.2,15.09v64c0,7.9-2.2,14.1-6.6,18.5s-10.5,6.6-18.4,6.6c-8.5,0-15.2-2.5-20-7.4s-7.2-11.9-7.2-20.9h14.1c0,4.8,1,8.6,3.1,11.2s5.2,4,9.4,4c3.9,0,6.8-1.1,8.6-3.4a13.63,13.63,0,0,0,2.8-8.8v-64h14.2Z"/><path class="cls-1" d="M277.1,15.09v88.2H262.9V15.09Z"/><path class="cls-1" d="M365.7,103.29H351.5l-42.9-65.1v65.1H294.4V15.19h14.2l42.9,65.4V15.19h14.2Z"/><path class="cls-1" d="M435.1,15.09v11.5H397.2V54h31.2V65H397.2v38.4H383V15.19h52.1Z"/><path class="cls-1" d="M462.1,92.19h30.5v11.1H447.8V15.09H462v77.1Z"/><path class="cls-1" d="M566.8,19.69a41,41,0,0,1,15.6,16.1,47.31,47.31,0,0,1,5.7,23.3,47.31,47.31,0,0,1-5.7,23.3,41.64,41.64,0,0,1-15.6,16.1,45.58,45.58,0,0,1-44.5,0,41.89,41.89,0,0,1-15.7-16.1,47.36,47.36,0,0,1-5.8-23.3,46.31,46.31,0,0,1,5.8-23.3,41.89,41.89,0,0,1,15.7-16.1,45.58,45.58,0,0,1,44.5,0Zm-37.3,11.4a26.35,26.35,0,0,0-10.3,11.1,36.28,36.28,0,0,0-3.7,16.9A36.57,36.57,0,0,0,519.2,76a27,27,0,0,0,10.3,11.1A29.29,29.29,0,0,0,544.6,91a28.31,28.31,0,0,0,14.9-3.9A26.13,26.13,0,0,0,569.7,76a36.28,36.28,0,0,0,3.7-16.9,36.57,36.57,0,0,0-3.7-16.9,27.44,27.44,0,0,0-10.2-11.1,30.8,30.8,0,0,0-30,0Z"/><path class="cls-1" d="M714.2,15.09l-22,88.2H674.7l-18.6-68.2-18.6,68.2H620l-22-88.2h15.6l15.2,71.8,19.4-71.8H664l19.4,71.8,15.2-71.8Z"/></g></g></svg>
                </a>
                <nav class="mt-5 flex-1 flex flex-col divide-y divide-cyan-800 overflow-y-auto" aria-label="Sidebar">
                    <div class="px-2 space-y-1">
                        <!-- Current: "bg-cyan-800 text-white", Default: "text-cyan-100 hover:text-white hover:bg-cyan-600" -->
                        <a href="{{ url('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-cyan-800 text-white' : 'text-cyan-100 hover:text-white hover:bg-cyan-600' }} group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md" aria-current="page">
                            <!-- Heroicon name: outline/home -->
                            <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            {{ __('dashboard.routes.home') }}
                        </a>

                        <a href="{{ route('holdings') }}" class="{{ request()->routeIs('holdings') ? 'bg-cyan-800 text-white' : 'text-cyan-100 hover:text-white hover:bg-cyan-600' }} group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md" aria-current="page">
                            <!-- Heroicon name: outline/home -->
                            <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            {{ __('dashboard.routes.holdings') }}
                        </a>

                        <a href="{{ route('kyc_stuff') }}" class="{{ request()->routeIs('kyc_stuff') ? 'bg-cyan-800 text-white' : 'text-cyan-100 hover:text-white hover:bg-cyan-600' }} group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                            <!-- Heroicon name: outline/clock -->
                            <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ __('dashboard.routes.kyc') }}
                        </a>

                        <a href="{{ route('orders') }}" class="{{ request()->routeIs('orders') ? 'bg-cyan-800 text-white' : 'text-cyan-100 hover:text-white hover:bg-cyan-600' }} group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                            <!-- Heroicon name: outline/scale -->
                            <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            </svg>
                            {{ __('dashboard.routes.orders') }}
                        </a>

                        <a href="{{ route('account_details') }}" class="{{ request()->routeIs('account_details') ? 'bg-cyan-800 text-white' : 'text-cyan-100 hover:text-white hover:bg-cyan-600' }} group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                            <!-- Heroicon name: outline/credit-card -->
                            <svg class="mr-4 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ __('dashboard.routes.account-details') }}
                        </a>

                        <a href="{{ route('affiliation') }}" class="{{ request()->routeIs('affiliation') ? 'bg-cyan-800 text-white' : 'text-cyan-100 hover:text-white hover:bg-cyan-600' }} group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                            <!-- Heroicon name: outline/user-group -->
                            <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            {{ __('dashboard.routes.affiliation') }}
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    @yield('content')
</div>

@livewireScripts

</body>
</html>
