@extends('modules.admin.datables')
@section('title', 'Facilities Create ')
@section('content')
    <div class="card card-primary">

        <!-- /.card-header -->
        <!-- form start -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form role="form" action="{{ route('admin.facilities.update', ['id' => $facilities->id]) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" type="text" value="{{ old('name', $facilities->name) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input name="description" value="{{ old('desciption', $facilities->description) }}" type="text"
                        class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    @endsection
