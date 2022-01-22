@extends('layouts.app')

@section('content')
<div class="container" style="width: 400px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1 style="text-align: center;">{{ __('Login') }}</h1></div>
                <br/>
                <br/>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-12">

                            <div class="col-md-12">
                                <label for="email" class="col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br/>

                        <div class="row mb-12">

                            <div class="col-md-12">
                                <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-12">
                            <br/>
                            <div class="col-md-12 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <br/>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-0" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <br/>
                                <br/>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
