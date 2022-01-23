@if(session()->has('message'))
<div class="text-green-500 font-bold text-right " >
    <p> {{ session()->get('message') }}</p>
</div>
@endif
