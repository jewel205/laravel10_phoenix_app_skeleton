@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row flex-center min-vh-100 py-5">
        <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3"><a class="d-flex flex-center text-decoration-none mb-4" href="{{route('login')}}">
{{--                <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img src="../../../assets/img/icons/logo.png" alt="phoenix" width="58" />--}}
                <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img src="{{ asset('assets/img/logos/logo.png')}}" alt="phoenix" width="100" />
                </div>
            </a>
            <div class="text-center mb-6">
                <h4 class="text-body-highlight">Reset your password</h4>
                <p class="text-body-tertiary">Type new password</p>
                <form class="mt-5" method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <input class="form-control mb-2 @error('email') is-invalid @enderror" id="email" type="email" placeholder="Enter your email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus />

                    @error('email')
                    <span class="mt-2 d-block invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input class="form-control mb-2 @error('password') is-invalid @enderror" id="password" type="password" placeholder="Type new password" name="password" required autocomplete="new-password" />

                    @error('password')
                    <span class="mt-2 d-block invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input class="form-control mb-4" id="password-confirm" type="password" placeholder="Cofirm new password" name="password_confirmation" required autocomplete="new-password" />
                    <button class="btn btn-primary w-100" type="submit">Set Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
