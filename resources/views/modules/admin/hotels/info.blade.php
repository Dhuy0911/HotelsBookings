@extends('modules.admin.datables')
@section('title', 'Hotels Infomation')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    {{-- <img src="{{ asset('/image/hotels' . $hotels->thumbnail) }}" class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        {{-- <div class="slider">
                            <div><img
                                    src="https://cdn11.bigcommerce.com/s-1812kprzl2/images/stencil/original/products/426/5082/no-image__12882.1665668288.jpg?c=2"
                                    alt="" width="200"></div>
                            <div><img
                                    src="https://img.freepik.com/free-vector/man-saying-no-concept-illustration_114360-14192.jpg"
                                    alt="" width="200"></div>
                            <div><img
                                    src="https://www.shutterstock.com/image-photo/businessman-holding-paper-say-no-260nw-105617738.jpg"
                                    alt="" width="200"></div>
                        </div> --}}
                        <p class="card-text">{{ $hotels->location_name }}</p>
                        <h2 class="card-title">{{ $hotels->name }}</h2>
                        <p class="card-text">{{ $hotels->address }}</p>
                        <p class="card-text">{{ $hotels->hotline }}</p>
                        <a type="button" href="{{ route('admin.hotels.edit', ['id' => $hotels->id]) }}" class="btn"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a type="button" class="btn btn-danger"
                            href="{{ route('admin.hotels.remove', ['id' => $hotels->id]) }}"
                            onclick="return confirm('Are you sure you want to delete this hotel?')">Delete Hotels</a>

                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Image</h3>
                    </div>
                    <div class="card-body">
                        @if (file_exists(public_path('image/hotels' . $hotels->image)))
                            <div class="slider">

                                <div class="fade">
                                    <div><img
                                            src="https://cdn11.bigcommerce.com/s-1812kprzl2/images/stencil/original/products/426/5082/no-image__12882.1665668288.jpg?c=2"
                                            alt="" width="200"></div>
                                    <div>your content</div>
                                    <div>your content</div>
                                </div>
                            </div>
                        @else
                            <div class="fade">
                                <div><img
                                        src="https://cdn11.bigcommerce.com/s-1812kprzl2/images/stencil/original/products/426/5082/no-image__12882.1665668288.jpg?c=2"
                                        alt=""></div>
                            </div>
                        @endif
                    </div>
                </div>
            </div> --}}
            <div class="col-md-6">
                <div class="col-sm-6">
                    <h3>Facilities</h3>
                </div>
                <div class="card">
                    <div class="card-body">
                        <ul>
                            @foreach ($hotels_facilities as $item)
                                <li>
                                    {{ $item->name }} <i class="{{ $item->description }}"></i>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rooms</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    @section('breadcrumb-title')
                        <li class="breadcrumb-item"><a href="{{ route('admin.hotels.index') }}">Hotels</a></li>
                        <li class="breadcrumb-item active">{{ $hotels->name }}</li>
                    @endsection

                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <a type="button" href="{{ route('admin.hotels.rooms.create', ['idhotel' => $hotels->id]) }}"
                class="btn btn-primary mb-2">Create</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Rooms name</th>
                                <th>Price</th>
                                <th>Service</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $item)
                                <tr>

                                    <td>{{ $item->name }}</td>
                                    <td>{{ number_format($item->price, 0, ' ', '.') }} VND</td>
                                    <td>{{ $room_services[$item->id] }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <p class="badge badge-success">Available</p>
                                        @else
                                            <p class="badge badge-danger">Not Available</p>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{ route('admin.hotels.rooms.edit', ['idhotel' => $item->id]) }}"
                                            class="btn"> <i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{ route('admin.hotels.rooms.remove', ['idhotel' => $item->id]) }}"
                                            class="btn"
                                            onclick="return confirm('Are you sure you want to delete this rooms?')"><i
                                                class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
</section>



@endsection
