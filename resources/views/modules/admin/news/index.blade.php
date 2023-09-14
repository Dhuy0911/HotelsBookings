@extends('modules.admin.datables')
@section('title', 'News List')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <a type="button" href="{{ route('admin.news.create') }}" class="btn btn-primary mb-2"
                                href="">Create</a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Content</th>
                                        <th>Image</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->content }}</td>
                                            <td>{{ $item->image }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <p class="btn {{ $item->status == 1 ? 'btn-success' : 'btn-danger' }}">
                                                    {{ $item->status == 1 ? 'Active' : 'Block' }}</p>
                                            </td>
                                            <td class="d-flex">
                                                <a type="button" href="{{ route('admin.news.edit', ['id' => $item->id]) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <a type="button"
                                                    href="{{ route('admin.news.remove', ['id' => $item->id]) }}"
                                                    onclick="return confirm('Are you sure you want to delete this news?')"
                                                    class="btn btn-danger mx-2">Delete</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
