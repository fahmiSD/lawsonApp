@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Edit User</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $user->user_name }}</li>
        </ol>
    </nav>
    <hr />
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="full_name" class="form-control" placeholder="Full Name"
                    value="{{ $user->full_name }}" required />
            </div>
            <div class="col">
                <input type="date" name="date_of_birth" class="form-control" placeholder="Birth"
                    value="{{ $user->date_of_birth }}" required />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}"
                    required />
            </div>
            <div class="col">
                <input type="text" class="form-control" name="phone" placeholder="Phone"value="{{ $user->phone }}"
                    required />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <textarea class="form-control" name="address" placeholder="Adress" required>{{ $user->address }}</textarea>
            </div>
            <div class="col">
                <select class="form-control" name="active" required>
                    <option style="display:none">Status of User</option>
                    <option value="Active" @if ($user->active == 'Active') selected @endif>Active</option>
                    <option value="Inactive" @if ($user->active == 'Inactive') selected @endif>Inactive</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
