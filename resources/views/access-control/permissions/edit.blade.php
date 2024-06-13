@extends('layouts.app')
@section('title','Edit Permission')

@section('content')
<div class="content-wrapper">
    <nav aria-label="breadcrumb" class="m-6 fixed-top">
        <ol class="breadcrumb float-end">
            <li class="breadcrumb-item">  <a href="{{ route('home') }}">Home  </a>  </li>
            <li class="breadcrumb-item">  <a href="{{ route('permissions.index') }}">Permission  </a>  </li>
            <li class="breadcrumb-item">  {{ $permission->id }} </li>
            <li class="breadcrumb-item active" aria-current="page">Edit </li>
        </ol>
    </nav>
    <div class="content">
        <div class="row flex-center position-relative vh-70 g-0 py-5">
            <div class="col-xxl-7 col-xl-9">
                <div class="card border border-translucent shadow-sm auth-card">
                    <div class="card-body pe-md-0">
                        <div class="row align-items-center gx-0 gy-7">
                            <div class="col-auto bg-body-highlight dark__bg-gray-1100 rounded-3 position-relative overflow-hidden auth-title-box">
                                <div class="bg-holder" style="background-image:url({{asset('assets/img/bg/38.png')}});">
                                </div>
                                <!--/.bg-holder-->

                                <div class="position-relative px-4 px-lg-7 pt-7 pb-7 pb-sm-5 text-center text-md-start pb-lg-7 pb-md-7">
                                    <h3 class="mb-3 text-body-emphasis fs-7">Important Note</h3>
                                    <p class="text-body-tertiary">Please Modify the following data properly in order to edit the exiting permission!</p>
                                    <ul class="list-unstyled mb-0 w-max-content w-md-auto">
                                        <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Name</span></li>
                                        <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Guard Name</span></li>
                                    </ul>
                                </div>
                                <div class="position-relative z-n1 mb-6 d-none d-md-block text-center mt-md-15"><img class="auth-title-box-img d-dark-none" src="{{ asset('assets/img/spot-illustrations/auth.png')}}" alt="" /><img class="auth-title-box-img d-light-none" src="{{asset('assets/img/spot-illustrations/auth-dark.png')}}" alt="" /></div>
                            </div>
                            <div class="col mx-auto">
                                    <div class="col-12 p-5 pt-0">
                                        <form method="post" name="requestForm" id="requestForm" action="{{route('permissions.update', $permission->id)}}">
                                            @csrf
                                            @method('PUT')
                                            <div class="auth-form-box-2">
                                                <div class="text-center mb-7">
                                                    <div class="d-flex flex-center text-decoration-none mb-4">
                                                        <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block">
                                                            <a  href="{{ route('roles.index') }}"><span class="text-info create-form-icon fas fa-user-tie"></span></a>
                                                        </div>
                                                    </div>
                                                    <h4 class="text-body-highlight">Edit Permission: <span class="text-info">{{$permission->name}}</span></h4>
                                                    <p class="text-body-tertiary">Please modify the following fields where required</p>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control @error('name') is-invalid @enderror" type="text" maxlength="30" id="name" name="name" value="{{old('name', $permission->name)}}" placeholder="EXAMPLE" required>
                                                            <label for="floatingInput">Permission Name</label>

                                                            @error('name')
                                                            <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control @error('guard_name') is-invalid @enderror" type="text"  id="guard_name" name="guard_name" value="{{old('guard_name', $permission->guard_name)}}" placeholder="EXAMPLE" required readonly>
                                                            <label for="floatingInput">Guard Name (Usually web)</label>

                                                            @error('guard_name')
                                                            <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-info float-end"><span class="fas fa-edit"></span> Update Permission</button>
                                            </div>
                                        </form>

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
@endsection

@section('scripts')
@endsection

