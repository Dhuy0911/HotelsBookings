@extends('modules.admin.datables')
@section('title', 'History Request')
@section('item-7', 'menu-open')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ID Card front</th>
                                        <th>ID Card back</th>
                                        <th>Business license</th>
                                        <th>Hotels</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($owner as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td><a href="{{ asset('image/reg-owner/' . $item->image_idcard_front) }}">
                                                    <img style="width: 150px"
                                                        src="{{ asset('image/reg-owner/' . $item->image_idcard_front) }}"
                                                        alt="">
                                                </a> </td>
                                            <td><a href="{{ asset('image/reg-owner/' . $item->image_idcard_back) }}">
                                                    <img style="width: 150px"
                                                        src="{{ asset('image/reg-owner/' . $item->image_idcard_back) }}"
                                                        alt="">
                                                </a> </td>
                                            <td><a href="{{ asset('image/reg-owner/' . $item->image_business_license) }}">
                                                    <img style="width: 150px"
                                                        src="{{ asset('image/reg-owner/' . $item->image_business_license) }}"
                                                        alt="">
                                                </a></td>
                                            <td><a href="{{ asset('image/reg-owner/' . $item->image_hotels) }}">
                                                    <img style="width: 150px"
                                                        src="{{ asset('image/reg-owner/' . $item->image_hotels) }}"
                                                        alt="">
                                                </a>
                                            </td>
                                            <td>{{ $item->user_email }}</td>
                                            <td class="btn {{ $item->status == 1 ? 'text-success' : 'text-danger' }}">
                                                {{ $item->status == 1 ? 'Approved' : 'Rejected' }}
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
