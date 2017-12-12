
@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="box">
            <p class="is-size-1">Register</p>
            <div class="box">
                        <form class="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="field">
                                <label for="name" class="label">Name</label>

                                <div class="control">
                                    <input id="name" type="text" class="input" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block" style="color: red">
                                        <strong style='color:red'>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="field">
                                <label for="email" class="label">E-Mail Address</label>

                                <div class="control">
                                    <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block" style="color: red">
                                        <strong style='color:red'>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="label">Password</label>

                                <div class="control">
                                    <input id="password" type="password" class="input" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block" style="color: red">
                                        <strong style='color:red'>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="field">
                                <label for="password-confirm" class="label">Confirm Password</label>

                                <div class="control">
                                    <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="button is-primary" style='width:100%;'>
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
        </div>
    </div>
@endsection
