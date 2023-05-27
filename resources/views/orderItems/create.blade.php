@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Add Order Items</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('orderItems.index') }}">Order Items</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Order Items Data</li>
        </ol>
    </nav>
    <hr />
    <form action="{{ route('orderItems.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="date" name="date" class="form-control" placeholder="Date Order" required />
            </div>
            <div class="col">
                <select class="form-control" name="user_id" required>
                    <option value="" style="display:none;">Select User</option>
                    @foreach ($user as $us)
                        <option value="{{ $us->id }}">{{ $us->full_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <select class="form-control" name="product_id" required>
                    <option value="" style="display:none;">Select Product</option>
                    @foreach ($product as $pr)
                        <option value="{{ $pr->product_id }}">{{ $pr->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <input type="number" class="form-control" name="quantity" placeholder="Quantity" required />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <select class="form-control" name="status_order" required>
                    <option value="" style="display:none;">Select Status Order</option>
                    @foreach ($status as $st)
                        <option value="{{ $st->id }}">{{ $st->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
