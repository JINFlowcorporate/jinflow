<x-guest-layout>
    @include('navigation-menu')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('biens')
            </div>
        </div>
    </div>
</x-guest-layout>
