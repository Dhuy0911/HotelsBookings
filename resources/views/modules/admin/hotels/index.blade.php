@extends('modules.admin.datables')
@section('title', 'Hotels List')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    @section('breadcrumb-title')
                        <li class="breadcrumb-item"><a href="{{ route('admin.hotels.index') }}">Hotels</a></li>
                    @endsection
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-header d-flex">
                        <a type="button" href="{{ route('admin.hotels.create') }}"
                            class="btn btn-primary mb-2">Create</a>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex align-items-stretch">
                            <div id="result"></div>
                            @if (Auth::user()->level == 3)
                                @foreach ($hotels as $hotel)
                                    <div class="col-12 col-sm-6 col-md-4 align-items-stretch">
                                        <div class="card bg-light">
                                            <div class="card-header text-muted border-bottom-0">
                                                {{ $hotel->location_name }}
                                            </div>
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="lead"><b>{{ $hotel->name }}</b></h2>
                                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                                        <li class="small">
                                                            <span class="fa-li"><i
                                                                    class="fas fa-lg fa-building"></i></span>
                                                            Address: {{ $hotel->address }}
                                                        </li>
                                                        <li class="small">
                                                            <span class="fa-li"><i
                                                                    class="fas fa-lg fa-phone"></i></span>
                                                            Phone: {{ $hotel->hotline }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-5 text-center">
                                                    <img src="{{ asset('image/hotels/' . $hotel->main_image) }}"
                                                        width="100px" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <a href="{{ route('admin.hotels.info', ['id' => $hotel->id]) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-user"></i> View Hotels
                                                </a>
                                                <a href="#"
                                                    class="btn btn-sm {{ $hotel->status == 1 ? 'bg-teal' : 'bg-danger' }}">
                                                    {{ $hotel->status == 1 ? 'Active' : 'Block' }}
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    {{-- @else
                        @foreach ($hotels_owner as $hotel)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                <div class="card bg-light">
                                    <div class="card-header text-muted border-bottom-0">
                                        {{ $hotel->location_name }}
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>{{ $hotel->name }}</b></h2>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small">
                                                        <span class="fa-li"><i
                                                                class="fas fa-lg fa-building"></i></span>
                                                        Address: {{ $hotel->address }}
                                                    </li>
                                                    <li class="small">
                                                        <span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                                        Phone: {{ $hotel->hotline }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="{{ asset('image/hotels/' . $hotel->image) }}" width="100px"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a href="{{ route('admin.hotels.info', ['id' => $hotel->id]) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-user"></i> View Hotels
                                            </a>
                                            <a href="#"
                                                class="btn btn-sm {{ $hotel->status == 1 ? 'bg-teal' : 'bg-danger' }}">
                                                {{ $hotel->status == 1 ? 'Active' : 'Block' }}
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
             

                    {{-- <div class="card-footer">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    </ul>
                                </div> --}}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
