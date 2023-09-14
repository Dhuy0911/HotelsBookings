@extends('modules.admin.datables')
@section('title', 'News Edit')
@section('content')
    <div class="card card-primary">

        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('admin.news.update', ['id' => $news->id]) }} " method="POST">
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
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $news->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5">{{ old('content', $news->content) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="status">Create By</label>
                    <select class="form-control" name="user_id" id="">
                        <option value="{{ $news->uid }}">{{ $news->email }}</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="1" {{ old('status', $news->status) == '1' ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ old('status', $news->status) == '2' ? 'selected' : '' }}>Block</option>
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
