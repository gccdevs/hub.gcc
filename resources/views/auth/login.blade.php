@extends('layouts.app')


<style>

    input {
        outline: 0 !important;
        border-width: 0 0 2px 0 !important;
        border-color: darkgray !important;
    }

    input:focus {
    outline: 0 !important;
    border-width: 0 0 2px 0 !important;
    border-color: #1598af !important;
    }

</style>

@section('content')
    <br>
    <div class="container">
        <div class="box">
            <p class="is-size-1">Login</p>
            <div class="box">
                <form class="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="field">
                        <label for="email" class="label">E-Mail Address</label>

                        <div class="control">
                            <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong style="color:red !important;">{{ $errors->first('email') }}</strong>
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
                                        <strong style="color:red !important;">{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <button class="button is-primary" style="width:100%" type="submit">
                                Login
                            </button>

                            <a style="color:#5bc0de;" class="has-text-centered" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
