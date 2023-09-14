@extends('layout.admin')
@section('title', 'Dashboard')
@section('content')
    <!-- Small Box (Stat card) -->
    <div class="row">
        @if (Auth::user()->level == 3)
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ count($members) }}</h3>

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <a href="{{ route('admin.member.index') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>1</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>
                    <a href="{{ route('admin.member.create') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endif
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ count($hotels) }}</h3>

                    <p>Hotels List</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-hotel"></i>
                </div>
                <a href="{{ route('admin.hotels.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ count($bookings) }}</h3>

                    <p>Reservation</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-list"></i>
                </div>
                <a href="{{ route('admin.bookings.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
       
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ count($locations) }}</h3>


                    <p>Locations</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-newspaper"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <!-- Small Box (Stat card) -->

    </div>
    <!-- /.row -->

@endsection
