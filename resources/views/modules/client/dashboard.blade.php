@extends('layout.master')
@section('title', 'Profile')
@section('content')
    <section class="flat-header color-bg adm-header">
        <div class="wave-bg wave-bg2"></div>
        <div class="container">
            <div class="dasboard-wrap fl-wrap">
                <div class="dasboard-breadcrumbs breadcrumbs"><a href="#">Home</a><a
                        href="#">Dashboard</a><span>Profile page</span></div>
                <!--dasboard-sidebar-->
                <div class="dasboard-sidebar">
                    <div class="dasboard-sidebar-content fl-wrap">
                        <div class="dasboard-avatar">
                            @php
                                $image = $user->image == null || !file_exists(public_path('image/members/' . $user->image)) ? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png' : asset('image/members/' . $user->image);
                                // nếu image không tồn tại giá tri hoac trong file public khong co ten hinh thi return ... neu ton tai thi return gia tri
                            @endphp
                            <img src="{{ $image }}" alt="">
                        </div>
                        <div class="dasboard-sidebar-item fl-wrap">
                            <h3>
                                <span>Welcome </span>
                                {{ $user->name }}
                            </h3>
                        </div>

                        <a href="{{ route('hotels.index') }}" class="be-owner-btn ed-btn">
                            @if (Auth::user()->level == 1)
                                List your place
                            @else
                                My place
                            @endif
                        </a>

                        <a href="{{ route('dashboard.profile.index') }}" class="ed-btn">My Profile</a>
                        <a href="{{ route('auth.logout') }}" class="log-out-btn color-bg">Log Out <i
                                class="far fa-sign-out"></i></a>
                    </div>
                    <script></script>
                </div>
                <!--dasboard-sidebar end-->
                <!-- dasboard-menu-->
                <div class="dasboard-menu">
                    <div class="dasboard-menu-btn color3-bg">Dashboard Menu <i class="fal fa-bars"></i></div>
                    <ul class="dasboard-menu-wrap">
                        @if (Str::startsWith(Route::currentRouteName(), 'hotels'))
                            <li><a href="{{ route('hotels.index') }}" class="@yield('active-1')"> <i
                                        class="far fa-calendar-check"></i>My Hotels </a></li>
                            <li><a href="{{ route('hotels.roomlist.list') }}"
                                    @if (Auth::user()->level == 1) style = "cursor:not-allowed;" @endif
                                    class="@yield('active-2')"> <i class="far fa-calendar-check"></i>Room lists </a></li>
                            <li><a href="{{ route('hotels.reservations.index', ['idUser' => $user->id]) }}"
                                    @if (Auth::user()->level == 1) style = "cursor:not-allowed;" @endif
                                    class="@yield('active-3')">
                                    <i class="far fa-calendar-check"></i>Reservation  </a></li>
                                    <li><a href="{{ route('hotels.reservations.history', ['idUser' => $user->id]) }}"
                                        @if (Auth::user()->level == 1) style = "cursor:not-allowed;" @endif
                                        class="@yield('active-4')">
                                        <i class="far fa-calendar-check"></i>History Reservation </a></li>
                        @elseif (Str::startsWith(Route::currentRouteName(), 'dashboard'))
                            <li>
                                <a href="{{ route('dashboard.profile.index') }}" class="@yield('active-1')"><i
                                        class="far fa-user"></i>Profile</a>
                                <ul>
                                    <li><a href="{{ route('dashboard.profile.edit') }}">Edit profile</a></li>

                                </ul>
                            </li>
                            <li><a href="{{ route('dashboard.mybookings.bookings') }}" class="@yield('active-2')"> <i
                                        class="far fa-calendar-check"></i>My
                                    Bookings
                                </a></li>
                            <li><a href="{{ route('dashboard.mybookings.history') }}" class="@yield('active-3')"> <i
                                        class="far fa-calendar-check"></i>History
                                    Bookings
                                </a></li>



                    </ul>
                    @endif
                </div>
                <!--dasboard-menu end-->
                <!--Tariff Plan menu-->
                <!--Tariff Plan menu end-->
            </div>
        </div>
    </section>
    @yield('profile')
    @yield('hotels')
    @yield('bookings')
    @yield('reservation')
    @yield('room-list')
@endsection
