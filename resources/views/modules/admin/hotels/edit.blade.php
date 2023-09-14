@extends('modules.admin.datables')
@section('title', 'Edit Hotels')
@section('content')
    <form role="form" id="edit-form" action="{{ route('admin.hotels.update', ['id' => $hotels->id]) }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" value="{{ old('name', $hotels->name) }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input name="address" type="text" value="{{ old('address', $hotels->address) }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Location</label>
                <select name="location_id" id="" class="form-control">
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}"
                            {{ $location->id == old('location_id', $hotels->location_id) ? 'selected' : '' }}>
                            {{ $location->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Content</label>
                <input name="content" type="text" value="{{ old('content', $hotels->content) }}" class="form-control">

            </div>
            <div class="form-group">
                <label>Time Open</label>
                <input name="time_open" type="time" value="{{ old('time_open', $hotels->time_open) }}"
                    class="form-control">
            </div>
            <div class="form-group">
                <label>Time Closed</label>
                <input name="time_closed" type="time" value="{{ old('time_closed', $hotels->time_closed) }}"
                    class="form-control">
            </div>
            <div class="form-group">
                <label>Hotline</label>
                <input name="hotline" type="text" value="{{ old('hotline', $hotels->hotline) }}" class="form-control">
            </div>
            <div class="form-group d-flex">
                <label>Facilities</label>
                @foreach ($facilities as $item)
                    <div class="mx-3">
                        <input type="checkbox" name="facilities[]" value="{{ $item->id }} "
                            @if (in_array($item->id, $hotels_facilities)) checked @endif />
                        {{ $item->name }}
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label>Create By User</label>
                <select readonly class="form-control" name="user_id" id="">
                    <option value="{{ old('user_id', $hotels->user_id) }}">{{ $hotels->user_name }}</option>
                </select>
            </div>
            @if (Auth::user()->level == 3)
                <div class="form-group">
                    <label for="exampleInputFile">Status</label>
                    <select class="form-control custom-select" name="status">
                        <option value="1" {{ old('status', $hotels->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ old('status', $hotels->status) == 2 ? 'selected' : '' }}>Block</option>
                    </select>
                </div>
            @else
                <input type="hidden" name="status" value="{{ old('status', $hotels->status) }}">
            @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
