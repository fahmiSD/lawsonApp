@extends('layouts.app')

@section('body')
    <h1 class="mb-3">Detail Master Status</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('master.index') }}">Master Status</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $master->name }}</li>
        </ol>
    </nav>
    <hr />

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Master Status</label>
            <input type="text" name="name" class="form-control" placeholder="Master Name" value="{{ $master->name }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" placeholder="Description" readonly>{{ $master->description }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At"
                value="{{ $master->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
                value="{{ $master->updated_at }}" readonly>
        </div>
    </div>
@endsection
