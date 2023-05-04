@extends('layouts.auth')

@section('content')
<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>LOGIN</h3>
				<p></p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form class="form-horizontal" id="loginForm" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="usernameexemple" title="Please enter you username" id="username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                                <span class="help-block small">Votre unique username de l' app</span>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" id="password" title="Please enter your password" placeholder="******" required="" value="" name="password"  class="form-control">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <span class="help-block small">Votre mot de passe</span>
                            </div>
                            <div class="checkbox login-checkbox">
                                <label>
										
                            </div>
                            <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                        </form>
                    </div>
                </div>
			</div>
			
		</div>   
    </div>
@endsection