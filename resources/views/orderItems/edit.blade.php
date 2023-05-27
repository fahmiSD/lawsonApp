@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Edit Order Items</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('orderItems.index') }}">Order Items</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $orderItems->date }}</li>
        </ol>
    </nav>
    <hr />
    <form action="{{ route('orderItems.update', $orderItems->order_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <input type="date" name="date" class="form-control" placeholder="Date Order" required
                    value="{{ $orderItems->date }}" />
            </div>
            <div class="col">
                <select class="form-control" name="user_id" required>
                    <option value="" style="display:none;">Select User</option>
                    @foreach ($user as $us)
                        <option value="{{ $us->id }}" @if ($us->id == $orderItems->user_id) selected @endif>
                            {{ $us->full_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <select class="form-control" name="product_id" required>
                    <option value="" style="display:none;">Select Product</option>
                    @foreach ($product as $pr)
                        <option value="{{ $pr->product_id }}" @if ($pr->product_id == $orderItems->product_id) @selected(true) @endif>
                            {{ $pr->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <input type="number" class="form-control" name="quantity" placeholder="Quantity"
                    value="{{ $orderItems->quantity }}" required />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <select class="form-control" name="status_order" required>
                    <option value="" style="display:none;">Select Status Order</option>
                    @foreach ($status as $st)
                        <option value="{{ $st->id }}"@if ($st->id == $orderStatus->status_id) @selected(true) @endif>
                            {{ $st->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
