<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>

<body>
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
</body>

</html>
