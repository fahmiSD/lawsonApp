@extends('layouts.app')

@section('body')
    <h1 class="mb-3">Detail City</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('city.index') }}">City</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $city->name }}</li>
        </ol>
    </nav>
    <hr />

    <div class="row mb-3">
        <div class="col">
            <input type="text" name="name" class="form-control" placeholder="City Name" value="{{ $city->name }}"
                readonly />
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">   
            <input type="text" name="longitude" class="form-control" placeholder="Longitude"
                value="{{ $city->longitude }}" readonly />
        </div>
        <div class="col">
            <input type="text" name="latitude" class="form-control" placeholder="Latitude" value="{{ $city->latitude }}"
                readonly />
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At"
                value="{{ $city->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
                value="{{ $city->updated_at }}" readonly>
        </div>
    </div>
@endsection
