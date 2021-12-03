@section('title', __('pages.checkout'))

<x-guest-layout>
    @include('navigation-menu')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    @livewire('checkout')

    @include('footer')
</x-guest-layout>
