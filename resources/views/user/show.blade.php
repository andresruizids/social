<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Config') }}
        </h2>
    </x-slot>

    <form method="POST" enctype="multipart/form-data" action="{{ route('user.update', Auth::user()->id) }}">
        @method('PUT')
        @csrf

        @if(session()->has('message'))
        <div class="alert alert-success">
            <p> {{ session()->get('message') }}</p>
        </div>
        @endif

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
                        <div class="mt-4">
                            <x-label for="surname" :value="__('Surname')" />

                            <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="Auth::user()->surname" required />
                        </div>
                        <!-- nickname -->
                        <div class="mt-4">
                            <x-label for="nickname" :value="__('Nickname')" />

                            <x-input id="nickname" class="block mt-1 w-full" type="text" name="nickname" :value="Auth::user()->nickname" required />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="Auth::user()->email" required />
                        </div>

                        <!-- User Image -->

                        <div class="mt-4">
                            @include('includes.avatar')
                        </div>


                        <div class="mt-4">





                            <x-label for="image" :value="__('Avatar')" />

                            <x-input id="image" class="block mt-1 p-2 w-full" type="file" name="image" />
                        </div>


                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('Guardar') }}
                            </x-button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>




</x-app-layout>
