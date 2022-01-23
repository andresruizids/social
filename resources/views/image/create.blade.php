<x-app-layout>

    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-optiones">
            {{ __('Add Image') }}
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        @csrf

                        <!-- Name -->
                        <div class="mt-4">
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="Auth::user()->name" required autofocus />
                        </div>
                        <!-- Surname -->

                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('Subir') }}
                            </x-button>
                        </div>

                    </div>
                </div>
            </div>
        </div>






</x-app-layout>
