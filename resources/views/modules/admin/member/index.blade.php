@extends('modules.admin.datables')
@section('title', 'Member List')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    @section('breadcrumb-title')
                        <li class="breadcrumb-item"><a href="{{ route('admin.member.index') }}">Members</a></li>
                    @endsection
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a type="button" href="{{ route('admin.member.create') }}"
                            class="btn btn-primary mb-2">Create</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $member->email }}</td>
                                        @php
                                            $image = $user->image == null || !file_exists(public_path('image/members/' . $user->image)) ? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png' : asset('image/members/' . $user->image);
                                            // nếu image không tồn tại giá tri hoac trong file public khong co ten hinh thi return ... neu ton tai thi return gia tri
                                        @endphp
                                        <td><img src="{{ $image }}" width="100" alt=""></td>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->address }}</td>
                                        <td>{{ $member->phone }}</td>
                                        <td>
                                            @if ($member->level == 3)
                                                Admin
                                            @else
                                                {{ $member->level == 1 ? 'User' : 'Owner' }}
                                            @endif
                                        </td>
                                        <td>
                                            <p class="btn {{ $member->status == 1 ? 'btn-success' : 'btn-danger' }}">
                                                {{ $member->status == 1 ? 'Active' : 'Block' }}</p>
                                        </td>
                                        <td class="d-flex">
                                            <a type="button"
                                                href="{{ route('admin.member.info', ['id' => $member->user_id]) }}"
                                                class="btn mx-2"><i class="fa-solid fa-eye"></i></a>
                                            <a type="button"
                                                href="{{ route('admin.member.edit', ['id' => $member->user_id]) }}"
                                                class="btn "><i class="fa-solid fa-pen-to-square"></i></a>
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
