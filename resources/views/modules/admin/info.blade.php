{{-- @extends('layout.admin')
@section('title', 'Admin Info')
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
                                        $image = $user->image == null || !file_exists(public_path('image/members/' . $user->image)) ? '....' : asset('image/members/' . $user->image);
                                        // nếu image không tồn tại giá tri hoac trong file public khong co ten hinh thi return ... neu ton tai thi return gia tri
                                    @endphp
                                    <img src="{{ $image }}" alt="" width="100">
                            </tr>
                            <tr>
                                <th style="width: 150px">Name</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Level</th>
                                <td>
                                    @if ($user->level == 3)
                                        Admin
                                    @else
                                        {{ $user->level == 1 ? 'User' : 'Owner' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <p class="btn {{ $user->status == 1 ? 'btn-success' : 'btn-danger' }}">
                                        {{ $user->status == 1 ? 'Active' : 'Block' }}</p>
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
@endsection --}}
