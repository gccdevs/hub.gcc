@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="box">
            <p class="is-size-1">Reset Password</p>
            <div class="box">
                @if (session('status'))
                    <div class="alert alert-success" style="color:#00cba9;">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="field">
                        <label for="email" class="label">E-Mail Address</label>

                        <div class="control">
                            <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong style="color:red;">{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <button type="submit" id="send" onclick="isLoading()"  class="button is-primary" style="width:100%" >
                                Send Password Reset Link
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        function isLoading () {
            document.getElementById("send").classList.add('is-loading');
        }

    </script>

@endsection
