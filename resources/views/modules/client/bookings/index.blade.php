@extends('layout.master')
@section('title', 'Bookings Hotels')
@section('content')
    <!-- content-->
    <div class="content">
        <div class="breadcrumbs-fs fl-wrap">
            <div class="container">
                <div class="breadcrumbs fl-wrap"><a href="#">Home</a><a href="#">Pages</a><span>Booking
                        Page</span></div>
            </div>
        </div>
        <section class="middle-padding gre y-blue-bg">
            <div class="container">
                <div class="list-main-wrap-title single-main-wrap-title fl-wrap">
                    <h2>Booking form for : <span>{{ $hotels->name }}</span></h2>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="bookiing-form-wrap">
                            <ul id="progressbar">
                                <li class="active"><span>01.</span>Personal Info</li>
                                <li><span>02.</span>Billing Address</li>
                                <li><span>03.</span>Payment Method</li>
                                <li><span>04.</span>Confirm</li>
                            </ul>
                            <!--   list-single-main-item -->
                            <div class="list-single-main-item fl-wrap hidden-section tr-sec">
                                <div class="profile-edit-container">
                                    <div class="custom-form">
                                        <form role="form" name="reservation" method="POST"
                                            action="{{ route('hotels.rooms.bookings.create') }}">
                                            @csrf
                                            <fieldset class="fl-wrap book_mdf">
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Your personal Information</h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Full Name <i class="far fa-user"></i></label>
                                                        <input type="text" name="fullname" placeholder="Your Name"
                                                            value="{{ $user->name }}" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Email Address<i class="far fa-envelope"></i> </label>
                                                        <input type="text" name="email"
                                                            placeholder="yourmail@domain.com" value="{{ $user->email }}" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Notes</label>
                                                        <textarea placeholder="Write something for your notes" name="message" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Phone<i class="far fa-phone"></i> </label>
                                                        <input type="text" name="phone" value="{{ $user->phone }}" />
                                                    </div>

                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-sm-6">
                                                        <label>Who are you booking for?</label>
                                                        <div>
                                                            <label>
                                                                <input checked name="booking-for" value="myself"
                                                                    type="radio">
                                                                I'm booking for myself
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <label>
                                                                <input name="booking-for" value="someone" type="radio">
                                                                I'm booking for someone
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <span class="fw-separator"></span>
                                                <a href="#"
                                                    class="next-form action-button btn no-shdow-btn color-bg">Billing
                                                    Address <i class="fal fa-angle-right"></i></a>
                                            </fieldset>
                                            <fieldset class="fl-wrap book_mdf">
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Billing Address</h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>City <i class="fal fa-globe-asia"></i></label>
                                                        <input type="text" placeholder="Your city" value="" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Country </label>
                                                        <div class="listsearch-input-item ">
                                                            <select data-placeholder="Your Country"
                                                                class="chosen-select no-search-select">
                                                                <option>United states</option>
                                                                <option>Asia</option>
                                                                <option>Australia</option>
                                                                <option>Europe</option>
                                                                <option>South America</option>
                                                                <option>Africa</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label>Street <i class="fal fa-road"></i> </label>
                                                        <input type="text" placeholder="Your Street" value="" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <label>State<i class="fal fa-street-view"></i></label>
                                                        <input type="text" placeholder="Your State" value="" />
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Postal code<i class="fal fa-barcode"></i> </label>
                                                        <input type="text" placeholder="123456" value="" />
                                                    </div>
                                                </div>
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Addtional Notes</h3>
                                                </div>
                                                <textarea cols="40" rows="3" placeholder="Notes"></textarea>
                                                <span class="fw-separator"></span>
                                                <a href="#"
                                                    class="previous-form action-button back-form   color-bg"><i
                                                        class="fal fa-angle-left"></i> Back</a>
                                                <a href="#"
                                                    class="next-form back-form action-button btn no-shdow-btn color-bg">Payment
                                                    Step <i class="fal fa-angle-right"></i></a>
                                            </fieldset>
                                            <fieldset class="fl-wrap book_mdf">
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Payment method</h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Cardholder's Name<i class="far fa-user"></i></label>
                                                        <input type="text" placeholder="" value="Adam Kowalsky" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Card Number <i class="fal fa-credit-card-front"></i></label>
                                                        <input type="text" placeholder="xxxx-xxxx-xxxx-xxxx"
                                                            value="" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label>Expiry Month<i class="fal fa-calendar"></i></label>
                                                        <input type="text" placeholder="MM" value="" />
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Expiry Year<i class="fal fa-calendar"></i></label>
                                                        <input type="text" placeholder="YY" value="" />
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label>CVV / CVC *<i class="fal fa-credit-card"></i></label>
                                                        <input type="password" placeholder="***" value="" />
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p style="padding-top:20px;">*Three digits number on the back of
                                                            your card</p>
                                                    </div>
                                                </div>
                                                <div class="log-separator fl-wrap"><span>or</span></div>
                                                <div class="soc-log fl-wrap">
                                                    <p>Select Other Payment Method</p>
                                                    <a href="{{ route('processTransaction') }}" class="paypal-log"><i
                                                            class="fab fa-paypal"></i>Pay
                                                        With Paypal</a>
                                                </div>
                                                <span class="fw-separator"></span>
                                                <a href="#"
                                                    class="previous-form back-form action-button color-bg"><i
                                                        class="fal fa-angle-left"></i> Back</a>
                                                <button type="submit"
                                                    class=" action-button btn color2-bg no-shdow-btn">Confirm and
                                                    Pay<i class="fal fa-angle-right"></i></button>
                                            </fieldset>
                                            <fieldset class="fl-wrap book_mdf">
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Confirmation</h3>
                                                </div>
                                                <div class="success-table-container">
                                                    <div class="success-table-header fl-wrap">
                                                        <i class="fal fa-check-circle decsth"></i>
                                                        <h4>Thank you. Your reservation has been received.</h4>
                                                        <div class="clearfix"></div>
                                                        <p>Your payment has been processed successfully.</p>
                                                    </div>
                                                </div>
                                                <span class="fw-separator"></span>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--   list-single-main-item end -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-widget-item-header">
                            <h3> Your cart</h3>
                        </div>
                        <!--cart-details  -->
                        <div class="cart-details fl-wrap">
                            <!--cart-details_header-->
                            <div class="cart-details_header">
                                <a href="#" class="widget-posts-img"><img
                                        src="{{ asset('image/hotels/' . $hotels->main_image) }}" class="respimg"
                                        alt=""></a>
                                <div class="widget-posts-descr">
                                    <a href="#" title="">{{ $hotels->name }}</a>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                    <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                class="fas fa-map-marker-alt"></i> {{ $hotels->address }}</a>
                                    </div>
                                </div>
                            </div>
                            <!--cart-details_header end-->
                            <!--ccart-details_text-->
                            <div class="cart-details_text">
                                <ul class="cart_list">
                                    <li>Room Type <span name="room_id">{{ $rooms->name }}
                                        </span></li>
                                    <li>Check in date <span name="check_in_date"></span></li>
                                    <li>Check out date <span name="check_out_date"></span></li>
                                    <li>Price
                                        <span class="rooms_price">{{ number_format($rooms->price, 0, ' ', '.') }}
                                            VND
                                            <strong> / night</strong></span>
                                    </li>

                                    <li>Total nights<span name="total-nights"></span></li>
                                    <li>Room booked<span name="no_rooms"></span></li>

                                    <li>Adults <span name="adult"></span></li>
                                    <li>Childs <span name="kids">
                                            <strong>-10%</strong></span></li>

                                    <li>Taxes And Fees <span><strong>10%</strong></span></li>
                                </ul>
                            </div>
                            <!--cart-details_text end -->
                        </div>
                        <!--cart-details end -->
                        <!--cart-total -->
                        <div class="cart-total">
                            <span class="cart-total_item_title">Total Cost</span>
                            <strong name="total_price" class="total"> VND</strong>
                        </div>
                        <!--cart-total end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->
    </div>
    <script>
        // Thông tin phòng giá tiền bookings
        $(document).ready(function() {
            let search = JSON.parse(localStorage.getItem('header-search'));
            let dateIn = search.checkInDate;
            let dateOut = search.checkOutDate;
            let room = search.no_rooms;
            let adult = search.adult;
            let kids = search.kids;

            checkInDate = new Date(dateIn);
            checkOutDate = new Date(dateOut);
            let str = $('span.rooms_price').text();
            let price = parseFloat(str); // Chuyển đổi chuỗi thành số thực
            price = Math.round(price *
                1000); // Nhân với 1000 để chuyển đổi sang đơn vị VND và làm tròn


            let formattedDateIn = checkInDate.toLocaleDateString('en-GB');
            let formattedDateOut = checkOutDate.toLocaleDateString('en-GB');
            let timeDiff = checkOutDate.getTime() - checkInDate.getTime();
            let diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            let total = diffDays * price;
            total = total + (total * 0.1);
            total = total * 1000;
            $('span[name="check_in_date"]').text(formattedDateIn);
            $('span[name="check_out_date"]').text(formattedDateOut);
            $('span[name="total-nights"]').text(diffDays);
            $('span[name="no_rooms"]').text(room);
            $('span[name="adult"]').text(adult);
            $('span[name="kids"]').text(kids);
            $('strong[name="total_price"]').text(' ' + total.toLocaleString(
                'vi-VN') + ' VND');


            // Thông tin người bookings

            $('input[name="booking-for"]').on('change', function() {
                let value = $(this).val();
                let form = $(this).closest('form');
                let name = form.find('input[name="fullname"]').val();
                let email = form.find('input[name="email"]').val();
                let phone = form.find('input[name="phone"]').val();
                if (value == "someone") {
                    form.find('input[name="fullname"]').val('').attr('placeholder', 'Guest name');
                    form.find('input[name="email"]').val('').attr('placeholder', 'guestemail@domain.com');
                    form.find('input[name="phone"]').val('').attr('placeholder', 'Guest phone number');

                } else if (value == "myself") {
                    form.find('input[name="fullname"]').val(name);
                    form.find('input[name="email"]').val(email);
                    form.find('input[name="phone"]').val(phone);

                }

            })
            //end

            // khi submit form
            $('form').submit(function(e) {
                e.preventDefault();
                console.log();
                // Lấy giá trị của span
                let dateIn = $('span[name="check_in_date"]').text(),
                    dateOut = $('span[name="check_out_date"]').text(),
                    form = $(this),
                    url = form.attr('action'),
                    formData = new FormData(form[0]);
                formData.append('check_in_date', JSON.stringify(checkInDate));
                formData.append('check_out_date', JSON.stringify(checkOutDate));
                formData.append('total_price', JSON.stringify(parseInt(total)));
                formData.append('adult', JSON.stringify(parseInt(adult)));
                formData.append('kids', JSON.stringify(parseInt(kids)));
                formData.append('no_rooms', JSON.stringify(parseInt(room)));

                let windowUrl = window.location.href,
                    windowUrlArr = windowUrl.split('/'),
                    roomId = windowUrlArr[windowUrlArr.length - 1],
                    hotelId = windowUrlArr[windowUrlArr.length - 2];

                formData.append('room_id', JSON.stringify(parseInt(roomId)));
                formData.append('hotels_id', JSON.stringify(parseInt(hotelId)));



                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log('Giá trị đã được lưu vào cơ sở dữ liệu');
                        window.location.href = "{{ route('dashboard.mybookings.bookings') }}";
                    },
                    error: function(xhr, status, error) {
                        console.log('Lỗi khi gửi giá trị lên server' + error);
                    }
                })
            })

        });
        // end
    </script>
    <!-- content end-->
@endsection
