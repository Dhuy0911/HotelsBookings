@extends('modules.admin.datables')
@section('title', 'Edit Rooms')
@section('content')
    <form role="form" action="{{ route('admin.hotels.rooms.update', ['idhotel' => $rooms->id]) }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" value="{{ old('name', $rooms->name) }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input name="description" type="text" value="{{ old('description', $rooms->description) }}"
                    class="form-control">
            </div>
            <div class="form-group">
                <label>Views</label>
                <input name="views" type="text" value="{{ old('views', $rooms->views) }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Acreage</label>
                <input name="acreage" type="text" value="{{ old('acreage', $rooms->acreage) }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Bed</label>
                <input name="bed" type="text" value="{{ old('bed', $rooms->bed) }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Persons</label>
                <input name="persons" type="number" value="{{ old('persons', $rooms->persons) }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Location</label>
                <input name="location" type="text" value="{{ old('location', $rooms->location) }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input name="price" type="text" value="{{ old('price', $rooms->price) }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Status</label>
                <select class="form-control custom-select" name="status">
                    <option value="1" {{ old('status', $rooms->status) == 1 ? 'selected' : '' }}>Available</option>
                    <option value="2" {{ old('status', $rooms->status) == 2 ? 'selected' : '' }}>Not Available
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label>Room Service</label>
                @foreach ($services as $service)
                    <div>
                        <input type="checkbox" name="service[]" value="{{ $service->id }}"
                            @if (in_array($service->id, $room_services)) checked @endif>
                        {{ $service->name }}
                    </div>
                @endforeach
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
