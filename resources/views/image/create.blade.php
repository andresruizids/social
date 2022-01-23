<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-optiones">
            {{ __('Add Image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @include('includes.message')
                    <form action="{{route('image.store')}}" method="POST" enctype="multipart/form-data">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        @csrf

                        <!-- Image -->
                        <div class="mt-4">
                            <x-label for="image" :value="__('Image')" />

                            <x-input id="image" class="block mt-1 w-1/3" type="file" name="image" required autofocus />
                        </div>
                        <!-- Description -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />

                            <textarea name="description" id="description" cols="100" rows="8" placeholder="¿Qué quieres decirnos?" required></textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('Subir') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>






</x-app-layout>
