@extends('modules.admin.datables')
@section('title', 'Create Hotels')
@section('content')
    <div class="card card-primary">

        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('admin.hotels.store') }} " enctype="multipart/form-data" method="POST">
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
                    <label>Name</label>
                    <input name="name" type="text" value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input name="address" type="text" value="{{ old('address') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <select name="location_id" class="form-control" id="">
                        <option value="">Select locations</option>
                        @foreach ($locations as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <input name="content" type="text" value="{{ old('content') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Time Open</label>
                    <input name="time_open" type="time" value="{{ old('time_open') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Time Closed</label>
                    <input name="time_closed" type="time" value="{{ old('time_closed') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Hotline</label>
                    <input name="hotline" type="text" value="{{ old('hotline') }}" class="form-control">
                </div>
                <div class="form-group d-flex">
                    <label>Facilities</label>
                    @foreach ($facilities as $item)
                        <div class="mx-3">
                            <input type="checkbox" name="facilities[]" value="{{ $item->id }}" /> {{ $item->name }}
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
