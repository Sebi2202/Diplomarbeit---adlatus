@if(count($errors) > 0)
     @foreach($errors->all() as $error)
        <h3 style="color: red">{{$error}}</h3>
     @endforeach
@endif

@if(session('success'))
    <h3 style="color: green">{{session('success')}}</h3>
@endif

@if(session('error'))
    <h3 style="color: red">{{session('error')}}</h3>
@endif