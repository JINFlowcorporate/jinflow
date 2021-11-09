<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mon compte</title>

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
                    <svg class="w-auto" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 1080" style="enable-background:new 0 0 1920 1080;">
                        <style type="text/css">
                            .st0{fill:#FFFFFF;}
                        </style>
                        <g>
                            <path class="st0" d="M783,775.2h-6.3l-1.7,4.5h-1.8l5.8-15.5h1.5l5.9,15.5h-1.8L783,775.2z M782.4,773.6l-2.5-6.9l-2.5,6.9H782.4z"/>
                            <path class="st0" d="M816.3,764.2v15.5h-1.5l-8.7-12.5v12.6h-1.6v-15.5h1.5l8.7,12.6v-12.6H816.3z"/>
                            <path class="st0" d="M834,778.1v1.6h-10.3v-15.5h10.2v1.6h-8.6v5.4h7.9v1.6h-7.9v5.4L834,778.1z"/>
                            <path class="st0" d="M861.6,764.2l-5,15.5H855l-4-12.9l-4,12.9h-1.6l-5.1-15.5h1.8l4.1,12.9l4-12.9h1.6l4,12.9l4.1-12.9H861.6z"/>
                            <path class="st0" d="M889.4,778.1v1.6h-10.3v-15.5h10.2v1.6h-8.6v5.4h7.9v1.6h-7.9v5.4L889.4,778.1z"/>
                            <path class="st0" d="M906,779.7l-3.3-5.9h-4.3v5.9h-1.6v-15.5h5.8c2.6-0.1,4.8,2,4.9,4.7c0.1,2.1-1.2,3.9-3.2,4.6l3.5,6.2H906z    M898.5,772.3h4.2c1.8,0,3.2-1.4,3.2-3.2c0-1.8-1.4-3.2-3.2-3.2h-4.2V772.3z"/>
                            <path class="st0" d="M923.8,775.2h-6.3l-1.7,4.5H914l5.8-15.5h1.5l5.9,15.5h-1.8L923.8,775.2z M923.2,773.6l-2.5-6.9l-2.5,6.9   H923.2z"/>
                            <path class="st0" d="M946.8,764.2v15.5h-1.6v-15.5H946.8z"/>
                            <path class="st0" d="M966.1,764.2v15.5h-1.5l-8.7-12.5v12.6h-1.6v-15.5h1.5l8.7,12.6v-12.6H966.1z"/>
                            <path class="st0" d="M997.1,775.7l1.4,0.7c-1.4,2.2-3.8,3.6-6.4,3.5c-4.4-0.2-7.7-3.9-7.5-8.3c0.2-4.1,3.5-7.4,7.5-7.5   c2.6,0,5,1.3,6.4,3.5l-1.4,0.7c-1.1-1.7-3-2.7-5-2.7c-3.5,0-6,2.8-6,6.3s2.5,6.3,6,6.3C994.2,778.4,996,777.4,997.1,775.7z"/>
                            <path class="st0" d="M1014.2,775.2h-6.3l-1.7,4.5h-1.8l5.8-15.5h1.5l5.9,15.5h-1.7L1014.2,775.2z M1013.6,773.6l-2.5-6.9l-2.5,6.9   H1013.6z"/>
                            <path class="st0" d="M1035.5,775.4c0,3-2.8,4.5-5.6,4.5c-3.5,0-5.6-1.7-6.2-3.4l1.5-0.5c0.6,1.5,2.3,2.3,4.7,2.3   c1.6,0,4.1-0.7,4.1-2.9c0-1.7-1.3-2.1-4.3-2.7c-3-0.6-5.5-1.4-5.5-4.2c0-2.3,1.7-4.4,5.5-4.4c2.7,0,4.7,1.4,5.3,3.3l-1.5,0.5   c-0.4-1.7-2.1-2.3-3.8-2.3c-2.4,0-3.9,1-3.9,2.8c0,1.5,1.3,2.2,4.2,2.7C1032.8,771.7,1035.5,772.4,1035.5,775.4z"/>
                            <path class="st0" d="M1054.2,764.2v15.5h-1.6v-6.9h-8.5v6.9h-1.6v-15.5h1.6v7h8.5v-7L1054.2,764.2z"/>
                            <path class="st0" d="M1074.5,765.8v5.4h7.1v1.6h-7.1v6.9h-1.6v-15.5h10.2v1.6H1074.5z"/>
                            <path class="st0" d="M1099.2,778.1v1.6h-9.3v-15.5h1.6v13.9H1099.2z"/>
                            <path class="st0" d="M1120,772c0,4.4-3.1,7.9-7.5,7.9c-4.4,0-7.5-3.5-7.5-7.9s3.2-7.9,7.5-7.9C1116.9,764.1,1120,767.7,1120,772z    M1118.4,772c0-3.5-2.4-6.3-5.9-6.3c-3.5,0-5.9,2.8-5.9,6.3c0,3.5,2.4,6.3,5.9,6.3S1118.4,775.5,1118.4,772L1118.4,772z"/>
                            <path class="st0" d="M1147.1,764.2l-5,15.5h-1.6l-4-12.9l-4,12.9h-1.6l-5.1-15.5h1.8l4.1,12.9l4-12.9h1.6l4,12.9l4.1-12.9H1147.1z"/>
                        </g>
                        <g>
                            <path class="st0" d="M844.6,403.5v35.1l24.8-24.8v-35.1L844.6,403.5z"/>
                            <polygon class="st0" points="805.8,442.3 805.8,502.2 781,477.4 775.9,472.3 781,467.1  "/>
                            <polygon class="st0" points="933,315.1 933,629.5 844.6,541 844.6,500.7 869.4,475.9 869.4,530.7 908.2,569.5 908.2,339.9  "/>
                            <polygon class="st0" points="869.4,378.7 869.4,413.8 844.6,438.6 844.6,403.5  "/>
                            <polygon class="st0" points="1144.1,472.3 1139,477.4 1114.2,502.2 1114.2,442.3 1139,467.1  "/>
                            <polygon class="st0" points="1075.4,403.5 1075.4,541 1050.6,565.8 1050.6,505.1 1011.8,418 1011.8,604.6 987,629.5 987,315.1    998.2,326.4 1011.8,339.9 1011.8,356.8 1050.6,444 1050.6,378.7  "/>
                        </g>
                        <g>
                            <path class="st0" d="M755,652.6v64c0,7.9-2.2,14.1-6.6,18.5c-4.4,4.4-10.5,6.6-18.4,6.6c-8.5,0-15.2-2.5-20-7.4   c-4.8-4.9-7.2-11.9-7.2-20.9h14.1c0,4.8,1,8.6,3.1,11.2c2,2.7,5.2,4,9.4,4c3.9,0,6.8-1.1,8.6-3.4c1.8-2.2,2.8-5.2,2.8-8.8v-64H755z   "/>
                            <path class="st0" d="M785.9,652.6v88.2h-14.2v-88.2H785.9z"/>
                            <path class="st0" d="M874.5,740.8h-14.2l-42.9-65.1v65.1h-14.2v-88.1h14.2l42.9,65.4v-65.4h14.2V740.8z"/>
                            <path class="st0" d="M943.9,652.6v11.5H906v27.4h31.2v11H906v38.4h-14.2v-88.2H943.9z"/>
                            <path class="st0" d="M970.9,729.7h30.5v11.1h-44.8v-88.2h14.2V729.7z"/>
                            <path class="st0" d="M1075.6,657.2c6.6,3.8,11.8,9.2,15.6,16.1c3.8,6.9,5.7,14.6,5.7,23.3c0,8.7-1.9,16.4-5.7,23.3   c-3.8,6.9-9,12.2-15.6,16.1s-14,5.8-22.2,5.8c-8.2,0-15.7-1.9-22.3-5.8s-11.9-9.2-15.7-16.1c-3.8-6.9-5.8-14.6-5.8-23.3   c0-8.7,1.9-16.4,5.8-23.3c3.8-6.9,9.1-12.2,15.7-16.1c6.6-3.8,14.1-5.8,22.3-5.8C1061.6,651.4,1069,653.4,1075.6,657.2z    M1038.3,668.6c-4.4,2.6-7.9,6.3-10.3,11.1c-2.5,4.8-3.7,10.5-3.7,16.9c0,6.4,1.2,12,3.7,16.9c2.5,4.8,5.9,8.5,10.3,11.1   c4.4,2.6,9.5,3.9,15.1,3.9c5.6,0,10.6-1.3,14.9-3.9c4.4-2.6,7.8-6.3,10.2-11.1c2.5-4.8,3.7-10.5,3.7-16.9c0-6.4-1.2-12-3.7-16.9   c-2.5-4.8-5.9-8.5-10.2-11.1c-4.4-2.6-9.4-3.9-14.9-3.9C1047.7,664.7,1042.7,666,1038.3,668.6z"/>
                            <path class="st0" d="M1223,652.6l-22,88.2h-17.5l-18.6-68.2l-18.6,68.2h-17.5l-22-88.2h15.6l15.2,71.8l19.4-71.8h15.8l19.4,71.8   l15.2-71.8H1223z"/>
                        </g>
                    </svg>
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
