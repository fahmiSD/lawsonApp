@extends('layouts.app')

@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List User</h1>
        <a href="{{ route('user.create') }}" class="btn btn-primary">Add User Data</a>
    </div>

    <hr />

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (Session::has('info'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ Session::get('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (Session::has('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ Session::get('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Birth</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($user->count() > 0)
                @foreach ($user as $us)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $us->full_name }}</td>
                        <td class="align-middle">{{ $us->date_of_birth }}</td>
                        <td class="align-middle">{{ $us->email }}</td>
                        <td class="align-middle">{{ $us->phone }}</td>
                        <td class="align-middle">{{ $us->address }}</td>
                        <td class="align-middle">{{ $us->active }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('user.show', $us->id) }}" type="button"
                                    class="btn btn-secondary">Detail</a>
                                <a href="{{ route('user.edit', $us->id) }}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('user.destroy', $us->id) }}" method="POST" type="button"
                                    class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="8">User not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
