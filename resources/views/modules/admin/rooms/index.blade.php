@extends('modules.admin.datables')
@section('title', 'Rooms List ')
@section('content')
    <div class="card">
        <div class="card-header">
            <a type="button" href="{{ route('admin.member.create') }}" class="btn btn-primary mb-2" href="">Create</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type Name</th>
                        <th>Bed Type</th>
                        <th>Price</th>
                        <th>Hotels</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $room->price }}</td>
                            <td>{{ $room->hotelsName }}</td>
                            <td>
                                @if ($room->status == 1)
                                    <p class="badge badge-success">Available</p>
                                @else
                                    <p class="badge badge-danger">Not Available</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.hotels.rooms.edit', ['id' => $room->id]) }}" class="btn btn-warning">
                                    Edit</a>
                                <a href="{{ route('admin.hotels.rooms.remove', ['id' => $room->id]) }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this rooms?')">Delete</a>
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
