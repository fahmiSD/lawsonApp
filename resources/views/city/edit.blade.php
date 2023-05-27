@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Edit Master</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('city.index') }}">Master</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $city->name }}</li>
        </ol>
    </nav>
    <hr />
    <form action="{{ route('city.update', $city->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="City Name"
                    value="{{ $city->name }}" />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="longitude" class="form-control" placeholder="Longitude"
                    value="{{ $city->longitude }}" />
            </div>
            <div class="col">
                <input type="text" name="latitude" class="form-control" placeholder="Latitude"
                    value="{{ $city->latitude }}" />
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
