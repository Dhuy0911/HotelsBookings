@extends('layout.admin')
@section('content')
    <div class="card card-primary">

        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('admin.member.update', ['members' => $members->user_id]) }}" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="email" value="{{ $member->name }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" value="{{ $member->email }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Phone</label>
                    <input type="text" value="{{ $member->phone }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Level</label>
                    <input type="text" value="{{ $member->level == 1 ? 'member' : 'Owner' }}" class="form-control"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Status</label>
                    <input type="text" value="{{ $member->status == 1 ? 'Active' : 'Block' }}" class="form-control"
                        disabled>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
