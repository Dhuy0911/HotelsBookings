@extends('modules.admin.datables')
@section('title', 'Service List ')
@section('content')
    <div class="card">
        <div class="card-header">
            <a type="button" href="{{ route('admin.service.create') }}" class="btn btn-primary mb-2" href="">Create</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($service as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td><i class="{{ $item->description }}"></i></td>
                            <td>
                                <a href="{{ route('admin.service.edit', ['id' => $item->id]) }}" class="btn btn-warning">
                                    Edit</a>
                                <a href="{{ route('admin.service.remove', ['id' => $item->id]) }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this service?')">Delete</a>
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
