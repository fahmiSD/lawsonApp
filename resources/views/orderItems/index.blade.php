@extends('layouts.app')

@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Order Items</h1>
        <a href="{{ route('orderItems.create') }}" class="btn btn-primary">Add Order Items</a>
    </div>

    <hr />

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (Session::has('info'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ Session::get('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (Session::has('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ Session::get('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>User Name</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($orderItems->count() > 0)
                @foreach ($orderItems as $oi)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $oi->date }}</td>
                        <td class="align-middle">{{ $oi->user_name }}</td>
                        <td class="align-middle">{{ $oi->product_name }}</td>
                        <td class="align-middle">{{ $oi->quantity }}</td>
                        <td class="align-middle">{{ $oi->status_name }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('orderItems.show', $oi->order_id) }}" type="button"
                                    class="btn btn-secondary">Detail</a>
                                <a href="{{ route('orderItems.edit', $oi->order_id) }}" type="button"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ route('orderItems.destroy', $oi->order_id) }}" method="POST"
                                    type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="7">Order not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
