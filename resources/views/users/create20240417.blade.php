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
                <div class="col-11 col-xxl-8 col-xl-12">
                    <div class="card border border-translucent auth-card shadow-sm">
                        <div class="card-body pe-md-0">
                            <div class="row align-items-center gx-0 gy-7">
                                <div class="col-auto bg-body-highlight dark__bg-gray-1100 rounded-3 position-relative overflow-hidden auth-title-box">
                                    <div class="bg-holder" style="background-image:url({{asset('assets/img/bg/38.png')}});">
                                    </div>
                                    <!--/.bg-holder-->

                                    <div class="position-relative px-4 px-lg-7 pt-7 pb-7 pb-sm-5 text-center text-md-start pb-lg-7 pb-md-7">
                                        <h3 class="mb-3 text-body-emphasis fs-7">Important Note</h3>
                                        <p class="text-body-tertiary">Please fill up the following data properly in order to create a new User!</p>
                                        <ul class="list-unstyled mb-0 w-max-content w-md-auto">
                                            <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">User Full Name</span></li>
                                            <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Email</span></li>
                                            <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Phone</span></li>
                                            <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Password</span></li>
                                            <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Remarks</span></li>
                                            <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Status</span></li>
                                        </ul>
                                    </div>
                                    <div class="position-relative z-n1 mb-6 d-none d-md-block text-center mt-md-15"><img class="auth-title-box-img d-dark-none" src="{{ asset('assets/img/spot-illustrations/auth.png')}}" alt="" /><img class="auth-title-box-img d-light-none" src="{{asset('assets/img/spot-illustrations/auth-dark.png')}}" alt="" /></div>
                                </div>
                                <div class="col mx-auto">
                                    <div class="col-12 p-5 pt-0">
                                        <form method="post" name="requestForm" id="requestForm" action="{{route('users.store')}}">
                                            @csrf
                                            <div class="auth-form-box-2">
                                                <div class="text-center mb-5"><a class="d-flex flex-center text-decoration-none mb-4" href="{{ route('users.index') }}">
                                                        <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><span class="text-success create-form-icon fas fa-users-cog"></span>
                                                        </div>
                                                    </a>
                                                    <h3 class="text-body-highlight">Create New User</h3>
                                                    <p class="text-body-tertiary">Please fill up the following fields</p>
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

                                                <div class="form-floating mb-">
                                                    <input class="form-control @error('remarks') is-invalid @enderror" type="text"  id="remarks" name="remarks" value="{{old('remarks')}}" placeholder="EXAMPLE" required>
                                                    <label for="remarks">Remarks</label>

                                                    @error('remarks')
                                                    <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
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

                                                <div class="input-group input-group-sm mt-3 mb-3">
                                                    <button class="input-group-text" id="inputGroup-sizing-default" type="button" data-bs-toggle="modal" data-bs-target="#cuisineModal"><span class="fas fa-search text-primary"></span></button>
                                                    <div class="form-floating">
                                                        <input class="form-control @error('branch') is-invalid @enderror" type="text"  id="branch_description" name="branch_description" value="{{old('branch_description')}}" placeholder="EXAMPLE" readonly>
                                                        <input class="form-control @error('branch') is-invalid @enderror" type="text"  id="branch" name="branch" value="{{old('branch')}}" placeholder="EXAMPLE" readonly hidden>
                                                        <label for="branch">Branch</label>

                                                        @error('branch')
                                                        <span class="mt-2 d-block invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>

                                                    <button class="input-group-text" id="clearBranch" type="button" onclick="clearBranchField()"><span class="fas fa-window-close text-danger"></span></button>

                                                    <div class="modal fade modal-xl" id="cuisineModal" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="verticallyCenteredModalLabel">Select a Branch</h5>
                                                                    <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs-9"></span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div id="categoryTable" data-list='{"valueNames":["code", "description", "entity", "unit"],"page":5,"pagination":true, "filter":{"key":"unit"}}'>
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <div class="search-box mb-3">
                                                                                    <form class="position-relative">
                                                                                        <input class="form-control search-input search form-control-sm" type="search" placeholder="Search" aria-label="Search" />
                                                                                        <span class="fas fa-search search-box-icon"></span>

                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="row justify-content-end g-0">
                                                                                    <div class="col-auto">
                                                                                        <select class="form-select form-select-sm mb-3" data-list-filter="data-list-filter">
                                                                                            @php
                                                                                                // Extract unique units from $branches
                                                                                                $uniqueUnits = [];
                                                                                                foreach ($branches as $branch) {
                                                                                                    $uniqueUnits[] = $branch->unitName->description;
                                                                                                }
                                                                                                $uniqueUnits = array_unique($uniqueUnits);
                                                                                            @endphp
                                                                                            <option selected="" value="">Select Unit</option>
                                                                                            @foreach ($uniqueUnits as $description)
                                                                                                <option selected value="{{ $description }}">{{ $description }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="table-responsive">
                                                                            <table class="table table-sm fs-9 mb-0">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th class="sort border-top" data-sort="code">Branch Code</th>
                                                                                    <th class="sort border-top" data-sort="description">Branch Description</th>
                                                                                    <th class="sort border-top" data-sort="entity">Entity</th>
                                                                                    <th class="sort border-top" data-sort="unit">Unit</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody class="list">
                                                                                @foreach($branches as $index => $branch)
                                                                                    <tr>
                                                                                        <td class="align-middle code"><span class="far fa-plus-square btn btn-sm text-primary" id="code_{{$index}}" data-bs-dismiss="modal" data-value="{{$branch->code}}" onclick="branchSelect('{{$branch->code}}', '{{$branch->description}}')"></span><strong>{{ $branch->code }}</strong></td>
                                                                                        <td class="align-middle description"><strong>{{ $branch->description }}</strong></td>
                                                                                        <td class="align-middle entity">{{ $branch->unitName->entityName->description }}</td>
                                                                                        <td class="align-middle unit">{{ $branch->unitName->description }}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="d-flex flex-between-center pt-3">
                                                                            <div class="pagination d-none"></div>
                                                                            <p class="mb-0 fs-9">
                                                                                <span class="d-none d-sm-inline-block" data-list-info="data-list-info"></span>
                                                                                <span class="d-none d-sm-inline-block"> &mdash; </span>
                                                                                <a class="fw-semibold" href="#!" data-list-view="*">
                                                                                    View all
                                                                                    <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                                                                                </a><a class="fw-semibold d-none" href="#!" data-list-view="less">
                                                                                    View Less
                                                                                    <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                                                                                </a>
                                                                            </p>
                                                                            <div class="d-flex">

                                                                                <button class="btn btn-sm btn-subtle-secondary rounded-pill" type="button" data-list-pagination="prev"><span>Previous</span></button>

                                                                                <button class="btn btn-sm btn-subtle-secondary px-4 ms-2 rounded-pill" type="button" data-list-pagination="next"><span>Next</span></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

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
