@extends('templates.admin.layout')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>{{ $title }}</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            payment method</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Total</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hoaDon as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ Storage::url($item->image) }}"
                                                            class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Bill {{ $item->id }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $item->time }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 ">
                                                    {{ $item->pttt == 1 ? 'Direct payment' : 'online payment' }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm  {{ $item->status == 4 ? 'bg-gradient-success' : ($item->status == 3 ? 'bg-gradient-warning' : ($item->status == 2 ? 'bg-gradient-dark' : 'bg-gradient-secondary')) }}">
                                                    {{ $item->status == 4 ? 'Done' : ($item->status == 3 ? 'Processing' : ($item->status == 2 ? 'not paid' : 'cancel')) }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->total }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href=""
                                                    class="my-3 btn btn-outline-warning text-warning fw-light  btn-sm"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>
                                                <a href=""
                                                    class="my-3 btn btn-outline-success text-success fw-light  btn-sm"
                                                    data-toggle="tooltip" data-original-title="View user">
                                                    View Detail
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