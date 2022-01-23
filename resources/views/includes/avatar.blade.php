@if(Auth::user()->image)
<img class="avatar" src="{{route('user.avatar', Auth::user()->image)}}" alt="">
@endif
