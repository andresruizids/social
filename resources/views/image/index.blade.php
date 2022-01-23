<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-options">
            {{ __('Images') }}

        </h2>
        @include('includes.options')
    </x-slot>



    @include('includes.publication', $images)


</x-app-layout>
