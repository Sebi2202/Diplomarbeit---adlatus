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
                    <!--
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <a href="{{route('sendEmail')}}" style="color:black">Send Password Reset Link</a>
                                </button>
                            </div>
                        </div> 
                    </form>
                    {!! Form::close() !!}
                    -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
