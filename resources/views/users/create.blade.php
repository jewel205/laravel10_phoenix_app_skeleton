@extends('layouts.app')
@section('title','Create New User')

@section('content')
    <div class="content-wrapper">
        <nav aria-label="breadcrumb" class="m-6 fixed-top">
            <ol class="breadcrumb float-end">
                <li class="breadcrumb-item">  <a href="{{route('home')}}">Home  </a>  </li>
                <li class="breadcrumb-item">  <a href="{{route('users.index')}}">Users  </a>  </li>
                <li class="breadcrumb-item active" aria-current="page">Create </li>
            </ol>
        </nav>
        <div class="content">
            <div class="row flex-center position-relative vh-70 g-0 py-5">
                <div class="col-xxl-7 col-xl-9">
                    <div class="card border border-translucent auth-card shadow-sm">
                        <div class="card-body pe-md-0">
                            <div class="row align-items-center gx-0 gy-7">
                                <div class="col mx-auto">
                                    <div class="col-12 px-4 pe-7 pt-0">
                                        <form method="post" name="requestForm" id="requestForm" action="{{route('users.store')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="auth-form-box-2">
                                                <div class="text-center mb-7 mt-4">
                                                    <div class="d-flex flex-center text-decoration-none mb-4 ">
                                                        <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block">
                                                            <div class="image-upload-box" id="thumbnailUploadBox">
                                                                <input type="file" class="formFileSm" id="item-thumbnail" name="item_thumbnail" style="display: none;">
                                                                <span class="text-dark p-2 rounded-2 fas fa-plus-circle upload-icon opacity-75" id="uploadImage"></span>
                                                                <span class="text-white p-2 rounded-2 far fa-edit edit-icon opacity-75" id="editImage" style="display: none"></span>
                                                                <img class="uploaded-image" id="uploadedThumbnail" src="#" alt="Uploaded Image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h4 class="text-body-highlight">Create New User</h4>
                                                    <p class="text-body-tertiary">Please fill up the following fields</p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 p-0 m-1">
                                                        @include('flash-message')
                                                    </div>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control @error('name') is-invalid @enderror" type="text"  id="name" name="name" value="{{old('name')}}" placeholder="EXAMPLE" required>
                                                    <label for="name">User Full Name</label>

                                                    @error('name')
                                                    <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control @error('email') is-invalid @enderror" type="text"  id="email" name="email" value="{{old('email')}}" placeholder="EXAMPLE" required>
                                                            <label for="email">Email</label>

                                                            @error('email')
                                                            <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control @error('phone') is-invalid @enderror" type="text"  id="phone" name="phone" value="{{old('phone')}}" placeholder="EXAMPLE" required>
                                                            <label for="phone">Phone</label>

                                                            @error('phone')
                                                            <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control @error('password') is-invalid @enderror" type="password"  id="password" name="password" value="{{old('password')}}" placeholder="EXAMPLE" required>
                                                            <label for="phone">Password</label>

                                                            @error('password')
                                                            <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control @error('phone') is-invalid @enderror" type="password"  id="confirm-password" name="confirm-password" value="{{old('confirm-password')}}" placeholder="EXAMPLE" required>
                                                            <label for="confirm-password">Confirm Password</label>

                                                            @error('confirm-password')
                                                            <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-12"><h6>Select Role</h6></div>
                                                </div>

                                                <div class="row mt-2 mb-3">
                                                    @foreach($roles as $role)
                                                        <div class="col-sm-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input individual-checkbox" id="role" name="role" type="radio" value="{{ $role->id }}" />
                                                                <label class="form-check-label" for="roles">{{ ucwords(str_replace('-',' ',$role->name)) }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="form-check mb-5">
                                                    <input class="form-check-input" id="is_active" name="is_active" type="checkbox" value="1" checked>
                                                    <label class="form-check-label" for="is_active">Active</label>
                                                </div>
                                                <button type="submit" class="btn btn-info float-end"><span class="fas fa-download"></span> Create User</button>
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
@endsection
