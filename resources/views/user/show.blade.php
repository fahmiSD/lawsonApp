@extends('layouts.app')

@section('body')
    <h1 class="mb-3">Detail User</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $user->full_name }}</li>
        </ol>
    </nav>
    <hr />

    <div class="row mb-3">
        <div class="col">
            <input type="text" name="full_name" class="form-control" placeholder="Full Name"
                value="{{ $user->full_name }}" readonly />
        </div>
        <div class="col">
            <input type="date" name="date_of_birth" class="form-control" placeholder="Birth"
                value="{{ $user->date_of_birth }}" readonly />
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}"
                readonly />
        </div>
        <div class="col">
            <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ $user->phone }}"
                readonly />
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <textarea class="form-control" name="address" placeholder="Adress" readonly>{{ $user->full_name }}</textarea>
        </div>
        <div class="col">
            <select class="form-control" name="active" disabled>
                <option style="display:none">Status of User</option>
                <option value="Active" @if ($user->active == 'Active') selected @endif>Active</option>
                <option value="Inactive" @if ($user->active == 'Inactive') selected @endif>Inactive</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At"
                value="{{ $user->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
                value="{{ $user->updated_at }}" readonly>
        </div>
    </div>
@endsection
