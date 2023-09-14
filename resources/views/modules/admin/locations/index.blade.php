@extends('modules.admin.datables')
@section('title', 'Location List ')
@section('content')
    <div class="card">
        <div class="card-header">
            <a type="button" href="{{ route('admin.location.create') }}" class="btn btn-primary mb-2">Create</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td><img src="{{ asset('image/locations/' . $item->image) }}" width="150" alt=""></td>
                            </td>
                            <td>
                                <a href="{{ route('admin.location.edit', ['id' => $item->id]) }}" class="btn btn-warning">
                                    Edit</a>
                                <a href="{{ route('admin.location.remove', ['id' => $item->id]) }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this locations?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
@endsection
