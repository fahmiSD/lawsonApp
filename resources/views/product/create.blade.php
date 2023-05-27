@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Add Product</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Product Data</li>
        </ol>
    </nav>
    <hr />
    <form action="{{ route('product.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Product Name" required />
            </div>
            <div class="col">
                <select class="form-control" name="merchant_id"required>
                    <option value="" style="display:none;">Select Merchant</option>
                    @foreach ($merchant as $mr)
                        <option value="{{ $mr->id }}">{{ $mr->merchant_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="price" min="0" step="1" oninput="formatPrice(this)"
                        class="form-control" placeholder="Price" required />
                    <span class="input-group-text">.00</span>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
