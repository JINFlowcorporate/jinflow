<div x-data="{ open: false }" class="md:flex flex-col md:flex-row min-h-screen">
    <div @click.away="open = false" class="flex flex-col w-full h-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0" x-data="{ open: false }">
        <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
            <div class="flex-shrink-0 flex items-center w-full">
                <a class="w-full" href="{{ route('home') }}">
                    <svg class="w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 772.92 122.04"><defs><style>.cls-1{fill:#264461;}</style></defs><g id="Calque_2" data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M26.67,34.31V47.94l9.62-9.63V24.69Z"/><polygon class="cls-1" points="11.61 49.37 11.61 72.62 1.98 63 0 61.02 1.98 59 11.61 49.37"/><polygon class="cls-1" points="60.98 0 60.98 122.04 26.67 87.68 26.67 72.04 36.29 62.41 36.29 83.69 51.35 98.75 51.35 9.63 60.98 0"/><polygon class="cls-1" points="36.29 24.69 36.29 38.31 26.67 47.94 26.67 34.31 36.29 24.69"/><polygon class="cls-1" points="142.92 61.02 140.94 63 131.31 72.62 131.31 49.37 140.94 59 142.92 61.02"/><polygon class="cls-1" points="116.25 34.31 116.25 87.68 106.63 97.31 106.63 73.75 91.56 39.94 91.56 112.37 81.94 122.04 81.94 0 86.29 4.39 91.56 9.63 91.56 16.19 106.63 50.03 106.63 24.69 116.25 34.31"/><path class="cls-1" d="M236.8,10.61V83.93c0,9-2.52,16.15-7.56,21.19s-12,7.56-21.08,7.56c-9.74,0-17.41-2.86-22.91-8.47S177,90.57,177,80.26h16.15c0,5.5,1.15,9.85,3.55,12.83s6,4.59,10.77,4.59c4.47,0,7.79-1.26,9.85-3.9a15.58,15.58,0,0,0,3.21-10.08V10.38H236.8Z"/><path class="cls-1" d="M272.2,10.61v101H255.93v-101Z"/><path class="cls-1" d="M373.69,111.65H357.43L308.28,37.08v74.57H292V10.73h16.27l49.15,74.92V10.73h16.26Z"/><path class="cls-1" d="M453.19,10.61V23.79H409.78V55.18h35.74v12.6H409.78v44H393.51v-101h59.68Z"/><path class="cls-1" d="M484.12,98.94h34.94v12.71H467.74v-101H484V98.94Z"/><path class="cls-1" d="M604.06,15.88a46.94,46.94,0,0,1,17.87,18.45A54.09,54.09,0,0,1,628.46,61a54.14,54.14,0,0,1-6.53,26.69,47.72,47.72,0,0,1-17.87,18.44,52.16,52.16,0,0,1-51,0,48,48,0,0,1-18-18.44A54.31,54.31,0,0,1,528.46,61a53,53,0,0,1,6.64-26.69,48,48,0,0,1,18-18.45,52.23,52.23,0,0,1,51,0ZM561.33,28.94a30.21,30.21,0,0,0-11.8,12.72c-2.86,5.5-4.23,12-4.23,19.36a42,42,0,0,0,4.23,19.36,31,31,0,0,0,11.8,12.71,33.56,33.56,0,0,0,17.3,4.47,32.42,32.42,0,0,0,17.07-4.47,29.94,29.94,0,0,0,11.69-12.71c2.86-5.5,4.23-12,4.23-19.36a41.93,41.93,0,0,0-4.23-19.36A31.47,31.47,0,0,0,595.7,28.94a35.27,35.27,0,0,0-34.37,0Z"/><path class="cls-1" d="M772.92,10.61l-25.2,101H727.67L706.36,33.52l-21.31,78.13H665l-25.21-101h17.88l17.41,82.25,22.22-82.25h18.1l22.23,82.25,17.41-82.25Z"/></g></g></svg>
                </a>
            </div>
            <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('admin.dashboard') }}">
                {{ __('admin.navigation.dashboard') }}
            </a>
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('users') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('users') }}">
                {{ __('admin.navigation.users') }}
            </a>
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('admin.biens') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('admin.biens') }}">
                {{ __('admin.navigation.biens') }}
            </a>
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('admin.orders') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('admin.orders') }}">
                {{ __('admin.navigation.orders') }}
            </a>
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->routeIs('admin.types') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('admin.types') }}">
                {{ __('Types') }}
            </a>
        </nav>
    </div>
</div>
