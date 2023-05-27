@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Edit Product</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>
    <hr />
    <form action="{{ route('product.update', $product->product_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Product Name"
                    value="{{ $product->name }}" required />
            </div>
            <div class="col">
                <select class="form-control" name="merchant_id" required>
                    <option value="" style="display:none;">Select Merchant</option>
                    @foreach ($merchant as $mr)
                        <option value="{{ $mr->id }}" @if ($product->merchant_id == $mr->id) selected @endif>
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
                        value="{{ number_format($product->price, '0') }}" class="form-control" placeholder="Price"
                        required />
                    <span class="input-group-text">.00</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
