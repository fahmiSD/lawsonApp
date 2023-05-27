@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Add User</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add User Data</li>
        </ol>
    </nav>
    <hr />
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="full_name" class="form-control" placeholder="Full Name" required />
            </div>
            <div class="col">
                <input type="date" name="date_of_birth" class="form-control" placeholder="Birth" required />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="email" name="email" class="form-control" placeholder="Email" required />
            </div>
            <div class="col">
                <input type="text" class="form-control" name="phone" placeholder="Phone" required />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <textarea class="form-control" name="address" placeholder="Adress" required></textarea>
            </div>
            <div class="col">
                <select class="form-control" name="active" required>
                    <option style="display:none">Status of User</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
