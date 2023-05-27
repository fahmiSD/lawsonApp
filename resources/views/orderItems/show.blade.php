@extends('layouts.app')

@section('body')
    <h1 class="mb-3">Detail Order Items</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('orderItems.index') }}">Order Items</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $orderItems->date }}</li>
        </ol>
    </nav>
    <hr />

    <div class="row mb-3">
        <div class="col">
            <input type="date" name="date" class="form-control" placeholder="Date Order"
                value="{{ $orderItems->date }}" required readonly />
        </div>
        <div class="col">
            <select class="form-control" name="user_id" required @readonly(true)>
                <option value="" style="display:none;">Select User</option>
                @foreach ($user as $us)
                    <option value="{{ $us->id }}" @if ($us->id == $orderItems->user_id) @selected(true) @endif
                        @disabled(true)>
                        {{ $us->full_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <select class="form-control" name="product_id" required @readonly(true)>
                <option value="" style="display:none;">Select Product</option>
                @foreach ($product as $pr)
                    <option value="{{ $pr->product_id }}" @if ($pr->product_id == $orderItems->product_id) @selected(true) @endif
                        @disabled(true)>
                        {{ $pr->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <input type="number" class="form-control" name="quantity" placeholder="Quantity"
                value="{{ $orderItems->quantity }}" required readonly />
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <select class="form-control" name="status_order" required readonly>
                <option value="" style="display:none;">Select Status Order</option>
                @foreach ($status as $st)
                    <option value="{{ $st->id }}" @if ($st->id == $orderStatus->status_id) @selected(true) @endif
                        @disabled(true)>
                        {{ $st->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At"
                value="{{ $orderItems->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
                value="{{ $orderItems->updated_at }}" readonly>
        </div>
    </div>
@endsection
