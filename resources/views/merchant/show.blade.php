@extends('layouts.app')

@section('body')
    <h1 class="mb-3">Detail Merchant</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('merchant.index') }}">Merchant</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $merchant->merchant_name }}</li>
        </ol>
    </nav>
    <hr />

    <div class="row mb-3">
        <div class="col">
            <input type="text" name="merchant_name" class="form-control" placeholder="Merchant Name"
                value="{{ $merchant->merchant_name }}" readonly />
        </div>
        <div class="col">
            <select class="form-control" name="city_id" readonly>
                <option value="" style="display:none;">Select City</option>
                @foreach ($cities as $ct)
                    <option value="{{ $ct->id }}" @if ($merchant->city_id == $ct->id) selected @endif
                        @disabled(true)>
                        {{ $ct->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $merchant->phone }}"
                readonly />
        </div>
        <div class="col">
            <input type="date" class="form-control" name="expired_date" placeholder="Expired Date"
                value="{{ $merchant->expired_date }}" readonly />
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <textarea class="form-control" name="address" placeholder="Adress" readonly>{{ $merchant->address }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At"
                value="{{ $merchant->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
                value="{{ $merchant->updated_at }}" readonly>
        </div>
    </div>
@endsection
