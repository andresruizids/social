<div class="sm:w-1/2 md:w-2/5 mx-2/5 w-2/5 mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

            @foreach ($images as $image)
            <div class="container-publication">
                <div class="container-avatar mr-1">
                    @include('includes.avatar')

                </div>
                <div class="nickname-publication">
                    <p><span>@</span>{{$image->user->nickname}}</p>
                </div>
            </div>

            <img src="{{route('image.item',['filename'=>$image->image_path])}}" alt="">




            <strong>comments</strong>: <br>
            <ul>
                @foreach($image->comments as $comment)
                <li>
                    <div class="comment shadow-sm shadow-blue-500/50 p-10 rounded mt-3 bg-sky-50	">
                        {{$comment->comment}}
                        <br>
                        <em>User: {{$comment->user->name}} {{$comment->user->surname}}</em>
                    </div>
                </li>
                <br>
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
