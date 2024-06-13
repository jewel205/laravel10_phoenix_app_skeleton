@extends('layouts.app')
@section('title','Users')

@section('content')
<div class="content-wrapper">
    <nav aria-label="breadcrumb" class="m-6 fixed-top">
        <ol class="breadcrumb float-end">
            <li class="breadcrumb-item">  <a href="{{route('home')}}">Home  </a>  </li>
            <li class="breadcrumb-item active" aria-current="page">Users </li>
        </ol>
    </nav>
    <div class="content">
        <div class="card mt-5 m-2 shadow-sm">
            <div class="card-header card-header-common p-3 pb-2">
                <span class="me-2 text-warning" data-feather="grid" style="stroke-width:2;"></span><b>Users</b>
                <span class="float-end">
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-phoenix-secondary rounded-pill me-0" type="button">Add New
                        <span class="fas fa-plus-circle text-success"></span>
                    </a>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    @include('flash-message')
                </div>
                <div id="tableExample3" data-list='{"valueNames":["id","name","username", "email", "role", "phone", "remarks", "active"],"page":12,"pagination":true, "filter":{"key":"role"}}'>
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
                                            // Extract unique descriptions from $categories
                                            $uniqueRoles = [];
                                            foreach ($users as $user) {
                                                $role = $user->roles->first();
                                                if ($role) {
                                                    $uniqueRoles[] = $role->name;
                                                }
                                            }
                                            $uniqueRoles = array_unique($uniqueRoles);
                                        @endphp
                                        <option selected="" value="">Select Role</option>
                                        @foreach ($uniqueRoles as $description)
                                            <option value="{{ $description }}">{{ $description }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm fs-9 mb-0">
                            <thead>
                            <tr>
                                <th class="sort border-top border-translucent ps-3" data-sort="id">ID</th>
                                <th class="sort border-top" data-sort="name">Full Name</th>
                                <th class="sort border-top" data-sort="username">Username</th>
                                <th class="sort border-top" data-sort="email">Email</th>
                                <th class="sort border-top" data-sort="email">Role</th>
                                <th class="sort border-top" data-sort="phone">Phone</th>
                                <th class="sort border-top" data-sort="remarks">Remarks</th>
                                <th class="sort border-top" data-sort="active">Status</th>
                                <th class="sort text-end align-middle pe-0 border-top" scope="col">ACTION</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($users as $user)
                                <tr>
                                    <td class="align-middle ps-3 id"><span class="badge badge-phoenix badge-phoenix-primary">{{ $user->id }}</span></td>
                                    <td class="align-middle name"><strong>{{ $user->name }}</strong></td>
                                    <td class="align-middle username">{{ $user->username }}</td>
                                    <td class="align-middle email">{{ $user->email }}</td>
                                    <td class="align-middle role">
                                        @if($user->roles->isNotEmpty())
                                            <span class="badge badge-phoenix fs-10 badge-phoenix-info">{{ $user->roles->first()->name }}</span>
                                        @endif
                                    </td>

                                    <td class="align-middle phone">{{ $user->phone }}</td>
                                    <td class="align-middle remarks">{{ $user->remarks }}</td>
                                    <td class="align-middle active">
                                    @if($user->is_active == 1)
                                            <a href="{{route('users.statusChange', $user->id)}}"><div class="badge badge-phoenix fs-10 badge-phoenix-success"><span class="fw-bold">Active</span><span class="ms-1 fas fa-check"></span></div></a>
                                    @else
                                            <a href="{{route('users.statusChange', $user->id)}}"><div class="badge badge-phoenix fs-10 badge-phoenix-danger"><span class="fw-bold">Inactive</span><span class="ms-1 fas fa-ban"></span></div></a>
                                    @endif
                                    </td>
                                    <td class="align-middle white-space-nowrap text-end pe-0">
                                        <div class="btn-reveal-trigger position-static">
                                            <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                                            <div class="dropdown-menu dropdown-menu-end py-2">
                                                <a class="dropdown-item" href="{{ route('users.show', $user->id) }}">View</a>
                                                <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{ route('users.passwordChange', $user->id) }}">Change Password</a>
{{--                                                <a class="dropdown-item text-danger" href="{{ route('users.destroy', $user->id) }}" disabled="true">Remove</a>--}}
                                            </div>
                                        </div>
                                    </td>
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

        </div>
    </div>
</div>
@endsection

