@extends('layout.master')
@section('title', 'Hotels Infomation')
@section('content')

    <!-- content-->
    <div class="content">
        <!--  section  -->
        <section class="list-single-hero" data-scrollax-parent="true" id="sec1">
            <div class="bg par-elem" data-bg="{{ asset('image/hotels/' . $hotels->main_image) }}"
                data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="list-single-hero-title fl-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="listing-rating-wrap">
                                <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                            </div>
                            <h2><span>{{ $hotels->name }}</span></h2>
                            <div class="list-single-header-contacts fl-wrap">
                                <ul>
                                    <li>
                                        <i class="far fa-phone"></i><a href="#">{{ $hotels->hotline }}</a>
                                    </li>
                                    <li>
                                        <i class="far fa-map-marker-alt"></i><a href="#">{{ $hotels->address }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <!--  list-single-hero-details-->
                            <div class="list-single-hero-details fl-wrap">
                                <!--  list-single-hero-rating-->
                                <div class="list-single-hero-rating">
                                    <div class="rate-class-name">
                                        <div class="score">
                                            <strong>Very Good</strong>2 Reviews
                                        </div>
                                        <span>4.5</span>
                                    </div>
                                    <!-- list-single-hero-rating-list-->
                                    <div class="list-single-hero-rating-list">
                                        <!-- rate item-->
                                        <div class="rate-item fl-wrap">
                                            <div class="rate-item-title fl-wrap">
                                                <span>Cleanliness</span>
                                            </div>
                                            <div class="rate-item-bg" data-percent="100%">
                                                <div class="rate-item-line color-bg"></div>
                                            </div>
                                            <div class="rate-item-percent">5.0</div>
                                        </div>
                                        <!-- rate item end-->
                                        <!-- rate item-->
                                        <div class="rate-item fl-wrap">
                                            <div class="rate-item-title fl-wrap">
                                                <span>Comfort</span>
                                            </div>
                                            <div class="rate-item-bg" data-percent="90%">
                                                <div class="rate-item-line color-bg"></div>
                                            </div>
                                            <div class="rate-item-percent">5.0</div>
                                        </div>
                                        <!-- rate item end-->
                                        <!-- rate item-->
                                        <div class="rate-item fl-wrap">
                                            <div class="rate-item-title fl-wrap">
                                                <span>Staf</span>
                                            </div>
                                            <div class="rate-item-bg" data-percent="80%">
                                                <div class="rate-item-line color-bg"></div>
                                            </div>
                                            <div class="rate-item-percent">4.0</div>
                                        </div>
                                        <!-- rate item end-->
                                        <!-- rate item-->
                                        <div class="rate-item fl-wrap">
                                            <div class="rate-item-title fl-wrap">
                                                <span>Facilities</span>
                                            </div>
                                            <div class="rate-item-bg" data-percent="90%">
                                                <div class="rate-item-line color-bg"></div>
                                            </div>
                                            <div class="rate-item-percent">4.5</div>
                                        </div>
                                        <!-- rate item end-->
                                    </div>
                                    <!-- list-single-hero-rating-list end-->
                                </div>
                                <!--  list-single-hero-rating  end-->
                                <div class="clearfix"></div>
                                <!-- list-single-hero-links-->
                                <div class="list-single-hero-links">
                                    <a class="custom-scroll-link lisd-link" href="#sec6"><i
                                            class="fal fa-comment-alt-check"></i> Add
                                        review</a>
                                </div>
                                <!--  list-single-hero-links end-->
                            </div>
                            <!--  list-single-hero-details  end-->
                        </div>
                    </div>
                    <div class="breadcrumbs-hero-buttom fl-wrap">
                        <div class="breadcrumbs">
                            <a href="#">Home</a><a
                                href="#">{{ $hotels->location_name }}</a><span>{{ $hotels->name }}</span>
                        </div>
                        <div class="list-single-hero-price">
                            AWG/NIGHT<span>$ 320</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  section  end-->
        <!--  section  -->
        <section class="grey-blue-bg small-padding scroll-nav-container" id="sec2">
            <!--  scroll-nav-wrapper  -->
            <div class="scroll-nav-wrapper fl-wrap">
                <div class="hidden-map-container fl-wrap">
                    <input id="pac-input" class="controls fl-wrap controls-mapwn" type="text"
                        placeholder="What Nearby ?   Bar , Gym , Restaurant " />
                    <div class="map-container">
                        <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="container">
                    <nav class="scroll-nav scroll-init">
                        <ul>
                            <li><a class="act-scrlink" href="#sec1">Top</a></li>
                            <li><a href="#sec2">Details</a></li>
                            <li><a href="#sec3">Amenities</a></li>
                            <li><a href="#sec4">Rooms</a></li>
                            <li><a href="#sec5">Reviews</a></li>
                        </ul>
                    </nav>
                    <a href="#" class="show-hidden-map">
                        <span>On The Map</span> <i class="fal fa-map-marked-alt"></i></a>
                </div>
            </div>
            <!--  scroll-nav-wrapper end  -->
            <!--   container  -->
            <div class="container">
                <!--   row  -->
                <div class="row">
                    <!--   datails -->
                    <div class="col-md-8">
                        <div class="list-single-main-container">
                            <!-- fixed-scroll-column  -->
                            <div class="fixed-scroll-column">
                                <div class="fixed-scroll-column-item fl-wrap">
                                    <div class="showshare sfcs fc-button">
                                        <i class="far fa-share-alt"></i><span>Share </span>
                                    </div>
                                    <div class="share-holder fixed-scroll-column-share-container">
                                        <div class="share-container isShare"></div>
                                    </div>
                                    <a class="fc-button custom-scroll-link" href="#sec6"><i
                                            class="far fa-comment-alt-check"></i>
                                        <span> Add review </span></a>
                                    <a class="fc-button" href="#"><i class="far fa-heart"></i>
                                        <span>Save</span></a>
                                    {{-- <a class="fc-button"
                                        href="{{ route('bookings.book', ['idhotels' => $hotels->id]) }}"><i
                                            class="far fa-bookmark"></i>
                                        <span> Book Now </span></a> --}}
                                </div>
                            </div>
                            <!-- fixed-scroll-column end   -->
                            <div class="list-single-main-media fl-wrap">
                                <!-- gallery-items   -->
                                <div class="gallery-items grid-small-pad list-single-gallery three-coulms lightgallery">
                                    <!-- 1 -->
                                    @foreach ($hotel_image as $index => $item)
                                        @if ($index < 5)
                                            <div class="gallery-item">
                                                <div class="grid-item-holder">
                                                    <div class="box-item">
                                                        <img src="{{ asset('image/hotels/' . $item->image) }}"
                                                            alt="" />
                                                        <a href="{{ asset('image/hotels/' . $item->image) }}"
                                                            class="gal-link popup-image"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            @if ($index == 5)
                                                <div class="gallery-item">
                                                    <div class="grid-item-holder">
                                                        <div class="box-item">
                                                            <img src="{{ asset('image/hotels/' . $item->image) }}"
                                                                alt="" />
                                                            <div class="more-photos-button dynamic-gal"
                                                                data-dynamicPath="[{'src': '{{ asset('image/hotels/' . $item->image) }}'}]">
                                                                Other <span>{{ count($hotel_image) - 5 }} photos</span><i
                                                                    class="far fa-long-arrow-right"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach

                                </div>
                                <!-- end gallery items -->
                            </div>
                            <!-- list-single-header end -->
                            <div class="list-single-facts fl-wrap">
                                <!-- inline-facts -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fal fa-bed"></i>
                                        <div class="milestone-counter">
                                            <div class="stats animaper">45</div>
                                        </div>
                                        <h6>Hotel Rooms</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fal fa-users"></i>
                                        <div class="milestone-counter">
                                            <div class="stats animaper">2557</div>
                                        </div>
                                        <h6>Customers Every Year</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fal fa-taxi"></i>
                                        <div class="milestone-counter">
                                            <div class="stats animaper">15</div>
                                        </div>
                                        <h6>Distance to Center</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fal fa-cocktail"></i>
                                        <div class="milestone-counter">
                                            <div class="stats animaper">4</div>
                                        </div>
                                        <h6>Restaurant Inside</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                            </div>
                            <!--   list-single-main-item -->
                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>About Hotel</h3>
                                </div>
                                <p>
                                    {{ $hotels->content }}
                                </p>

                            </div>
                            <!--   list-single-main-item end -->
                            <!--   list-single-main-item -->
                            <div class="list-single-main-item fl-wrap" id="sec3">
                                <div style="margin: 0 0 25px 0;
                                padding-bottom: 25px;
                                border-bottom: 1px solid #eee;"
                                    class="list-single-main-item-title fl-wrap">
                                    <h3>Amenities</h3>
                                </div>
                                <div class="listing-features fl-wrap">
                                    <ul>
                                        @foreach ($hotels_facilities as $item)
                                            <li>
                                                <i class="{{ $item->description }}"></i> {{ $item->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!--   list-single-main-item end -->

                            <!--   list-single-main-item -->
                            <div id="sec4" class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>Available Rooms</h3>
                                </div>
                                <!--   rooms-container -->
                                @if ($rooms->isEmpty())
                                    Not available rooms
                                @endif
                                <div class="rooms-container fl-wrap">
                                    @foreach ($rooms as $item)
                                        @if ($item->status == 1)
                                            @if (!in_array($item->id, $tempArr))
                                                <div class="rooms-item fl-wrap">
                                                    <div class="rooms-media">
                                                        @php
                                                            $isFirstImage = true;
                                                            $dynamicPath = [];
                                                            
                                                            foreach ($room_image as $image) {
                                                                if ($item->id == $image->rooms_id) {
                                                                    if ($isFirstImage) {
                                                                        echo '<img src="' . asset('image/rooms/' . $image->image) . '" alt="" />';
                                                                        $isFirstImage = false;
                                                                    }
                                                            
                                                                    $dynamicPath[] = ['src' => asset('image/rooms/' . $image->image)];
                                                                }
                                                            }
                                                            
                                                            $dynamicPathJson = json_encode($dynamicPath);
                                                        @endphp

                                                        @if (!$isFirstImage)
                                                            <div class="dynamic-gal more-photos-button"
                                                                data-dynamicPath='{{ $dynamicPathJson }}'>
                                                                View Gallery <span>{{ count($dynamicPath) }} photos</span>
                                                                <i class="far fa-long-arrow-right"></i>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="rooms-details">
                                                        <div class="rooms-details-header fl-wrap">
                                                            <span class="rooms-price">
                                                                <td>{{ number_format($item->price, 0, ' ', '.') }} VND</td>
                                                                <strong> / night</strong>
                                                            </span>
                                                            <a href="{{ route('hotels.rooms.index', ['hotelId' => $hotels->id, 'roomId' => $item->id]) }}"
                                                                class="ajax-link">
                                                                <h3>{{ $item->name }}</h3>
                                                            </a>
                                                            <h5>Max Guests: <span>{{ $item->persons }} persons</span></h5>
                                                        </div>
                                                        <p>
                                                            @if ($item->description == null)
                                                                No description
                                                            @endif
                                                            {{ $item->description }}
                                                        </p>
                                                        <div class="facilities-list fl-wrap">
                                                            <ul>
                                                                @foreach ($room_services as $services)
                                                                    @if ($services->rooms_id == $item->id)
                                                                        <li>
                                                                            <i class="{{ $services->description }}"></i>
                                                                            <span>{{ $services->name }}</span>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <a href="{{ route('hotels.rooms.index', ['hotelId' => $hotels->id, 'roomId' => $item->id]) }}"
                                                                class="btn color-bg ajax-link">Details<i
                                                                    class="fas fa-caret-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--  rooms-item -->
                                                @php
                                                    array_push($tempArr, $item->id);
                                                @endphp
                                            @endif
                                        @endif

                                        <!--  rooms-item end -->
                                    @endforeach


                                </div>
                                <!--   rooms-container end -->
                            </div>
                            <!-- list-single-main-item end -->
                            <!-- accordion-->
                            <div class="accordion mar-top">
                                <a class="toggle act-accordion" href="#">
                                    Timings and Policy<span></span></a>
                                <div class="accordion-inner visible">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Policy</th>
                                                    <th scope="col">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hotels_timings as $item)
                                                    <tr class="">
                                                        <td style="margin-left: 0.5px" class="row">Check-in Time</td>
                                                        <td>From {{ $item->checkin_time_from }} to
                                                            {{ $item->checkin_time_until }}</td>
                                                    </tr>
                                                    <tr class="">
                                                        <td style="margin-left: 0.5px" class="row">Check-out Time</td>
                                                        <td>From {{ $item->checkout_time_from }} to
                                                            {{ $item->checkout_time_until }}</td>
                                                    </tr>
                                                    <tr class="">
                                                        <td style="margin-left: 0.5px" class="row">Reception Time</td>
                                                        <td>From {{ $item->reception_time_from }} to
                                                            {{ $item->reception_time_until }}</td>
                                                    </tr>
                                                @endforeach
                                                @foreach ($hotels_policies as $item)
                                                    <tr class="">
                                                        <td scope="row">{{ $item->name }}</td>
                                                        <td>{{ $item->description }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>



                                </div>
                            </div>
                            <!-- accordion end -->
                            <!-- list-single-main-item -->
                            <div class="list-single-main-item fl-wrap" id="sec5">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>Item Reviews - <span> 2 </span></h3>
                                </div>
                                <!--reviews-score-wrap-->
                                <div class="reviews-score-wrap fl-wrap">
                                    <div class="review-score-total">
                                        <span>
                                            4.5
                                            <strong>Very Good</strong>
                                        </span>
                                        <a href="#" class="color2-bg">Add Review</a>
                                    </div>
                                    <div class="review-score-detail">
                                        <!-- review-score-detail-list-->
                                        <div class="review-score-detail-list">
                                            <!-- rate item-->
                                            <div class="rate-item fl-wrap">
                                                <div class="rate-item-title fl-wrap">
                                                    <span>Cleanliness</span>
                                                </div>
                                                <div class="rate-item-bg" data-percent="100%">
                                                    <div class="rate-item-line color-bg"></div>
                                                </div>
                                                <div class="rate-item-percent">5.0</div>
                                            </div>
                                            <!-- rate item end-->
                                            <!-- rate item-->
                                            <div class="rate-item fl-wrap">
                                                <div class="rate-item-title fl-wrap">
                                                    <span>Comfort</span>
                                                </div>
                                                <div class="rate-item-bg" data-percent="90%">
                                                    <div class="rate-item-line color-bg"></div>
                                                </div>
                                                <div class="rate-item-percent">5.0</div>
                                            </div>
                                            <!-- rate item end-->
                                            <!-- rate item-->
                                            <div class="rate-item fl-wrap">
                                                <div class="rate-item-title fl-wrap">
                                                    <span>Staf</span>
                                                </div>
                                                <div class="rate-item-bg" data-percent="80%">
                                                    <div class="rate-item-line color-bg"></div>
                                                </div>
                                                <div class="rate-item-percent">4.0</div>
                                            </div>
                                            <!-- rate item end-->
                                            <!-- rate item-->
                                            <div class="rate-item fl-wrap">
                                                <div class="rate-item-title fl-wrap">
                                                    <span>Facilities</span>
                                                </div>
                                                <div class="rate-item-bg" data-percent="90%">
                                                    <div class="rate-item-line color-bg"></div>
                                                </div>
                                                <div class="rate-item-percent">4.5</div>
                                            </div>
                                            <!-- rate item end-->
                                        </div>
                                        <!-- review-score-detail-list end-->
                                    </div>
                                </div>
                                <!-- reviews-score-wrap end -->
                                <div class="reviews-comments-wrap">
                                    <!-- reviews-comments-item -->
                                    <div class="reviews-comments-item">
                                        <div class="review-comments-avatar">
                                            <img src="{{ asset('client/images/avatar/2.jpg') }}" alt="" />
                                        </div>
                                        <div class="reviews-comments-item-text">
                                            <h4><a href="#">Liza Rose</a></h4>
                                            <div class="review-score-user">
                                                <span>4.4</span>
                                                <strong>Good</strong>
                                            </div>
                                            <div class="clearfix"></div>
                                            <p>
                                                " Donec quam felis, ultricies nec, pellentesque
                                                eu, pretium quis, sem. Nulla consequat massa quis
                                                enim. Donec pede justo, fringilla vel, aliquet
                                                nec, vulputate eget, arcu. In enim justo, rhoncus
                                                ut, imperdiet a, venenatis vitae, justo. Nullam
                                                dictum felis eu pede mollis pretium. "
                                            </p>
                                            <div class="reviews-comments-item-date">
                                                <span><i class="far fa-calendar-check"></i>12 April
                                                    2018</span><a href="#"><i class="fal fa-reply"></i> Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--reviews-comments-item end-->
                                    <!-- reviews-comments-item -->
                                    <div class="reviews-comments-item">
                                        <div class="review-comments-avatar">
                                            <img src="{{ asset('client/images/avatar/5.jpg') }}" alt="" />
                                        </div>
                                        <div class="reviews-comments-item-text">
                                            <h4><a href="#">Adam Koncy</a></h4>
                                            <div class="review-score-user">
                                                <span>4.7</span>
                                                <strong>Very Good</strong>
                                            </div>
                                            <div class="clearfix"></div>
                                            <p>
                                                " Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Nunc posuere convallis purus non
                                                cursus. Cras metus neque, gravida sodales massa
                                                ut. "
                                            </p>
                                            <div class="reviews-comments-item-date">
                                                <span><i class="far fa-calendar-check"></i>03
                                                    December 2017</span><a href="#"><i class="fal fa-reply"></i>
                                                    Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--reviews-comments-item end-->
                                </div>
                            </div>
                            <!-- list-single-main-item end -->
                            <!-- list-single-main-item -->
                            <div class="list-single-main-item fl-wrap" id="sec6">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>Add Review</h3>
                                </div>
                                <!-- Add Review Box -->
                                <div id="add-review" class="add-review-box">
                                    <!-- Review Comment -->
                                    <form id="add-comment" class="add-comment custom-form" name="rangeCalc">
                                        <fieldset>
                                            <div class="review-score-form fl-wrap">
                                                <div class="review-range-container">
                                                    <!-- review-range-item-->
                                                    <div class="review-range-item">
                                                        <div class="range-slider-title">
                                                            Cleanliness
                                                        </div>
                                                        <div class="range-slider-wrap">
                                                            <input type="text" class="rate-range" data-min="0"
                                                                data-max="5" name="rgcl" data-step="1"
                                                                value="4" />
                                                        </div>
                                                    </div>
                                                    <!-- review-range-item end -->
                                                    <!-- review-range-item-->
                                                    <div class="review-range-item">
                                                        <div class="range-slider-title">Comfort</div>
                                                        <div class="range-slider-wrap">
                                                            <input type="text" class="rate-range" data-min="0"
                                                                data-max="5" name="rgcl" data-step="1"
                                                                value="1" />
                                                        </div>
                                                    </div>
                                                    <!-- review-range-item end -->
                                                    <!-- review-range-item-->
                                                    <div class="review-range-item">
                                                        <div class="range-slider-title">Staf</div>
                                                        <div class="range-slider-wrap">
                                                            <input type="text" class="rate-range" data-min="0"
                                                                data-max="5" name="rgcl" data-step="1"
                                                                value="5" />
                                                        </div>
                                                    </div>
                                                    <!-- review-range-item end -->
                                                    <!-- review-range-item-->
                                                    <div class="review-range-item">
                                                        <div class="range-slider-title">
                                                            Facilities
                                                        </div>
                                                        <div class="range-slider-wrap">
                                                            <input type="text" class="rate-range" data-min="0"
                                                                data-max="5" name="rgcl" data-step="1"
                                                                value="3" />
                                                        </div>
                                                    </div>
                                                    <!-- review-range-item end -->
                                                </div>
                                                <div class="review-total">
                                                    <span><input type="text" name="rg_total" data-form="AVG({rgcl})"
                                                            value="0" /></span>
                                                    <strong>Your Score</strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label><i class="fal fa-user"></i></label>
                                                    <input type="text" placeholder="Your Name *" value="" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label><i class="fal fa-envelope"></i> </label>
                                                    <input type="text" placeholder="Email Address*" value="" />
                                                </div>
                                            </div>
                                            <textarea cols="40" rows="3" placeholder="Your Review:"></textarea>
                                        </fieldset>
                                        @if (Auth::check())
                                            <button class="btn big-btn flat-btn float-btn color2-bg"
                                                style="margin-top: 30px">
                                                Submit Review <i class="fal fa-paper-plane"></i>
                                            </button>
                                        @else
                                            <div class="btn big-btn flat-btn float-btn color2-bg show-reg-form modal-open">
                                                <i class="fal fa-paper-plane"></i>Login to
                                                review
                                            </div>
                                        @endif

                                    </form>
                                </div>
                                <!-- Add Review Box / End -->
                            </div>
                            <!-- list-single-main-item end -->
                        </div>
                    </div>
                    <!--   datails end  -->
                    <!--   sidebar  -->
                    <div class="col-md-4">
                        <!--box-widget-wrap -->
                        <div class="box-widget-wrap">
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget counter-widget" data-countDate="09/12/2024">
                                    <div class="banner-wdget fl-wrap">
                                        <div class="overlay"></div>
                                        <div class="bg" data-bg="{{ asset('client/images/bg/10.jpg') }}"></div>
                                        <div class="banner-wdget-content fl-wrap">
                                            <h4>
                                                Get a discount <span>20%</span> when ordering a
                                                room from three days.
                                            </h4>
                                            <div class="countdown fl-wrap">
                                                <div class="countdown-item">
                                                    <span class="days rot">00</span>
                                                    <p>days</p>
                                                </div>
                                                <div class="countdown-item">
                                                    <span class="hours rot">00</span>
                                                    <p>hours</p>
                                                </div>
                                                <div class="countdown-item">
                                                    <span class="minutes rot">00</span>
                                                    <p>minutes</p>
                                                </div>
                                                <div class="countdown-item">
                                                    <span class="seconds rot">00</span>
                                                    <p>seconds</p>
                                                </div>
                                            </div>

                                            <a href="#sec4" class="scroll-link">Book Now</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget">
                                    <div class="box-widget-content">
                                        <div class="box-widget-item-header">
                                            <h3>Contact Information</h3>
                                        </div>
                                        <div class="box-widget-list">
                                            <ul>
                                                <li>
                                                    <span><i class="fal fa-map-marker"></i> Adress
                                                        :</span>
                                                    <a href="#">{{ $hotels->address }}</a>
                                                </li>
                                                <li>
                                                    <span><i class="fal fa-phone"></i> Phone :</span>
                                                    <a href="#">{{ $hotels->hotline }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="list-widget-social">
                                            <ul>
                                                <li>
                                                    <a href="#" target="_blank"><i
                                                            class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank"><i class="fab fa-vk"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank"><i
                                                            class="fab fa-instagram"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap">
                                <div id="weather-widget" class="gradient-bg ideaboxWeather"
                                    data-city="{{ $wether->location_name }}">
                                </div>
                            </div>
                            <script>
                                let name_city = $('#weather-widget').data('city');
                                let name_parts = name_city.split(' ');
                                let name = name_parts[0] + ' ' + name_parts[1];

                                $('#weather-widget').attr('data-city', name);
                            </script>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            {{-- <div class="box-widget-item fl-wrap">
                                <div class="box-widget widget-posts">
                                    <div class="box-widget-content">
                                        <div class="box-widget-item-header">
                                            <h3>Recommended Attractions</h3>
                                        </div>
                                        <!--box-image-widget-->
                                        <div class="box-image-widget">
                                            <div class="box-image-widget-media">
                                                <img src="{{ asset('client/images/all/4.jpg') }}" alt="" />
                                                <a href="#" class="color2-bg" target="_blank">Details</a>
                                            </div>
                                            <div class="box-image-widget-details">
                                                <h4>Times Square <span>2.3 km</span></h4>
                                                <p>
                                                    It?s impossible to miss the colossal billboards,
                                                    glitzy lights and massive crowds that make this
                                                    intersection the city?s beating heart.
                                                </p>
                                            </div>
                                        </div>
                                        <!--box-image-widget end -->
                                        <!--box-image-widget-->
                                        <div class="box-image-widget">
                                            <div class="box-image-widget-media">
                                                <img src="{{ asset('client/images/all/5.jpg') }}" alt="" />
                                                <a href="#" class="color2-bg" target="_blank">Details</a>
                                            </div>
                                            <div class="box-image-widget-details">
                                                <h4>Broadway<span>1.7 km</span></h4>
                                                <p>
                                                    Tap your feet to catchy ditties, hold back tears
                                                    or bust your gut laughing at a world renowned
                                                    Broadway performance.
                                                </p>
                                            </div>
                                        </div>
                                        <!--box-image-widget end -->
                                        <!--box-image-widget-->
                                        <div class="box-image-widget">
                                            <div class="box-image-widget-media">
                                                <img src="{{ asset('client/images/all/6.jpg') }}" alt="" />
                                                <a href="#" class="color2-bg" target="_blank">Details</a>
                                            </div>
                                            <div class="box-image-widget-details">
                                                <h4>Grand Central Station<span>0.7 km</span></h4>
                                                <p>
                                                    With its elegantly designed main concourse, this
                                                    rail station is much more than just a massive
                                                    transport hub.
                                                </p>
                                            </div>
                                        </div>
                                        <!--box-image-widget end -->
                                    </div>
                                </div>
                            </div> --}}
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            {{-- <div class="box-widget-item fl-wrap">
                                <div class="box-widget">
                                    <div class="box-widget-content">
                                        <div class="box-widget-item-header">
                                            <h3>Similar Listings</h3>
                                        </div>
                                        <div class="widget-posts fl-wrap">
                                            <ul>
                                                <li class="clearfix">
                                                    <a href="#" class="widget-posts-img"><img
                                                            src="{{ asset('client/images/gal/3.jpg') }}" class="respimg"
                                                            alt="" /></a>
                                                    <div class="widget-posts-descr">
                                                        <a href="#" title="">Park Central</a>
                                                        <div class="listing-rating card-popup-rainingvis"
                                                            data-starrating2="5"></div>
                                                        <div class="geodir-category-location fl-wrap">
                                                            <a href="#"><i class="fas fa-map-marker-alt"></i> 40
                                                                JOURNAL SQUARE PLAZA, NJ, US</a>
                                                        </div>
                                                        <span class="rooms-price">$80 <strong> / Awg</strong></span>
                                                    </div>
                                                </li>
                                                <li class="clearfix">
                                                    <a href="#" class="widget-posts-img"><img
                                                            src="{{ asset('client/images/gal/1.jpg') }}" class="respimg"
                                                            alt="" /></a>
                                                    <div class="widget-posts-descr">
                                                        <a href="#" title="">Holiday Home</a>
                                                        <div class="listing-rating card-popup-rainingvis"
                                                            data-starrating2="3"></div>
                                                        <div class="geodir-category-location fl-wrap">
                                                            <a href="#"><i class="fas fa-map-marker-alt"></i> 75
                                                                PRINCE ST, NY, USA</a>
                                                        </div>
                                                        <span class="rooms-price">$50 <strong> / Awg</strong></span>
                                                    </div>
                                                </li>
                                                <li class="clearfix">
                                                    <a href="#" class="widget-posts-img"><img
                                                            src="{{ asset('client/images/gal/2.jpg') }}" class="respimg"
                                                            alt="" /></a>
                                                    <div class="widget-posts-descr">
                                                        <a href="#" title="">Moonlight Hotel</a>
                                                        <div class="listing-rating card-popup-rainingvis"
                                                            data-starrating2="4"></div>
                                                        <div class="geodir-category-location fl-wrap">
                                                            <a href="#"><i class="fas fa-map-marker-alt"></i> 70
                                                                BRIGHT ST NEW YORK, USA</a>
                                                        </div>
                                                        <span class="rooms-price">$105 <strong> / Awg</strong></span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <a class="widget-posts-link" href="#">See All Listing
                                                <i class="fal fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!--box-widget-item end -->
                        </div>
                        <!--box-widget-wrap end -->
                    </div>
                    <!--   sidebar end  -->
                </div>
                <!--   row end  -->
            </div>
            <!--   container  end  -->
        </section>
        <!--  section  end-->
    </div>
    <!-- content end-->
    <div class="limit-box fl-wrap"></div>
    <div class="bmw-overlay"></div>
    <!--booking-modal-wrap end -->
    <a class="to-top"><i class="fas fa-caret-up"></i></a>
    <!--ajax-modal-container-->
    <div class="ajax-modal-overlay"></div>
    <div class="ajax-modal-container">
        <!--ajax-modal -->
        <div class="ajax-loader">
            <div class="ajax-loader-cirle"></div>
        </div>
        <div id="ajax-modal" class="fl-wrap h-100; over-flow-y:scroll;"></div>
        <!--ajax-modal-container end -->
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".scroll-link").click(function(event) {
                event.preventDefault();
                var target = $(this).attr("href");
                var $target = $(target);
                if ($target.length) {
                    $("html, body").animate({
                        scrollTop: $target.offset().top
                    }, 200);
                }
            });
        });
    </script>


    <!--ajax-modal-container end -->
@endsection
