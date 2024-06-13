@extends('layouts.app')
@section('title','Password Reset')

@section('content')
    <div class="container">
        <div class="row flex-center min-vh-100 py-5">
            <div class="col-sm-10 col-md-8 col-lg-5 col-xxl-4"><a class="d-flex flex-center text-decoration-none mb-4" href="{{route('login')}}">
{{--                    <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img src="{{asset('assets/img/icons/logo.png')}}" alt="phoenix" width="58" />--}}
                    <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img src="{{ asset('assets/img/logos/logo.png')}}" alt="phoenix" width="100" />
                    </div>
                </a>
                <div class="px-xxl-5">
                    <div class="text-center mb-6">
                        <h4 class="text-body-highlight">Forgot your password?</h4>
                        <p class="text-body-tertiary mb-5">Enter your email below and we will send <br class="d-sm-none" />you a reset link</p>
                        <div class="row">
                            @if (session('status'))
                                <div class="alert alert-outline-success d-flex align-items-center" role="alert">
                                    <span class="fas fa-envelope-open-text text-success fs-5 me-3"></span>
                                    <p class="mb-0 flex-1">{{ session('status') }}</p>
                                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <form class="d-flex align-items-center mb-5" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <input class="form-control flex-1 @error('email') is-invalid @enderror" id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                            <button class="btn btn-primary ms-2">Send<span class="fas fa-chevron-right ms-2"></span></button>
                        </form>
                        <a class="fs-9 fw-bold" href="#!">Still having problems?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
