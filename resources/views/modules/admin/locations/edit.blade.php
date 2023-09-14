@extends('modules.admin.datables')
@section('title', 'Locations Edit ')
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
        <form role="form" action="{{ route('admin.location.update', ['id' => $locations->id]) }}"
            enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" type="text" value="{{ old('name', $locations->name) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Current Image</label>
                    @if ($locations->image == null)
                        <p>No image</p>
                    @endif
                    <img src="{{ asset('image/locations/' . $locations->image) }}" width="200" alt="">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input name="image" value="{{ old('image', $locations->image) }}" type="file" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    @endsection
