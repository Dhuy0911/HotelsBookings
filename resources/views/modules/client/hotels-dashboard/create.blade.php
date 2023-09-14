@extends('modules.client.dashboard')
@section('title', 'Add Hotels')
@section('hotels')
    <section class="middle-padding">
        <div class="container">
            <form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!--dasboard-wrap-->
                <div class="dasboard-wrap fl-wrap">
                    <!-- dashboard-content-->
                    <div class="dashboard-content fl-wrap">
                        <div class="box-widget-item-header">
                            <h3> Basic Informations</h3>
                        </div>
                        <!-- profile-edit-container-->
                        <div class="profile-edit-container">
                            <div class="custom-form">
                                <label>Hotel Name <span>*</span> <i class="fal fa-briefcase"></i></label>
                                <input name="name" type="text" placeholder="Hotel Name" value="{{ old('name') }}" />
                            </div>
                            <div class="custom-form">
                                <label>Property Type <span>*</span></label>
                                <select data-placeholder="City" name="place_type_id" class="chosen-select no-search-select">
                                    <option value="" selected>Choose type </option>
                                    @foreach ($placetypes as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- profile-edit-container end-->
                        <div class="box-widget-item-header">
                            <h3> Location / Contacts</h3>
                        </div>
                        <!-- profile-edit-container-->
                        <div class="profile-edit-container">
                            <div class="custom-form">
                                <label>Address <span>*</span><i class="fal fa-map-marker"></i></label>
                                <input name="address" type="text" value="{{ old('address') }}"
                                    placeholder="Address of your Hotel" />
                                <label>City / Location <span>*</span></label>
                                <div class="listsearch-input-item">
                                    <select data-placeholder="City" name="location_id"
                                        class="chosen-select no-search-select">
                                        <option value="" selected>Choose locations</option>
                                        @foreach ($locations as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label>Phone <span>*</span><i class="far fa-phone"></i> </label>
                                <input name="hotline" type="text" placeholder="Phone" value="{{ old('hotline') }}" />
                            </div>
                        </div>

                        <div class="box-widget-item-header">
                            <h3> Timings / Policies</h3>
                        </div>
                        <!-- profile-edit-container-->
                        <div class="profile-edit-container">
                            <div class="custom-form">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="add-list-media-wrap">
                                            <div class="custom-form">
                                                <label>Check in Time</label>
                                                <div class="row d-flex">
                                                    <div class="col-6">
                                                        <label>From</label>
                                                        <input type="time" name="checkin_time_from">
                                                    </div>
                                                    <div class="col-6">
                                                        <label>Until</label>
                                                        <input type="time" name="checkin_time_until">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="custom-form">
                                                <label>Check out Time</label>
                                                <div class="row d-flex">
                                                    <div class="col-6">
                                                        <label>From</label>
                                                        <input type="time" name="checkout_time_from">
                                                    </div>
                                                    <div class="col-6">
                                                        <label>Until</label>
                                                        <input type="time" name="checkout_time_until">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="custom-form">
                                                <label>Reception Time</label>
                                                <div class="row d-flex">
                                                    <div class="col-6">
                                                        <label>From</label>
                                                        <input type="time" name="reception_time_from">
                                                    </div>
                                                    <div class="col-6">
                                                        <label>Until</label>
                                                        <input type="time" name="reception_time_until">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="custom-form">
                                            <label>Rules <span>*</span></label>
                                            <div class="act-widget fl-wrap">
                                                @foreach ($policies as $item)
                                                    <div class="act-widget-header">
                                                        <h4>{{ $item->name }}</h4> 
                                                        <div class="onoffswitch">
                                                            <input value="{{ $item->id }}"
                                                                placeholder="{{ $item->name }}" type="checkbox"
                                                                name="policy_id[]" class="onoffswitch-checkbox"
                                                                id="myonoffswitch{{ $item->id }}">
                                                            <label class="onoffswitch-label"
                                                                for="myonoffswitch{{ $item->id }}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <label>More Rules</label>
                                            <input type="text" placeholder="Your Hotel Policy" />

                                        </div>
                                    </div>
                                    <script>
                                        // Lắng nghe sự kiện khi người dùng nhấp vào switch
                                        $('.onoffswitch-checkbox').on('change', function() {
                                            // Lấy giá trị checked (on/off)
                                            var isChecked = $(this).prop('checked');
                                            // Kiểm tra trạng thái của switch và thực hiện các hành động tương ứng
                                            if (isChecked) {
                                                // Switch được chọn (on)
                                                console.log('Switch is ON');
                                                // Lưu trạng thái vào cơ sở dữ liệu, gửi yêu cầu AJAX hoặc tương tự
                                            } else {
                                                // Switch không được chọn (off)
                                                console.log('Switch is OFF');
                                                // Lưu trạng thái vào cơ sở dữ liệu, gửi yêu cầu AJAX hoặc tương tự
                                            }
                                        });
                                    </script>
                                </div>
                                <!-- profile-edit-container end-->
                            </div>
                        </div>


                        <div class="box-widget-item-header mat-top">
                            <h3>Facilities</h3>
                        </div>
                        <!-- profile-edit-container-->
                        <div class="profile-edit-container">
                            <div class="custom-form">
                                <!-- Checkboxes -->
                                <ul class="fl-wrap filter-tags">
                                    @foreach ($facilities as $item)
                                        <li>
                                            <input name="facilities[]" value="{{ $item->id }}" id="check-dd5"
                                                type="checkbox">
                                            <label for="check-dd5">{{ $item->name }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- Checkboxes end -->
                            </div>
                        </div>
                        <!-- profile-edit-container end-->
                        <!-- profile-edit-container end-->
                        <div class="box-widget-item-header mat-top">
                            <h3>Details</h3>
                        </div>
                        <!-- profile-edit-container-->
                        <div class="row">
                            <div class="col-6">
                                <div class="add-list-media-wrap">
                                    <div class="custom-form">
                                        <label>Main Image <span>*</span></label>
                                        <div class="fuzone">
                                            <div class="fu-text">
                                                <span><i class="far fa-cloud-upload-alt"></i> Click here or drop
                                                    files to
                                                    upload</span>
                                                <div class="photoUpload-files fl-wrap"></div>
                                            </div>
                                            <input name="main_image" type="file" class="upload">
                                        </div>
                                    </div>
                                    <div class="custom-form">
                                        <label>Image <span>*</span></label>
                                        <div class="fuzone">
                                            <div class="fu-text">
                                                <span><i class="far fa-cloud-upload-alt"></i> Click here or drop
                                                    files to
                                                    upload</span>
                                                <div class="photoUpload-files fl-wrap"></div>
                                            </div>
                                            <input name="image[]" multiple type="file" class="upload">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="custom-form">
                                    <label>Text</label>
                                    <textarea name="content" cols="40" rows="3" placeholder="Details"></textarea>
                                </div>
                                <!-- profile-edit-container end-->
                            </div>

                        </div>

                        <!-- profile-edit-container end-->


                        {{-- <div class="box-widget-item-header mat-top">
                            <h3>Sidebar Widgets</h3>
                        </div>
                        <!-- profile-edit-container-->
                        <div class="profile-edit-container">
                            <div class="custom-form">
                                <!-- act-widget-->
                                <div class="act-widget fl-wrap">
                                    <div class="act-widget-header">
                                        <h4>1. Booking Form</h4>
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                                id="myonoffswitch" checked>
                                            <label class="onoffswitch-label" for="myonoffswitch">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- act-widget end-->
                                <!-- act-widget-->
                                <div class="act-widget fl-wrap">
                                    <div class="act-widget-header">
                                        <h4>2. Discount </h4>
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                                id="myonoffswitch2">
                                            <label class="onoffswitch-label" for="myonoffswitch2">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <label>Promo Date<i class="fal fa-calendar"></i></label>
                                    <input type="text" placeholder="Date Example : 09/12/2019" value="" />
                                    <label>Promo Text</label>
                                    <textarea cols="40" rows="3" placeholder="Banner Text" style="margin-bottom:20px;"></textarea>
                                </div>
                                <!-- act-widget end-->
                                <!-- act-widget-->
                                <div class="act-widget fl-wrap">
                                    <div class="act-widget-header">
                                        <h4>3. Weather</h4>
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                                id="myonoffswitch3" checked>
                                            <label class="onoffswitch-label" for="myonoffswitch3">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <label>City<i class="fab fa-mixcloud"></i></label>
                                    <input type="text" placeholder="City" value="" />
                                </div>
                                <!-- act-widget end-->
                            </div>
                        </div>
                        <!-- profile-edit-container end-->
                        <div class="box-widget-item-header mat-top">
                            <h3>Your Socials</h3>
                        </div>
                        <!-- profile-edit-container-->
                        <div class="profile-edit-container">
                            <div class="custom-form">
                                <label>Facebook <i class="fab fa-facebook"></i></label>
                                <input type="text" placeholder="https://www.facebook.com/" value="" />
                                <label>Twitter<i class="fab fa-twitter"></i> </label>
                                <input type="text" placeholder="https://twitter.com/" value="" />
                                <label>Vkontakte<i class="fab fa-vk"></i> </label>
                                <input type="text" placeholder="https://vk.com" value="" />
                                <label> Instagram <i class="fab fa-instagram"></i> </label>
                                <input type="text" placeholder="https://www.instagram.com/" value="" />
                                <button class="btn    color2-bg  float-btn">Send Listing<i
                                        class="fal fa-paper-plane"></i></button>
                            </div>
                        </div>
                        <!-- profile-edit-container end--> --}}
                    </div>
                    <!-- dashboard-list-box end-->
                    <button type="submit" class="btn color2-bg float-btn">Submit<i class="fal fa-save"></i></button>

                </div>
                <!-- dasboard-wrap end-->
            </form>
        </div>
    </section>
    <div class="limit-box fl-wrap"></div>
    <script>
        $(document).ready(function() {
            $('.addroomform').hide();
            let rooms = [];


            let roomContainer = $('#rooms-container'),
                addRoomBtn = $('.add-room-btn');
            addRoomBtn.click(function() {
                $('.addroomform').toggle(function() {});
            });
            $('span.save-room-btn').click(function() {
                $('.addroomform').hide();

                // Lấy thông tin của phòng từ các trường nhập liệu trong form create room
                var services = <?php echo json_encode($services); ?>,
                    roomName = $('input[name="rooms_name"]').val(),
                    roomDescription = $('textarea[name="description"]').val(),
                    roomPrice = $('input[name="rooms_price"]').val(),
                    roomPersons = $('input[name="persons"]').val(),
                    roomAcreage = $('input[name="acreage"]').val(),
                    roomBed = $('input[name="bed"]').val();

                // Tạo một mảng để lưu các giá trị được chọn
                let selectedServices = [],
                    newRoom = {
                        name: roomName,
                        price: roomPrice,
                        persons: roomPersons,
                        description: roomDescription,
                        services: selectedServices,
                        acreage: roomAcreage,
                        bed: roomBed,
                    };
                rooms.push(newRoom);

                // Lấy các giá trị được chọn và lưu vào mảng selectedServices
                $('input[name="service[]"]:checked').each(function() {
                    selectedServices.push($(this).val());
                });
                // Tạo HTML để hiển thị các giá trị được chọn
                let facilitiesHtml = '';
                selectedServices.forEach(function(serviceId) {
                    const service = services.find(s => s.id == serviceId);
                    facilitiesHtml += `
                 <li name="rooms-services[]">
                    <i class="${service.description}"></i>
                     <span>${service.name}</span>
                 </li> `;
                });

                // Thêm đối tượng card vào danh sách các phòng đã được tạo ra
                roomContainer.append(
                    `
                    <!--  rooms-item -->
                        <div class="rooms-item fl-wrap">
                          <div class="rooms-media">
                            <img src="{{ asset('client/images/gal/5.jpg"') }}' alt="" />
                            <div
                              class="dynamic-gal more-photos-button"
                              data-dynamicPath="[{'src': 'images/gal/slider/7.jpg'},{'src': 'images/gal/slider/4.jpg'}, {'src': 'images/gal/slider/5.jpg'},{'src': 'images/gal/slider/6.jpg'}]"
                            >
                              View Gallery <span>4 photos</span>
                              <i class="far fa-long-arrow-right"></i>
                            </div>
                          </div>
                          <div class="rooms-details">
                            <div class="rooms-details-header fl-wrap">
                                <span class="rooms-price"
                                >${roomPrice} <strong> / night</strong></span
                              >
                              <h3>${roomName}</h3>
                              <h5>Max Guests: <span>${roomPersons} persons</span></h5>
                            </div>
                            <p>
                                ${roomDescription}
                            </p>
                            <div class="facilities-list fl-wrap">
                              <ul>
                                ${facilitiesHtml}
                              </ul>
                            </div>
                          </div>
                        </div>
                        <!--  rooms-item end -->
                        `
                );
            });
            // $('form').submit(function(event) {
            //     event.preventDefault();
            //     $.ajax({
            //         type: 'POST',
            //         url: '/hotels/store',
            //         data: {
            //             _token: "{{ csrf_token() }}",
            //             // name: $('input[name="name"]').val(),
            //             // address: $('input[name="address"]').val(),
            //             // location_id: $('select[name="location_id"]').val(),
            //             // hotline: $('input[name="hotline"]').val(),
            //             // content: $('textarea[name="content"]').val(),
            //             // rooms: rooms,
            //         },
            //         success: function(data) {

            //         }
            //     });
            // });

        })
    </script>

@endsection
@section('active-1')
    user-profile-act
@endsection
