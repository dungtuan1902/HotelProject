@extends('templates.admin.layout')
@section('content')
    <div class="container-fluid py-4">
        @if (Session::has('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif
        @if (Session::has('error'))
            {{ Session::get('error') }}
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>{{ $title }}</h6>
                        <div>
                            <a href="{{ route('view_delete_role') }}"
                                class="btn btn-outline-danger text-danger  fw-bolder  btn-sm rounded-pill "
                                data-toggle="tooltip" data-original-title="add user">
                                Move to trash
                            </a>
                            <a href="{{ route('insert_role') }}"
                                class="btn btn-outline-success text-success  fw-bolder  btn-sm rounded-pill "
                                data-toggle="tooltip" data-original-title="add user">
                                NEW Role
                            </a>

                        </div>

                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            IS_disable</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Create At
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Update at</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($role as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div
                                                        class="p-2 rounded-2 d-flex flex-column justify-content-center {{ $item->color }}">
                                                        <h6 class="mb-0 text-sm text-white">{{ $item->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-sm  {{ $item->is_disabled == 1 ? 'bg-gradient-success' : 'bg-gradient-secondary' }}">{{ $item->is_disabled == 1 ? 'Enable' : 'Disable' }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="ext-secondary text-xs font-weight-bold">{{ $item->created_at == '' ? 'N/A' : $item->created_at }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->update_at == '' ? 'N/A' : $item->update_at }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                @can('isAdmin')
                                                    <a href="{{ route('edit_role', ['id' => $item->id]) }}"
                                                        class="my-3 btn btn-outline-warning text-warning fw-light  btn-sm"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        Edit
                                                    </a>
                                                    <a onclick="return confirm('Are you sure ?')"
                                                        href="{{ route('delete_role', ['id' => $item->id]) }}"
                                                        class="my-3 btn btn-outline-danger text-danger fw-light  btn-sm"
                                                        data-toggle="tooltip" data-original-title="Delete user">
                                                        Delete
                                                    </a>
                                                @endcan
                                                @cannot('isAdmin')
                                                    <svg id="square" xmlns="http://www.w3.org/2000/svg" height="1.5em"
                                                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                        <path
                                                            d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                                    </svg>
                                                @endcannot

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
