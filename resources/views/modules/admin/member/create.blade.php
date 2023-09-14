@extends('layout.admin')
@section('title', 'Create Member')
@section('content')
    <div class="card card-primary">

        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('admin.member.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body">
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="email" value="{{ old('email') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password Confirmation</label>
                    <input name="password_confirmation" type="password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" type="text" value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input name="address" type="text" value="{{ old('address') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" type="text" value="{{ old('phone') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input name="image" type="file" class="form-control">
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select class="form-control" name="level">
                        <option value="1" {{ old('level') }}>User</option>
                        <option value="2" {{ old('level') }}>Owner</option>
                        <option value="3" {{ old('level') }}>Admin</option>
                    </select>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
