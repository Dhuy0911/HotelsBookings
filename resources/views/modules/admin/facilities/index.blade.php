@extends('modules.admin.datables')
@section('title', 'Facilities List ')
@section('content')
    <div class="card">
        <div class="card-header">
            <a type="button" href="{{ route('admin.facilities.create') }}" class="btn btn-primary mb-2">Create</a>
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
                    @foreach ($facilities as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td><i class="{{ $item->description }}"></i></td>
                            <td>
                                <a href="{{ route('admin.facilities.edit', ['id' => $item->id]) }}" class="btn btn-warning">
                                    Edit</a>
                                <a href="{{ route('admin.facilities.remove', ['id' => $item->id]) }}" class="btn btn-danger"
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
