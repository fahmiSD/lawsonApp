@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Edit Merchant</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('merchant.index') }}">Merchant</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $merchant->merchant_name }}</li>
        </ol>
    </nav>
    <hr />
    <form action="{{ route('merchant.update', $merchant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="merchant_name" class="form-control" placeholder="Merchant Name"
                    value="{{ $merchant->merchant_name }}" required />
            </div>
            <div class="col">
                <select class="form-control" name="city_id" required>
                    <option value="" style="display:none;">Select City</option>
                    @foreach ($cities as $ct)
                        <option value="{{ $ct->id }}" @if ($merchant->city_id == $ct->id) selected @endif>
                            {{ $ct->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $merchant->phone }}"
                    required />
            </div>
            <div class="col">
                <input type="date" class="form-control" name="expired_date" placeholder="Expired Date"
                    value="{{ $merchant->expired_date }}" required />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <textarea class="form-control" name="address" placeholder="Adress" required>{{ $merchant->address }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
