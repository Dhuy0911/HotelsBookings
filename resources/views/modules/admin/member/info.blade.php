@extends('layout.admin')
@section('title', 'Member Infomation')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Avatar</th>
                                <td>
                                    @php
                                        $image = $members->image == null || !file_exists(public_path('image/members/' . $members->image)) ? '....' : asset('image/members/' . $members->image);
                                        // nếu image không tồn tại giá tri hoac trong file public khong co ten hinh thi return ... neu ton tai thi return gia tri
                                    @endphp
                                    <img src="{{ $image }}" alt="" width="100">
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Name</th>
                                <td>{{ $members->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $members->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $members->phone }}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Address</th>
                                <td>{{ $members->address }}</td>
                            </tr>
                            <tr>
                                <th>Level</th>
                                <td>
                                    @if ($members->level == 3)
                                        Admin
                                    @else
                                        {{ $members->level == 1 ? 'User' : 'Owner' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <p class="btn {{ $members->status == 1 ? 'btn-success' : 'btn-danger' }}">
                                        {{ $members->status == 1 ? 'Active' : 'Block' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>Action</th>
                                <td>
                                    <a href="{{ route('admin.member.edit', ['id' => $members->user_id]) }}"
                                        class="btn btn-warning">Edit</a>
                                </td>
                            </tr>


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

@endsection
