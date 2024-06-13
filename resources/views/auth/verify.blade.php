@extends('layouts.app')
@section('title','Verify Email')

@section('content')
<div class="container">
    <div class="row flex-center min-vh-100 py-5">
        <div class="col-xxl-6 col-xl-8">
            <div class="card p-5 bg-light shadow-sm">
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-outline-success d-flex align-items-center w-100" role="alert">
                            <span class="fas fa-envelope-open-text text-success fs-5 me-3"></span>
                            <p class="mb-0 flex-1">{{ __('A fresh verification link has been sent to your email address.') }}</p>
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="text-center mb-5">
                        <div class="avatar avatar-4xl mb-4"><span class="fas fa-user-clock fs-1 text-warning p-3"></span></div>
                        <h2 class="text-body-highlight"> <span class="fw-normal">Hello </span>{{\Illuminate\Support\Facades\Auth::user()->name}}</h2>
                        <p class="text-body-tertiary">
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }}, {{ __('click the button below to request another') }}.
                        </p>
                    </div>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">{{ __('Request Verification Email') }}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
