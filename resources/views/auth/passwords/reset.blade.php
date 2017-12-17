@extends('layouts.app')

@section('content')
<br>
    <div class="container">
        <div class="box">
            <h1>Reset Password</h1>
                <form class="form" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label for="email" >E-Mail Address</label>

                            <input id="email" type="email" class="form-control" placeholder="{{ $email }}" name="email" value="{{ $email or old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong style="color:red;">{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                    <div class="form-group">
                        <label for="password">Password</label>

                        <div class="control">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong style="color:red;">{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <div class="control">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong style="color:red;">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                            <button class="btn btn-outline-info" style="width:100%" type="submit">
                                Reset Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
@endsection
