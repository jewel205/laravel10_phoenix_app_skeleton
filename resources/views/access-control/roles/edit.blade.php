@extends('layouts.app')
@section('title','Edit Role')

@section('content')
<div class="content-wrapper">
    <nav aria-label="breadcrumb" class="m-6 fixed-top">
        <ol class="breadcrumb float-end">
            <li class="breadcrumb-item">  <a href="{{ route('home') }}">Home  </a>  </li>
            <li class="breadcrumb-item">  <a href="{{ route('roles.index') }}">Roles  </a>  </li>
            <li class="breadcrumb-item">  <a href="{{ route('roles.show', $role->id) }}">{{ $role->name }}  </a>  </li>
            <li class="breadcrumb-item active" aria-current="page">Edit </li>
        </ol>
    </nav>
    <div class="content">
        <div class="row flex-center position-relative vh-70 g-0 py-5">
            <div class="col-xxl-9">
                <div class="card border border-translucent shadow-sm auth-card">
                    <div class="card-body pe-md-0">
                        <div class="row align-items-center gx-0 gy-7">
                            <div class="col-auto bg-body-highlight dark__bg-gray-1100 rounded-3 position-relative overflow-hidden auth-title-box">
                                <div class="bg-holder" style="background-image:url({{asset('assets/img/bg/38.png')}});">
                                </div>
                                <!--/.bg-holder-->

                                <div class="position-relative px-4 px-lg-7 pt-7 pb-7 pb-sm-5 text-center text-md-start pb-lg-7 pb-md-7">
                                    <h3 class="mb-3 text-body-emphasis fs-7">Important Note</h3>
                                    <p class="text-body-tertiary">Please fill up the following data properly in order to create a new Role!</p>
                                    <ul class="list-unstyled mb-0 w-max-content w-md-auto">
                                        <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Role Name</span></li>
                                        <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Guard Name</span></li>
                                        <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Permissions <span class="badge badge-phoenix fs-10 badge-phoenix-info"><span class="badge-label">Select</span><span class="ms-1" data-feather="alert-octagon" style="height:12.8px;width:12.8px;"></span></span></span></li>
                                    </ul>
                                </div>
                                <div class="position-relative z-n1 mb-6 d-none d-md-block text-center mt-md-15"><img class="auth-title-box-img d-dark-none" src="{{ asset('assets/img/spot-illustrations/auth.png')}}" alt="" /><img class="auth-title-box-img d-light-none" src="{{asset('assets/img/spot-illustrations/auth-dark.png')}}" alt="" /></div>
                            </div>
                            <div class="col mx-auto">
                                <div class="col-12 p-5 pt-0">
                                    <form method="post" name="requestForm" id="requestForm" action="{{route('roles.update', $role->id)}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="auth-form-box-2">
                                            <div class="text-center mb-7">
                                                <div class="d-flex flex-center text-decoration-none mb-4">
                                                    <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block">
                                                        <a  href="{{ route('roles.index') }}"><span class="text-info create-form-icon fas fa-user-tie"></span></a>
                                                    </div>
                                                </div>
                                                <h4 class="text-body-highlight">Edit Role: <span class="text-info">{{$role->name}}</span></h4>
                                                <p class="text-body-tertiary">Please Modify the following data properly in order to edit the exiting permission!</p>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control @error('name') is-invalid @enderror" type="text" maxlength="30" id="name" name="name" value="{{old('name', $role->name)}}" placeholder="EXAMPLE">
                                                        <label for="floatingInput">Role Name</label>

                                                        @error('name')
                                                        <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control @error('guard_name') is-invalid @enderror" type="text"  id="guard_name" name="guard_name" value="{{old('guard_name', $role->guard_name)}}" placeholder="EXAMPLE" required readonly>
                                                        <label for="floatingInput">Guard Name (Usually web)</label>

                                                        @error('guard_name')
                                                        <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3 mb-1">
                                                <div class="col-12"><h6>Select Permissions</h6></div>
                                            </div>
                                            @if ($errors->has('permissions'))
                                                <div class="row">
                                                    <div class="alert alert-outline-warning d-flex align-items-center" role="alert">
                                                        <span class="fas fa-info-circle text-warning fs-5 me-3"></span>
                                                        <p class="mb-0 flex-1">{{ $errors->first('permissions') }}</p>
                                                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="checkAll" name="checkAll" type="checkbox" />
                                                        <label class="form-check-label text-primary" for="permissions"><strong>Select All</strong></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2 mb-3">
                                                @foreach($permissions as $permission)
                                                    <div class="col-md-6 col-lg-4 col-sm-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input individual-checkbox" id="permissions" name="permissions[]" type="checkbox" value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions) ? "checked" : "" }} />
                                                            <label class="form-check-label" for="permissions">{{ ucwords(str_replace('-',' ',$permission->name)) }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                            <button type="submit" class="btn btn-info float-end"><span class="fas fa-edit"></span> Update Role</button>
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

