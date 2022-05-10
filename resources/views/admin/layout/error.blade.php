@if(count($errors->all())>0)
    <ul class="my-2">
        @foreach($errors->all() as $error)
            <li><p class="text-danger bg-gray-light p-2">{{$error}}</p></li>
        @endforeach
    </ul>
@endif
