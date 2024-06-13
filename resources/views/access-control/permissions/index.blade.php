@extends('layouts.app')
@section('title','Permissions')

@section('content')
<div class="content-wrapper">
    <nav aria-label="breadcrumb" class="m-6 fixed-top">
        <ol class="breadcrumb float-end">
            <li class="breadcrumb-item">  <a href="{{route('home')}}">Home  </a>  </li>
            <li class="breadcrumb-item active" aria-current="page">Permissions </li>
        </ol>
    </nav>
    <div class="content">
        <div class="card mt-5 m-2 shadow-sm">
            <div class="card-header card-header-common p-3 pb-2">
                <span class="me-2 text-warning" data-feather="grid" style="stroke-width:2;"></span><b>Permissions</b>
                <span class="float-end">
                    <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-phoenix-secondary rounded-pill me-0" type="button">Add New
                        <span class="fas fa-plus-circle text-success"></span>
                    </a>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    @include('flash-message')
                </div>
                <div id="tableExample3" data-list='{"valueNames":["id","name","guard_name", "created_at", "updated_at"],"page":12,"pagination":true}'>
                    <div class="search-box mb-3 mx-auto">
                        <form class="position-relative">
                            <input class="form-control search-input search form-control-sm" type="search" placeholder="Search" aria-label="Search" />
                            <span class="fas fa-search search-box-icon"></span>

                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm fs-9 mb-0">
                            <thead>
                            <tr>
                                <th class="sort border-top border-translucent ps-3" data-sort="id">ID</th>
                                <th class="sort border-top" data-sort="name">Name</th>
                                <th class="sort border-top" data-sort="guard_name">Guard Name</th>
                                <th class="sort border-top" data-sort="created_at">Created at</th>
                                <th class="sort border-top" data-sort="updated_at">Updated at</th>
                                <th class="sort text-end align-middle pe-0 border-top" scope="col">ACTION</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($permissions as $permission)
                                <tr>
                                    <td class="align-middle ps-3 id"><span class="badge badge-phoenix badge-phoenix-primary">{{ $permission->id }}</span></td>
                                    <td class="align-middle name"><strong>{{ $permission->name }}</strong></td>
                                    <td class="align-middle guard_name">{{ $permission->guard_name }}</td>
                                    <td class="align-middle created_at">{{ $permission->created_at }}</td>
                                    <td class="align-middle updated_at">{{ $permission->updated_at }}</td>
                                    <td class="align-middle white-space-nowrap text-end pe-0">
                                        <div class="btn-reveal-trigger position-static">
                                            <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                                            <div class="dropdown-menu dropdown-menu-end py-2">
                                                <a class="dropdown-item" href="{{ route('permissions.edit', $permission->id) }}">Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="{{ route('permissions.remove', $permission->id) }}">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                        <ul class="mb-0 pagination"></ul>
                        <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection

