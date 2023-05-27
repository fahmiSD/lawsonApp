@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Edit Master Status</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('master.index') }}">Master Status</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $master->name }}</li>
        </ol>
    </nav>
    <hr />
    <form action="{{ route('master.update', $master->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Master Status</label>
                <input type="text" name="name" class="form-control" placeholder="Master Name"
                    value="{{ $master->name }}" required>
            </div>
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Description">{{ $master->description }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
