@foreach ($images as $image)
<div class=" flex py-2">
    <div class="2xl:w-2/5 xl:w-3/5 lg:w-3/5 md:w-2/3 mx-auto">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200 ">
                <div class="publication">
                    <div class="container-publication">
                        <div class="container-avatar mr-1">
                            @include('includes.avatar')

                        </div>
                        <div class="nickname-publication">
                            <p><span>@</span>{{$image->user->nickname}}</p>
                        </div>
                    </div>


                    <img class="image-publication" src="{{route('image.item',['filename'=>$image->image_path])}}" alt="">


                    <div class="likes">
                        <img class="inline-block " src="{{asset('/img/unlike.png')}}" alt="">
                        {{count($image->likes)}}
                        (
                        @foreach($image->likes as $like)
                        {{$like->user->name}},
                        @endforeach
                        )
                        <div class="comments">
                            @if($image->comments->count()>0)
                            <a href=""> Ver los {{$image->comments->count()}} comentarios</a>
                            @endif
                        </div>
                    </div>


                    <!-- <ul>
                        @foreach($image->comments as $comment)
                        <li>
                            <div class="comment shadow-sm shadow-grey-500/50 p-10 rounded mt-1 ">
                                {{$comment->comment}}
                                <br>
                                <em>User: {{$comment->user->name}} {{$comment->user->surname}}</em>
                            </div>
                        </li>
                        <br>
                        @endforeach
                    </ul> -->


                </div>
            </div>
        </div>
    </div>
</div>

@endforeach
@include('includes.pagination', $images)
