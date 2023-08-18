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
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ Session::get('error') }}
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>{{ $title }}</h6>
                        <div>
                            <a href="{{ route('view_delete_phong') }}"
                                class="btn btn-outline-danger text-danger  fw-bolder  btn-sm rounded-pill "
                                data-toggle="tooltip" data-original-title="add user">
                                Trash to move
                            </a>
                            <a href="{{ route('insert_phong') }}"
                                class="btn btn-outline-success text-success  fw-bolder  btn-sm rounded-pill "
                                data-toggle="tooltip" data-original-title="add user">
                                NEW ROOM
                            </a>

                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Room</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  text-center">
                                            Count People</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  text-center">
                                            Price</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Created at</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($room as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ Storage::url($item->image) }}"
                                                            class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->name }}
                                                            {!! $item->id_km != 0 ? '<span class="badge rounded-pill bg-success">Sale</span>' : '' !!}
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">Room {{ $item->id }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->soLuong }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->price }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm {{ $item->action == 1 ? 'bg-gradient-secondary' : ($item->action == 2 ? 'bg-gradient-warning' : 'bg-gradient-success') }}">{{ $item->action == 1 ? 'Empty' : ($item->action == 2 ? 'Processing' : 'Full') }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->created_at == '' ? 'N/A' : $item->created_at }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('edit_phong', ['id' => $item->id]) }}"
                                                    class="my-3 btn btn-outline-warning text-warning fw-light text-xs btn-sm"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>
                                                @can('isAdmin')
                                                <a onclick="return confirm('Are you sure ?')" href="{{ route('delete_phong', ['id' => $item->id]) }}"
                                                    class="my-3 btn btn-outline-danger text-danger text-xs btn-sm"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Delete
                                                </a>
                                                <a href="{{ route('detail_phong', ['id' => $item->id]) }}"
                                                    class="my-3 btn btn-outline-success text-success text-xs btn-sm"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    View Detail
                                                </a>
                                                @endcan
                                                
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
