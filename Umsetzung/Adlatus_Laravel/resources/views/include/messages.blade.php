@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="">
        {{session('error')}}
    </div>
@endif
