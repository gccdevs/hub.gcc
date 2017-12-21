@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="container">
            <h1>Reset Password</h1>
            @if (session('status'))
                <div class="alert alert-success" style="color:#00cba9;">
                    {{ session('status') }}
                </div>
            @endif

            <form class="container" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email" class="label">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong style="color:red;">{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-outline-info" style="width:100%" >
                        Send Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
