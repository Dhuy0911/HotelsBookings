@extends('layout.admin')
@section('title', 'Edit Member')
@section('content')
    <div class="card card-primary">

        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('admin.member.update', ['id' => $members->user_id]) }}"
            enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" value="{{ old('email', $members->email) }}" disabled class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input name="name" type="text" value="{{ old('name', $members->name) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Address</label>
                    <input name="address" type="text" value="{{ old('address', $members->address) }}"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Phone</label>
                    <input name="phone" type="text" value="{{ old('phone', $members->phone) }}" class="form-control">
                </div>
                @if (Auth::user()->level == 3)
                    <div class="form-group">
                        <label for="exampleInputFile">Level</label>
                        <select class="form-control" name="level">
                            <option value="1" {{ old('level', $members->level) == 1 ? 'selected' : '' }}>User</option>
                            <option value="2" {{ old('level', $members->level) == 2 ? 'selected' : '' }}>Owner</option>
                            <option value="3" {{ old('level', $members->level) == 3 ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Status</label>
                        <select class="form-control custom-select" name="status">
                            <option value="1" {{ old('status', $members->status) == 1 ? 'selected' : '' }}>Active
                            </option>
                            <option value="2" {{ old('status', $members->status) == 2 ? 'selected' : '' }}>Block
                            </option>
                        </select>
                    </div>
                @else
                    <input type="hidden" name="level" value="{{ old('level', $members->level) }}">
                    <input type="hidden" name="status" value="{{ old('status', $members->status) }}">
                @endif
                <div class="form-group">
                    <label>Current Image</label>
                    @if ($members->image == null)
                        <p>No image</p>
                    @endif
                    <img src="{{ asset('image/members/' . $members->image) }}" width="200" alt="">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input name="image" type="file" class="form-control">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
