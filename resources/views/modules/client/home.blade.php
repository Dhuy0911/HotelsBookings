@extends('layout.master')
@section('title', 'Home - Hotels Booking')
@section('content')
    <!-- content-->
    <div class="content">
        <!--section -->
        {{-- HERO - PARALLAX --}}
        <!--section -->
        <section class="hero-section" data-scrollax-parent="true" id="sec1">
            <div class="hero-parallax">
                <div class="media-container video-parallax" data-scrollax="properties: { translateY: '200px' }">
                    <div class="bg mob-bg" style="background-image: url(images/bg/22.jpg)"></div>
                    <div class="video-container">
                        <video autoplay loop muted class="bgvid">
                            <source src="http://citybook.kwst.net/video/4.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="overlay op7"></div>
            </div>
            <div class="hero-section-wrap fl-wrap">
                <div class="container">
                    <div class="home-intro">
                        <div class="section-title-separator"><span></span></div>
                        <h2>EasyBook Hotel Booking System</h2>
                        <span class="section-separator"></span>
                        <h3>Let's start exploring the world together with EasyBook</h3>
                    </div>
                    <div class="main-search-input-wrap">
                        <div class="main-search-input fl-wrap">
                            <div class="main-search-input-item location" id="autocomplete-container">
                                <span class="inpt_dec"><i class="fal fa-map-marker"></i></span>
                                <input type="text" placeholder="Hotel , City..." class="autocomplete-input"
                                    id="autocompleteid2" value="" />
                                <a href="#"><i class="fal fa-dot-circle"></i></a>
                            </div>
                            <div class="main-search-input-item main-date-parent main-search-input-item_small">
                                <span class="inpt_dec"><i class="fal fa-calendar-check"></i></span>
                                <input type="text" placeholder="When" name="main-input-search" value="" />
                            </div>
                            <div class="main-search-input-item">
                                <div class="qty-dropdown fl-wrap">
                                    <div class="qty-dropdown-header fl-wrap">
                                        <i class="fal fa-users"></i> Persons
                                    </div>
                                    <div class="qty-dropdown-content fl-wrap">
                                        <div class="quantity-item">
                                            <label><i class="fas fa-male"></i> Adults</label>
                                            <div class="quantity">
                                                <input type="number" min="1" max="3" step="1"
                                                    value="1" />
                                            </div>
                                        </div>
                                        <div class="quantity-item">
                                            <label><i class="fas fa-child"></i> Children</label>
                                            <div class="quantity">
                                                <input type="number" min="0" max="3" step="1"
                                                    value="0" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="main-search-button color2-bg" onclick="window.location.href='listing.html'">
                                Search <i class="fal fa-search"></i>
                            </button>
                        </div>
                    </div>


                    <script>
                        mapboxgl.accessToken = 'pk.eyJ1IjoiZGh1eTA5MTEiLCJhIjoiY2xoMnQ5MDV2MDQxMzNobzN6NDk2N3NoYyJ9.ECJZGNxqvZ1paaa94BBGxg';
                        const map = new mapboxgl.Map({
                            container: 'map', // container ID
                            style: 'mapbox://styles/mapbox/streets-v12', // style URL
                            center: [-74.5, 40], // starting position [lng, lat]
                            zoom: 9, // starting zoom
                        });
                    </script>
                </div>
            </div>
            <div class="header-sec-link">
                <div class="container"><a href="#sec2" class="custom-scroll-link color-bg"><i
                            class="fal fa-angle-double-down"></i></a></div>
            </div>
        </section>
        <!-- section end -->
        <!--section -->
        <section id="sec2">
            <div class="container">
                <div class="section-title">
                    <div class="section-title-separator"><span></span></div>
                    <h2>Popular Destination</h2>
                    <span class="section-separator"></span>
                    <p>
                        Explore some of the best tips from around the city from our
                        partners and friends.
                    </p>
                </div>
            </div>
            <!-- portfolio start -->
            {{-- Locations --}}
            <div class="gallery-items fl-wrap mr-bot spad home-grid">
                @foreach ($city as $key => $location)
                    <div class="gallery-item">
                        <div class="grid-item-holder">
                            <div class="listing-item-grid">
                                <img src="{{ asset('image/locations/' . $location->image) }}" alt="" />
                                <div class="listing-item-cat">
                                    <h3><a
                                            href="{{ route('city.result', ['id' => $location->id]) }}">{{ $location->name }}</a>
                                    </h3>
                                    <div class="weather-grid" data-grcity="Rome"></div>
                                    <div class="clearfix"></div>
                                    <p>
                                        Constant care and attention to the patients makes good
                                        record
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endif --}}
                @endforeach
            </div>
            <!-- portfolio end -->
            <a href="{{ route('city.all') }}" class="btn color-bg">Explore All Cities<i class="fas fa-caret-right"></i></a>
        </section>
        <!-- section end -->
        <!-- section-->
        {{-- Hotels --}}
        <section class="grey-blue-bg">
            <!-- container-->
            <div class="container">
                <div class="section-title">
                    <div class="section-title-separator"><span></span></div>
                    <h2>Recently Added Hotels</h2>
                    <span class="section-separator"></span>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.
                    </p>
                </div>
            </div>
            <!-- container end-->
            <!-- carousel -->
            <div class="list-carousel fl-wrap card-listing">
                <!--listing-carousel-->
                <div class="listing-carousel fl-wrap">
                    <!--slick-slide-item-->
                    @foreach ($hotels as $item)
                        <div class="slick-slide-item">
                            <!-- listing-item  -->
                            @if ($item->status == 1)
                                <div class="listing-item">
                                    <article class="geodir-category-listing fl-wrap">
                                        <div class="geodir-category-img">
                                            <a href="{{ route('hotels.info', ['id' => $item->id]) }}">
                                                <img src="{{ asset('image/hotels/' . $item->main_image) }}" alt="">
                                            </a>
                                            <div class="geodir-category-opt">
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="4">
                                                </div>
                                                <div class="rate-class-name">
                                                    <div class="score"><strong> Good</strong>8 Reviews </div>
                                                    <span>4.1</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="geodir-category-content fl-wrap title-sin_item">
                                            <div class="geodir-category-content-title fl-wrap">
                                                <div class="geodir-category-content-title-item">
                                                    <h3 class="title-sin_map"><a
                                                            href="{{ route('hotels.info', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                                    </h3>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"
                                                            class="map-item">
                                                            {{ $item->address }}</a></div>
                                                </div>
                                            </div>

                                            <ul class="facilities-list fl-wrap">
                                                @foreach ($hotels_facilities as $hotel_facilities)
                                                    @if ($hotel_facilities->hotels_id == $item->id)
                                                        <li><i
                                                                class="{{ $hotel_facilities->description }}"></i><span>{{ $hotel_facilities->name }}</span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            <div class="geodir-category-footer fl-wrap">
                                                <div class="geodir-opt-link">
                                                    <div class="geodir-category-price">Awg/Night <span>$ 105</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endif
                            <!-- listing-item end -->
                        </div>

                        {{-- <div class="listing-item">
                        <article class="geodir-category-listing fl-wrap">
                            <div class="geodir-category-img">
                                <a href="{{ route('hotels.info', ['id' => $item->id]) }}">
                                    <img src="{{ asset('image/hotels/' . $item->main_image) }}" alt="">
                                </a>
                                <div class="geodir-category-opt">
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="3"></div>
                                    <div class="rate-class-name">
                                        <div class="score">
                                            <strong>Pleasant</strong>10 Reviews
                                        </div>
                                        <span>3.2</span>
                                    </div>
                                </div>
                            </div>
                            <div class="geodir-category-content fl-wrap title-sin_item">
                                <div class="geodir-category-content-title fl-wrap">
                                    <div class="geodir-category-content-title-item">
                                        <h3 class="title-sin_map">
                                            <a href="listing-single.html">{{ $item->name }}</a>
                                        </h3>
                                        <div class="geodir-category-location fl-wrap">
                                            <a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i>{{ $item->address }}</a>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    Mauris ac maximus neque. Nam in mauris quis libero
                                    sodales eleifend.
                                </p>
                                <ul class="facilities-list fl-wrap">
                                    @foreach ($hotels_facilities as $hotel_facilities)
                                        @if ($hotel_facilities->hotels_id == $item->id)
                                            <li><i
                                                    class="{{ $hotel_facilities->description }}"></i><span>{{ $hotel_facilities->name }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <div class="geodir-category-footer fl-wrap">
                                    <div class="geodir-opt-link">
                                        <div class="geodir-category-price">
                                            Awg/Night <span>$ 50</span>
                                        </div>
                                    </div>
                                    <div class="geodir-opt-list">
                                        <a href="#" class="single-map-item" data-newlatitude="40.72228267"
                                            data-newlongitude="-73.99246214"><i class="fal fa-map-marker-alt"></i><span
                                                class="geodir-opt-tooltip">On the map</span></a>
                                        <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span
                                                class="geodir-opt-tooltip">Save</span></a>
                                        <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span
                                                class="geodir-opt-tooltip">Find Directions</span></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div> --}}
                        <!-- listing-item end -->
                    @endforeach

                    <!--slick-slide-item end-->
                </div>
                <!--listing-carousel end-->
                <div class="swiper-button-prev sw-btn">
                    <i class="fa fa-long-arrow-left"></i>
                </div>
                <div class="swiper-button-next sw-btn">
                    <i class="fa fa-long-arrow-right"></i>
                </div>
            </div>
            <!--  carousel end-->
        </section>
        <!-- section end -->
        <!--section -->
        <!-- section end -->
        <!--section -->
        <section>
            <div class="container">
                <div class="section-title">
                    <div class="section-title-separator"><span></span></div>
                    <h2>Why Choose Us</h2>
                    <span class="section-separator"></span>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.
                    </p>
                </div>
                <!-- -->
                <div class="row">
                    <div class="col-md-4">
                        <!-- process-item-->
                        <div class="process-item big-pad-pr-item">
                            <span class="process-count"> </span>
                            <div class="time-line-icon">
                                <i class="fal fa-headset"></i>
                            </div>
                            <h4><a href="#"> Best service guarantee</a></h4>
                            <p>
                                Proin dapibus nisl ornare diam varius tempus. Aenean a
                                quam luctus, finibus tellus ut, convallis eros
                                sollicitudin turpis.
                            </p>
                        </div>
                        <!-- process-item end -->
                    </div>
                    <div class="col-md-4">
                        <!-- process-item-->
                        <div class="process-item big-pad-pr-item">
                            <span class="process-count"> </span>
                            <div class="time-line-icon">
                                <i class="fal fa-gift"></i>
                            </div>
                            <h4><a href="#">Exclusive gifts</a></h4>
                            <p>
                                Proin dapibus nisl ornare diam varius tempus. Aenean a
                                quam luctus, finibus tellus ut, convallis eros
                                sollicitudin turpis.
                            </p>
                        </div>
                        <!-- process-item end -->
                    </div>
                    <div class="col-md-4">
                        <!-- process-item-->
                        <div class="process-item big-pad-pr-item nodecpre">
                            <span class="process-count"> </span>
                            <div class="time-line-icon">
                                <i class="fal fa-credit-card"></i>
                            </div>
                            <h4><a href="#"> Get more from your card</a></h4>
                            <p>
                                Proin dapibus nisl ornare diam varius tempus. Aenean a
                                quam luctus, finibus tellus ut, convallis eros
                                sollicitudin turpis.
                            </p>
                        </div>
                        <!-- process-item end -->
                    </div>
                </div>
                <!--process-wrap   end-->
                <div class="single-facts fl-wrap mar-top">
                    <!-- inline-facts -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <i class="fal fa-users"></i>
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="254">
                                        154
                                    </div>
                                </div>
                            </div>
                            <h6>New Visiters Every Week</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                    <!-- inline-facts  -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <i class="fal fa-thumbs-up"></i>
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="12168">
                                        12168
                                    </div>
                                </div>
                            </div>
                            <h6>Happy customers every year</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                    <!-- inline-facts  -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <i class="fal fa-award"></i>
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="172">
                                        172
                                    </div>
                                </div>
                            </div>
                            <h6>Won Awards</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                    <!-- inline-facts  -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <i class="fal fa-hotel"></i>
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="732">
                                        732
                                    </div>
                                </div>
                            </div>
                            <h6>New Listing Every Week</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                </div>
            </div>
        </section>
        <!-- section end -->
        <!--section -->
        <section class="color-bg hidden-section">
            <div class="wave-bg wave-bg2"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <!-- -->
                        <div class="colomn-text pad-top-column-text fl-wrap">
                            <div class="colomn-text-title">
                                <h3>Our App Available Now</h3>
                                <p>
                                    In ut odio libero, at vulputate urna. Nulla tristique mi
                                    a massa convallis cursus. Nulla eu mi magna. Etiam
                                    suscipit commodo gravida. Lorem ipsum dolor sit amet,
                                    conse ctetuer adipiscing elit, sed diam nonu mmy nibh
                                    euismod tincidunt ut laoreet dolore magna aliquam erat.
                                </p>
                                <a href="#" class="down-btn color3-bg"><i class="fab fa-apple"></i>
                                    Download for
                                    iPhone</a>
                                <a href="#" class="down-btn color3-bg"><i class="fab fa-android"></i>
                                    Download for
                                    Android</a>
                            </div>
                        </div>
                        <!--process-wrap   end-->
                    </div>
                    <div class="col-md-6">
                        <div class="collage-image">
                            <img src="{{ asset('client/images/api.png') }}" class="main-collage-image" alt="" />
                            <div class="images-collage-title color3-bg">
                                Easy<span>Book</span>
                            </div>
                            <div class="collage-image-min cim_1">
                                <img src="{{ asset('client/images/api/1.jpg') }}" alt="" />
                            </div>
                            <div class="collage-image-min cim_2">
                                <img src="{{ asset('client/images/api/2.jpg') }}" alt="" />
                            </div>
                            <div class="collage-image-min cim_3">
                                <img src="{{ asset('client/images/api/3.jpg') }}" alt="" />
                            </div>
                            <div class="collage-image-input">
                                Search <i class="fa fa-search"></i>
                            </div>
                            <div class="collage-image-btn color2-bg">Booking now</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->
        <!--section -->
        <section>
            <div class="container">
                <div class="section-title">
                    <div class="section-title-separator"><span></span></div>
                    <h2>Testimonials</h2>
                    <span class="section-separator"></span>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <!--slider-carousel-wrap -->
            <div class="slider-carousel-wrap text-carousel-wrap fl-wrap">
                <div class="swiper-button-prev sw-btn">
                    <i class="fa fa-long-arrow-left"></i>
                </div>
                <div class="swiper-button-next sw-btn">
                    <i class="fa fa-long-arrow-right"></i>
                </div>
                <div class="text-carousel single-carousel fl-wrap">
                    <!--slick-item -->
                    <div class="slick-item">
                        <div class="text-carousel-item">
                            <div class="popup-avatar">
                                <img src="{{ asset('client/images/avatar/1.jpg') }}" alt="" />
                            </div>
                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                            <div class="review-owner fl-wrap">
                                Milka Antony - <span>Happy Client</span>
                            </div>
                            <p>
                                "In ut odio libero, at vulputate urna. Nulla tristique mi
                                a massa convallis cursus. Nulla eu mi magna. Etiam
                                suscipit commodo gravida. Lorem ipsum dolor sit amet,
                                conse ctetuer adipiscing elit, sed diam nonu mmy nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat."
                            </p>
                            <a href="#" class="testim-link">Via Facebook</a>
                        </div>
                    </div>
                    <!--slick-item end -->
                    <!--slick-item -->
                    <div class="slick-item">
                        <div class="text-carousel-item">
                            <div class="popup-avatar">
                                <img src="{{ asset('client/images/avatar/2.jpg') }}" alt="" />
                            </div>
                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div>
                            <div class="review-owner fl-wrap">
                                Milka Antony - <span>Happy Client</span>
                            </div>
                            <p>
                                "In ut odio libero, at vulputate urna. Nulla tristique mi
                                a massa convallis cursus. Nulla eu mi magna. Etiam
                                suscipit commodo gravida. Lorem ipsum dolor sit amet,
                                conse ctetuer adipiscing elit, sed diam nonu mmy nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat."
                            </p>
                            <a href="#" class="testim-link">Via Facebook</a>
                        </div>
                    </div>
                    <!--slick-item end -->
                    <!--slick-item -->
                    <div class="slick-item">
                        <div class="text-carousel-item">
                            <div class="popup-avatar">
                                <img src="{{ asset('client/images/avatar/3.jpg') }}" alt="" />
                            </div>
                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                            <div class="review-owner fl-wrap">
                                Milka Antony - <span>Happy Client</span>
                            </div>
                            <p>
                                "In ut odio libero, at vulputate urna. Nulla tristique mi
                                a massa convallis cursus. Nulla eu mi magna. Etiam
                                suscipit commodo gravida. Lorem ipsum dolor sit amet,
                                conse ctetuer adipiscing elit, sed diam nonu mmy nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat."
                            </p>
                            <a href="#" class="testim-link">Via Facebook</a>
                        </div>
                    </div>
                    <!--slick-item end -->
                    <!--slick-item -->
                    <div class="slick-item">
                        <div class="text-carousel-item">
                            <div class="popup-avatar">
                                <img src="{{ asset('client/images/avatar/4.jpg') }}" alt="" />
                            </div>
                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                            <div class="review-owner fl-wrap">
                                Milka Antony - <span>Happy Client</span>
                            </div>
                            <p>
                                "In ut odio libero, at vulputate urna. Nulla tristique mi
                                a massa convallis cursus. Nulla eu mi magna. Etiam
                                suscipit commodo gravida. Lorem ipsum dolor sit amet,
                                conse ctetuer adipiscing elit, sed diam nonu mmy nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat."
                            </p>
                            <a href="#" class="testim-link">Via Facebook</a>
                        </div>
                    </div>
                    <!--slick-item end -->
                </div>
            </div>
            <!--slider-carousel-wrap end-->
        </section>
        <!-- section end-->
        <section class="parallax-section" data-scrollax-parent="true">
            <div class="bg" data-bg="{{ asset('client/images/bg/14.jpg') }}"
                data-scrollax="properties: { translateY: '100px' }"></div>
            <div class="overlay"></div>
            <!--container-->
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <!-- column text-->
                        <div class="colomn-text fl-wrap">
                            <div class="colomn-text-title">
                                <h3>The owner of the hotel or business ?</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Maecenas in pulvinar neque. Nulla finibus lobortis
                                    pulvinar.
                                </p>
                                <a href="dashboard-add-listing.html" class="btn color-bg float-btn">Add your
                                    hotel<i class="fal fa-plus"></i></a>
                            </div>
                        </div>
                        <!--column text   end-->
                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->
        <!--section -->
        <section class="middle-padding">
            <div class="container">
                <div class="section-title">
                    <div class="section-title-separator"><span></span></div>
                    <h2>Tips & Articles</h2>
                    <span class="section-separator"></span>
                    <p>Browse the latest articles from our blog.</p>
                </div>
                <div class="row home-posts">
                    <div class="col-md-4">
                        <article class="card-post">
                            <div class="card-post-img fl-wrap">
                                <a href="blog-single.html"><img src="{{ asset('client/images/all/11.jpg') }}"
                                        alt="" /></a>
                            </div>
                            <div class="card-post-content fl-wrap">
                                <h3><a href="blog-single.html">Blog Post Title.</a></h3>
                                <p>
                                    In ut odio libero, at vulputate urna. Nulla tristique mi
                                    a massa convallis cursus. Nulla eu mi magna. Etiam
                                    suscipit commodo gravida.
                                </p>
                                <div class="post-author">
                                    <a href="#"><img src="{{ asset('client/images/avatar/4.jpg') }}"
                                            alt="" /><span>By , Mery Lynn</span></a>
                                </div>
                                <div class="post-opt">
                                    <ul>
                                        <li>
                                            <i class="fal fa-calendar"></i>
                                            <span>25 April 2018</span>
                                        </li>
                                        <li><i class="fal fa-eye"></i> <span>264</span></li>
                                        <li>
                                            <i class="fal fa-tags"></i> <a href="#">Design</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="card-post">
                            <div class="card-post-img fl-wrap">
                                <div class="list-single-main-media fl-wrap">
                                    <div class="single-slider-wrapper fl-wrap">
                                        <div class="single-slider fl-wrap">
                                            <div class="slick-slide-item">
                                                <img src="{{ asset('client/images/all/9.jpg') }}" alt="" />
                                            </div>
                                            <div class="slick-slide-item">
                                                <img src="{{ asset('client/images/all/7.jpg') }}" alt="" />
                                            </div>
                                            <div class="slick-slide-item">
                                                <img src="{{ asset('client/images/all/1.jpg') }}" alt="" />
                                            </div>
                                        </div>
                                        <div class="swiper-button-prev sw-btn">
                                            <i class="fa fa-long-arrow-left"></i>
                                        </div>
                                        <div class="swiper-button-next sw-btn">
                                            <i class="fa fa-long-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-post-content fl-wrap">
                                <h3><a href="blog-single.html">Blog Post Title.</a></h3>
                                <p>
                                    In ut odio libero, at vulputate urna. Nulla tristique mi
                                    a massa convallis cursus. Nulla eu mi magna. Etiam
                                    suscipit commodo gravida.
                                </p>
                                <div class="post-author">
                                    <a href="#"><img src="{{ asset('client/images/avatar/1.jpg') }}"
                                            alt="" /><span>By , Mery Lynn</span></a>
                                </div>
                                <div class="post-opt">
                                    <ul>
                                        <li>
                                            <i class="fal fa-calendar"></i>
                                            <span>25 April 2018</span>
                                        </li>
                                        <li><i class="fal fa-eye"></i> <span>264</span></li>
                                        <li>
                                            <i class="fal fa-tags"></i> <a href="#">Design</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="card-post">
                            <div class="card-post-img fl-wrap">
                                <a href="blog-single.html"><img src="{{ asset('client/images/all/10.jpg') }}"
                                        alt="" /></a>
                            </div>
                            <div class="card-post-content fl-wrap">
                                <h3><a href="blog-single.html">Blog Post Title.</a></h3>
                                <p>
                                    In ut odio libero, at vulputate urna. Nulla tristique mi
                                    a massa convallis cursus. Nulla eu mi magna. Etiam
                                    suscipit commodo gravida.
                                </p>
                                <div class="post-author">
                                    <a href="#"><img src="{{ asset('client/images/avatar/1.jpg') }}"
                                            alt="" /><span>By , Mery Lynn</span></a>
                                </div>
                                <div class="post-opt">
                                    <ul>
                                        <li>
                                            <i class="fal fa-calendar"></i>
                                            <span>25 April 2018</span>
                                        </li>
                                        <li><i class="fal fa-eye"></i> <span>264</span></li>
                                        <li>
                                            <i class="fal fa-tags"></i> <a href="#">Design</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <a href="blog.html" class="btn color-bg">Read All News<i class="fas fa-caret-right"></i></a>
            </div>
            <div class="section-decor"></div>
        </section>
    </div>
    <!-- content end-->

    <!--wrapper end -->
@endsection
