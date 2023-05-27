@extends('layouts.app')

@section('body')
    <h1 class="mb-3">Detail Product</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>
    <hr />

    <div class="row mb-3">
        <div class="col">
            <input type="text" name="name" class="form-control" placeholder="Product Name"
                value="{{ $product->name }}" required readonly />
        </div>
        <div class="col">
            <select class="form-control" name="merchant_id" required readonly>
                <option value="" style="display:none;">Select Merchant</option>
                @foreach ($merchant as $mr)
                    <option value="{{ $mr->id }}" @if ($product->merchant_id == $mr->id) selected @endif
                        @disabled(true)>
                        {{ $mr->merchant_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="input-group mb-3">
                <span class="input-group-text">Rp</span>
                <input type="text" name="price" min="0" step="1" oninput="formatPrice(this)"
                    value="{{ number_format($product->price, '0') }}" class="form-control" placeholder="Price" readonly />
                <span class="input-group-text">.00</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At"
                value="{{ $product->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
                value="{{ $product->updated_at }}" readonly>
        </div>
    </div>
@endsection
