<header class="main-header">
    <!-- header-top-->
    <div class="header-top fl-wrap">
        <div class="container">
            <div class="logo-holder">
                <a href="{{ route('home') }}"><img src="{{ asset('client/images/logo.png') }}" alt=""></a>
            </div>
            <a class="add-hotel" href="{{ route('hotels.index') }}">Add Your Place <span><i
                        class="far fa-plus"></i></span></a>
        </div>


    </div>
    <!-- header-top end-->
    <!-- header-inner-->
    <div class="header-inner fl-wrap">
        <div class="container">
            <div class="show-search-button"><span>Search</span> <i class="fas fa-search"></i> </div>
            <div class="header-user-menu ">
                <div class="header-user-name">
                    @php
                        $image = $user->image == null || !file_exists(public_path('image/members/' . $user->image)) ? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png' : asset('image/members/' . $user->image);
                        // nếu image không tồn tại giá tri hoac trong file public khong co ten hinh thi return ... neu ton tai thi return gia tri
                    @endphp
                    <span><img src="{{ $image }}" alt=""></span>
                    @if (Auth::check())
                        Hello, @if (!$user->name)
                            {{ Auth::user()->email }}
                        @endif
                        {{ $user->name }}
                    @endif
                </div>
                <ul>
                    <li><a href="{{ route('dashboard.profile.index') }}"> Profile</a></li>
                    <li><a href="dashboard-password.html">Change Password</a></li>
                    <li><a href="{{ route('hotels.index') }}">My Listigs</a></li>
                    <li><a href="{{ route('dashboard.mybookings.bookings') }}"> Bookings </a></li>
                    @if (Auth::user()->level == 3)
                        <li><a href="{{ route('admin.dashboard') }}"> Administrator </a></li>
                    @endif


                    <li>
                        <a href="{{ route('auth.logout') }}">Log Out</a>
                    </li>
                </ul>
            </div>
            <div class="home-btn"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></div>
            <!-- nav-button-wrap-->
            <div class="nav-button-wrap color-bg">
                <div class="nav-button">
                    <span></span><span></span><span></span>
                </div>
            </div>
            <!-- nav-button-wrap end-->
            <!--  navigation -->
            <div class="nav-holder main-menu">
                <nav>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}" class="act-link">Home</a>

                        </li>
                        <li>
                            <a href="{{ route('city.all') }}">Listings</a>
                            <!--second level -->

                            <!--second level end-->
                        </li>

                    </ul>
                </nav>
            </div>
            <!-- navigation  end -->
        </div>
    </div>
    <!-- header-inner end-->
    <!-- header-search -->

    <div class="header-search vis-search">
        <div class="container">
            <div class="row">
                <!-- header-search-input-item -->
                <div class="col-sm-4">
                    <div class="col-list-search-input-item in-loc-dec fl-wrap not-vis-arrow">
                        <label>City/Category</label>
                        <div class="listsearch-input-item">
                            <select name="city" data-placeholder="City" class="chosen-select">
                                <option class="location" value="0">All cities</option>
                                @foreach ($locations as $item)
                                    <option class="location" value="{{ $item->id }}">{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- header-search-input-item end -->
                <!-- header-search-input-item -->
                <div class="col-sm-3">
                    <div class="header-search-input-item fl-wrap date-parent">
                        <label>Date In-Out </label>
                        <span class="header-search-input-item-icon"><i class="fal fa-calendar-check"></i></span>
                        <input type="text" placeholder="When" name="header-search" value="" />
                    </div>
                </div>
                <!-- header-search-input-item end -->
                <!-- header-search-input-item -->
                <div class="col-sm-3">
                    <div class="header-search-input-item fl-wrap">
                        <div class="quantity-item">
                            <label>Rooms</label>
                            <div class="quantity">
                                <input name="no_rooms" type="number" min="1" step="1" value="1">
                            </div>
                        </div>
                        <div class="quantity-item">
                            <label>Adults</label>
                            <div class="quantity">
                                <input name="adult" type="number" min="1" step="1" value="1">
                            </div>
                        </div>
                        <div class="quantity-item">
                            <label>Children</label>
                            <div class="quantity">
                                <input name="kids" type="number" min="0" step="1" value="0">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header-search-input-item end -->
                <!-- header-search-input-item -->
                <div class="col-sm-2">
                    <div class="header-search-input-item fl-wrap">
                        <button type="submit" class="header-search-button search-btn">Search
                            <i class="far fa-search"></i></button>
                    </div>
                </div>
                <!-- header-search-input-item end -->
            </div>
        </div>
        <div class="close-header-search"><i class="fal fa-angle-double-up"></i></div>
    </div>

    <script>
        $(document).ready(function() {
            $('.search-btn').on('click', function(e) {
                e.preventDefault();

                // Retrieve the data from session
                let sessionData = sessionStorage.getItem('header-search');
                let sessionValues = sessionData ? JSON.parse(sessionData) : {};

                // Get the new values
                let city = $('select.chosen-select').val();
                let date = $('span.drp-selected').text();
                let arrDate = date.split('-');
                let checkInDate = arrDate[0];
                let checkOutDate = arrDate[1];
                let no_rooms = $('input[name="no_rooms"]').val();
                let adult = $('input[name="adult"]').val();
                let kids = $('input[name="kids"]').val();

                // Update the data object with new values
                let data = {
                    city: city || sessionValues.city,
                    checkInDate: checkInDate || sessionValues.checkInDate,
                    checkOutDate: checkOutDate || sessionValues.checkOutDate,
                    no_rooms: no_rooms || sessionValues.no_rooms,
                    adult: adult || sessionValues.adult,
                    kids: kids || sessionValues.kids
                };

                // Save the updated data to local storage
                localStorage.setItem('header-search', JSON.stringify(data));

                // Redirect to the new location

                if (city != 0) {
                    window.location.href = '/locations/result/' + city;
                } else {
                    window.location.href = '/locations/all';
                }
            });
        });
    </script>
    <!-- header-search  end -->
</header>
