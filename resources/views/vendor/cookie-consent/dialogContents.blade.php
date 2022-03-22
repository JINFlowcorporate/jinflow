<div class="js-cookie-consent cookie-consent z-50 fixed bottom-0 inset-x-0 pb-2">
    <div class="max-w-7xl mx-auto px-6">
        <div class="p-2 rounded-lg bg-white shadow-inner">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 items-center hidden md:inline">
                    <p class="ml-3 text-palette-2-dark-blue cookie-consent__message">
                        {!! trans('cookie-consent::texts.message') !!}
                    </p>
                </div>
                <div class="mt-2 flex-shrink-0 w-full sm:mt-0 sm:w-auto">
                    <a class="js-cookie-consent-agree cookie-consent__agree flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-white bg-palette-2-dark-blue hover:bg-indigo-700 transition-all duration-150 ease-in-out">
                        {{ trans('cookie-consent::texts.agree') }}
                    </a>
                    @if (config('cookie-consent.refuse_enabled'))
                        <a class="js-cookie-consent-refuse mt-1 cookie-consent__refuse flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium bg-palette-2-dark-beige text-white hover:text-palette-2-dark-blue hover:bg-indigo-50 transition-all duration-150 ease-in-out">
                        {{ trans('cookie-consent::texts.refuse') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
