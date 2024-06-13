@extends('layouts.app')
@section('title', 'Register')

@section('content')
    <div class="row vh-100 g-0">
        <div class="col-lg-6 position-relative d-none d-lg-block">
            <div class="bg-holder" style="background-image:url({{asset('assets/img/bg/32.png')}});">
            </div>
            <!--/.bg-holder-->

        </div>
        <div class="col-lg-6">
            <div class="row flex-center h-100 g-0 px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6"><a class="d-flex flex-center text-decoration-none mb-4" href="../../../index.html">
                        {{--                        <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img src="{{ asset('assets/img/icons/logo.png')}}" alt="phoenix" width="58" />--}}
                        <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img src="{{ asset('assets/img/logos/logo.png')}}" alt="phoenix" width="100" />
                        </div>
                    </a>
                    <div class="text-center mb-7">
                        <h3 class="text-body-highlight">Sign Up</h3>
                        <p class="text-body-tertiary">Create your account</p>
                    </div>
                    {{--                    <button class="btn btn-phoenix-secondary w-100 mb-3"><span class="fab fa-google text-danger me-2 fs-9"></span>Sign up with google</button>--}}
                    {{--                    <button class="btn btn-phoenix-secondary w-100"><span class="fab fa-facebook text-primary me-2 fs-9"></span>Sign up with facebook</button>--}}
                    {{--                    <div class="position-relative mt-4">--}}
                    {{--                        <hr class="bg-body-secondary" />--}}
                    {{--                        <div class="divider-content-center">or use email</div>--}}
                    {{--                    </div>--}}
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 p-0 m-1">
                                @include('flash-message')
                            </div>
                        </div>
                        <div class="mb-3 text-start">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                        </div>
                        <div class="mb-3 text-start">
                            <label class="form-label" for="email">Email address</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" placeholder="name@example.com" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                            @error('email')
                            <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3 text-start">
                            <label class="form-label" for="email">Phone</label>
                            <input class="form-control @error('phone') is-invalid @enderror" id="phone" type="text" placeholder="01... " name="phone" value="{{ old('phone') }}" required autocomplete="phone"/>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control form-icon-input  @error('password') is-invalid @enderror" id="password" type="password" placeholder="Password" name="password" required autocomplete="new-password" />
                                @error('password')
                                <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="confirm_password">Confirm Password</label>
                                <input class="form-control form-icon-input  @error('confirm-password') is-invalid @enderror" id="confirm_password" type="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password"/>
                                @error('confirm-password')
                                <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary w-100 mb-3">Sign up</button>
                        <div class="text-center"><a class="fs-9 fw-bold" href="{{route('login')}}">Already an user? Sign in</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
