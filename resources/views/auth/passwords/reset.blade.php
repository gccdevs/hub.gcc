@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="box">
            <p class="is-size-1">Reset Password</p>
            <div class="box">
                <form class="form" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="field">
                        <label for="email" class="label">E-Mail Address</label>

                        <div class="control">
                            <input id="email" type="email" class="input" name="email" value="{{ $email or old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong style="color:red;">{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="field">
                        <label for="password" class="label">Password</label>

                        <div class="control">
                            <input id="password" type="password" class="input" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong style="color:red;">{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="field">
                        <label for="password-confirm" class="label">Confirm Password</label>
                        <div class="control">
                            <input id="password-confirm" type="password" class="input" name="password_confirmation" required>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong style="color:red;">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>



                    <div class="field">
                        <div class="control">
                            <button class="button is-primary" style="width:100%" type="submit">
                                Reset Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
