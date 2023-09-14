@extends('modules.admin.datables')
@section('title', 'Create Rooms ')
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
        <form role="form" action="{{ route('admin.hotels.rooms.store', ['idhotel' => $hotels->id]) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" type="text" value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input name="description" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Views</label>
                    <input name="views" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Acreage</label>
                    <input name="acreage" type="text" value="{{ old('acreage') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Bed</label>
                    <input name="bed" type="number" value="{{ old('bed') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Persons</label>
                    <input name="persons" type="text" value="{{ old('persons') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input name="price" type="number" class="form-control">
                </div>
                <div class="form-group">
                    <label>Room Service</label>
                    @foreach ($services as $service)
                        <div>
                            <input type="checkbox" name="service[]" value="{{ $service->id }}" /> {{ $service->name }}
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
