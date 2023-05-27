@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Add Master Status</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('master.index') }}">Master Status</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Master Status Data</li>
        </ol>
    </nav>
    <hr />
    <form action="{{ route('master.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Master Name" required>
            </div>
            <div class="col">
                <textarea class="form-control" name="description" placeholder="Description" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
