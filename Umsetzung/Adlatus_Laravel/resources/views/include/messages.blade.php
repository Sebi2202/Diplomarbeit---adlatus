<style>
    .err {
        position:relative;
        font-family:Verdana;
        color:red;
        margin-left:48.6%;
        bottom:260px;
        white-space:nowrap;
    }

    @media screen and (max-width:1400px) {.err {margin-left:49%;} }
    @media screen and (max-width:1040px) {.err {margin-left:50%;} }
    @media screen and (max-width:795px) {.err {display:none;} }

    .suc {
        
    }
</style>

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="err">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="suc">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="err">
        {{session('error')}}
    </div>
@endif
