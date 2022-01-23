<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($images as $image)
                    <strong>path_image</strong>: {{ $image->image_path}} <br>
                    <strong>name</strong>: {{$image->user->name}} {{$image->user->surname}} <br>
                    <strong>comments</strong>: <br>
                    <ul>
                        @foreach($image->comments as $comment)
                        <li>{{$comment->comment}}
                            <br>
                            <em>User: {{$comment->user->name}} {{$comment->user->surname}}</em>
                        </li><br>
                        @endforeach
                    </ul>
                    <strong>likes:</strong>{{count($image->likes)}}
                    (
                    @foreach($image->likes as $like)
                    {{$like->user->name}},
                    @endforeach
                    )
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
