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
                            <a href="{{ route('post') }}"
                                class="btn btn-outline-secondary text-secondary  fw-bolder  btn-sm rounded-pill "
                                data-toggle="tooltip" data-original-title="add user">
                                List
                            </a>
                            <a href="{{ route('insert_post') }}"
                                class="btn btn-outline-success text-success  fw-bolder  btn-sm rounded-pill "
                                data-toggle="tooltip" data-original-title="add user">
                                NEW Post
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
                                            class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                            Image</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Descrition
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Create at</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ $item->image == '' ? '../assets/img/team-2.jpg' : Storage::url($item->image) }}"
                                                            class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->title }}</h6>
                                                        <p class="text-xs text-secondary mb-0">Post {{ $item->id }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle  text-sm text-center">
                                                <img src="{{ $item->image == '' ? '../assets/img/team-2.jpg' : Storage::url($item->image) }}"
                                                    style="width: 150px ; height: 100px; " alt="user1">
                                            </td>
                                            <td class="align-middle  text-sm">
                                                <p class="text-xs text-secondary mb-0">{{ $item->content }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->created_at == '' ? '20/07/2023' : $item->created_at }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('restore_delete_post', ['id' => $item->id]) }}"
                                                    class="my-3 btn btn-outline-warning text-warning fw-light text-xs btn-sm"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Restore
                                                </a>
                                                <a onclick="return confirm('Are you sure ?')"
                                                    href="{{ route('force_delete_post', ['id' => $item->id]) }}"
                                                    class="my-3 btn btn-outline-danger text-danger text-xs btn-sm"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Delete
                                                </a>
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
