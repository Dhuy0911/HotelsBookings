<header class="main-header">
    <!-- header-top-->
    <div class="header-top fl-wrap">
        <div class="container">
            <div class="logo-holder">
                <a href="{{ route('home') }}"><img src="{{ asset('client/images/logo.png') }}" alt=""></a>
            </div>
            <div class="show-reg-form modal-open"><i class="fa fa-sign-in"></i> Log In</div>
        </div>
    </div>

    <!-- header-top end-->
    <!-- header-inner-->
    <div class="header-inner fl-wrap">
        <div class="container">
            <div class="show-search-button"><span>Search</span> <i class="fas fa-search"></i> </div>
            <div class="home-btn"><a href="/index"><i class="fas fa-home"></i></a></div>
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
                            <a href="/index" class="act-link">Home <i class="fas fa-caret-down"></i></a>
                            <!--second level -->
                         
                            <!--second level end-->
                        </li>
                        <li>
                            <a href="#">Listings <i class="fas fa-caret-down"></i></a>
                            <!--second level -->
                           
                            <!--second level end-->
                        </li>
                        
                    </ul>
                </nav>
            </div>
            <!-- navigation  end -->
            <!-- wishlist-wrap-->
            <div class="wishlist-wrap scrollbar-inner novis_wishlist">
                <div class="box-widget-content">
                    <div class="widget-posts fl-wrap">
                        <ul>
                            <li class="clearfix">
                                <a href="#" class="widget-posts-img"><img
                                        src="{{ asset('client/images/gal/7.jpg') }}" class="respimg" alt=""></a>
                                <div class="widget-posts-descr">
                                    <a href="#" title="">Park Central</a>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                                    </div>
                                    <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                class="fas fa-map-marker-alt"></i> 40 JOURNAL SQUARE PLAZA, NJ,
                                            US</a></div>
                                    <span class="rooms-price">$80 <strong> / Awg</strong></span>
                                </div>
                            </li>
                            <li class="clearfix">
                                <a href="#" class="widget-posts-img"><img
                                        src="{{ asset('client/images/gal/8.jpg') }}" class="respimg" alt=""></a>
                                <div class="widget-posts-descr">
                                    <a href="#" title="">Holiday Home</a>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="3">
                                    </div>
                                    <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                class="fas fa-map-marker-alt"></i> 75 PRINCE ST, NY, USA</a>
                                    </div>
                                    <span class="rooms-price">$50 <strong> / Awg</strong></span>
                                </div>
                            </li>
                            <li class="clearfix">
                                <a href="#" class="widget-posts-img"><img
                                        src="{{ asset('client/images/gal/9.jpg') }}" class="respimg" alt=""></a>
                                <div class="widget-posts-descr">
                                    <a href="#" title="">Moonlight Hotel</a>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="4">
                                    </div>
                                    <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                class="fas fa-map-marker-alt"></i> 70 BRIGHT ST NEW YORK,
                                            USA</a></div>
                                    <span class="rooms-price">$105 <strong> / Awg</strong></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- wishlist-wrap end-->
        </div>
    </div>
    <!-- header-inner end-->
    <!-- header-search -->
    <div class="header-search vis-search">
        <div class="container">
            <div class="row">
                <!-- header-search-input-item -->
                <div class="col-sm-4">
                    <div class="header-search-input-item fl-wrap location autocomplete-container">
                        <div class="col-list-search-input-item in-loc-dec fl-wrap not-vis-arrow">
                            <label>City/Category</label>
                            <div class="listsearch-input-item">
                                <select name="city" data-placeholder="City" class="chosen-select">
                                    <option value="0">All cities</option>
                                    @foreach ($locations as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
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
                                <input type="number" name="no_rooms" min="1" max="3" step="1"
                                    value="1">
                            </div>
                        </div>
                        <div class="quantity-item">
                            <label>Adults</label>
                            <div class="quantity">
                                <input type="number" name="adult" min="1" max="3" step="1"
                                    value="1">
                            </div>
                        </div>
                        <div class="quantity-item">
                            <label>Children</label>
                            <div class="quantity">
                                <input type="number" name="kids" min="0" max="3" step="1"
                                    value="0">
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

                // Save the updated data to session
                sessionStorage.setItem('header-search', JSON.stringify(data));

                // Redirect to the new location
                window.location.href = '/locations/result/' + city;
            });
        });
    </script>

    <!-- header-search  end -->
</header>
