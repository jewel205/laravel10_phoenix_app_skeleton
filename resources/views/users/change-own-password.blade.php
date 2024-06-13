@extends('layouts.app')
@section('title','Update user password')

@section('content')
<div class="content-wrapper">
    <nav aria-label="breadcrumb" class="m-6 fixed-top">
        <ol class="breadcrumb float-end">
            <li class="breadcrumb-item">  <a href="{{ route('home') }}">Home  </a>  </li>
            <li class="breadcrumb-item">  <a href="{{ route('users.index') }}">Users  </a>  </li>
            <li class="breadcrumb-item">  <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}  </a>  </li>
            <li class="breadcrumb-item active" aria-current="page">Change-Password </li>
        </ol>
    </nav>
    <div class="content">
        <div class="row flex-center position-relative vh-70 g-0 py-5">
            <div class="col-xxl-6 col-xl-8">
                <div class="card border border-translucent auth-card shadow-sm">
                    <div class="card-body pe-md-0">
                        <div class="row align-items-center gx-0 gy-7">
                            <div class="col-auto bg-body-highlight dark__bg-gray-1100 rounded-3 position-relative overflow-hidden auth-title-box">
                                <div class="bg-holder" style="background-image:url({{asset('assets/img/bg/38.png')}});">
                                </div>
                                <!--/.bg-holder-->

                                <div class="position-relative px-4 px-lg-7 pt-7 pb-7 pb-sm-5 text-center text-md-start pb-lg-7 pb-md-7">
                                    <h3 class="mb-3 text-body-emphasis fs-7">Important Note</h3>
                                    <p class="text-body-tertiary">Please fill up the following data properly in order to update the password!</p>
                                    <ul class="list-unstyled mb-0 w-max-content w-md-auto">
                                        <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Current Password</span></li>
                                        <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Password</span></li>
                                        <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Confirm Password</span></li>
                                    </ul>
                                </div>
                                <div class="position-relative z-n1 mb-6 d-none d-md-block text-center mt-md-15"><img class="auth-title-box-img d-dark-none" src="{{ asset('assets/img/spot-illustrations/auth.png')}}" alt="" /><img class="auth-title-box-img d-light-none" src="{{asset('assets/img/spot-illustrations/auth-dark.png')}}" alt="" /></div>
                            </div>
                            <div class="col mx-auto">
                                <div class="col-12 p-5 pt-0">
                                    <form method="post" name="requestForm" id="requestForm" action="{{route('users.updateOwnPassword', $user->id)}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="auth-form-box-2">
                                            <div class="text-center mb-5"><a class="d-flex flex-center text-decoration-none mb-4" href="{{ route('users.index') }}">
                                                    <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><span class="text-success create-form-icon fas fa-users-cog"></span>
                                                    </div>
                                                </a>
                                                <h4 class="text-body-highlight">Change <span class="text-info">{{$user->name}}'s </span>Password</h4>
                                            </div>

                                            <div class="row">
                                                @include('flash-message')
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control @error('current_password') is-invalid @enderror" type="password"  id="current_password" name="current_password" placeholder="EXAMPLE">
                                                <label for="phone">Enter Current Password</label>

                                                @error('current_password')
                                                <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input class="form-control @error('password') is-invalid @enderror" type="password"  id="password" name="password" placeholder="EXAMPLE">
                                                <label for="password">New Password</label>

                                                @error('password')
                                                <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input class="form-control @error('phone') is-invalid @enderror" type="password"  id="confirm-password" name="confirm-password" placeholder="EXAMPLE">
                                                <label for="confirm-password">Confirm Password</label>

                                                @error('confirm-password')
                                                <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-info float-end"><span class="fas fa-edit"></span> Update Password</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
    <script>
        function categorySelect(code, description) {
            console.log("reached");
            document.getElementById('category_description').value = description;
            document.getElementById('category').value = code;
        }

        document.getElementById('supp_duty').addEventListener('input', handleNumericInput);
        document.getElementById('price_inc_vat').addEventListener('input', handleNumericInput);
    </script>
@endsection

