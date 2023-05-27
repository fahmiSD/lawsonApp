@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Add City</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('city.index') }}">City</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add City Data</li>
        </ol>
    </nav>
    <hr />
    <form action="{{ route('city.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="City Name" required />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="longitude" class="form-control" placeholder="Longitude" required />
            </div>
            <div class="col">
                <input type="text" name="latitude" class="form-control" placeholder="Latitude" required />
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
