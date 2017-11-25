@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Passwort zurücksetzen</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['action' => 'DashboardController@email', 'method' => 'POST']) !!}
                    {{ Form::token() }}
                    E-Mail eingeben <br>
                    {{ Form::email('email', '', ['class' => '', 'placeholder' => 'E-Mail']) }} 
                    <br>
                    {{ Form::submit('Passwort zurücksetzen', ['class' => '']) }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
