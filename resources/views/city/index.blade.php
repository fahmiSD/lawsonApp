@extends('layouts.app')

@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List City</h1>
        <a href="{{ route('city.create') }}" class="btn btn-primary">Add City Data</a>
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
                <th>Name</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($city->count() > 0)
                @foreach ($city as $ct)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $ct->name }}</td>
                        <td class="align-middle">{{ $ct->longitude }}</td>
                        <td class="align-middle">{{ $ct->latitude }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('city.show', $ct->id) }}" type="button"
                                    class="btn btn-secondary">Detail</a>
                                <a href="{{ route('city.edit', $ct->id) }}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('city.destroy', $ct->id) }}" method="POST" type="button"
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
                    <td class="text-center" colspan="7">City not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
