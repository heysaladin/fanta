@extends('layouts.app')

@section('content')
<div class="container" style="width: 400px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1 style="text-align: center;">{{ __('Register') }}</h1></div>
                <br/>
                <br/>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-12" style="">
                            <div class="col-md-12">
                                <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br/>

                        <div class="row mb-12">
                            <div class="col-md-12">
                                <label for="email" class="col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <br/>

                        <div class="row mb-12">
                            <div class="col-md-12">
                                <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <br/>
                        <br/>

                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-0" style="display: flex; justify-content: center; align-items: center;">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
