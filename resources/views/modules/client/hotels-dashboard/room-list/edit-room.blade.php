@extends('modules.client.dashboard')
@section('title', 'Edit rooms ')
@section('room-list')
    <section class="middle-padding">
        <div class="container">
            <!--dasboard-wrap-->
            <div class="dasboard-wrap fl-wrap">
                <!-- dashboard-content-->
                <div class="dashboard-content fl-wrap">
                    <div class="dashboard-list-box fl-wrap">
                        <div class="dashboard-header fl-wrap">
                            <h3>Room Lists</h3>
                        </div>
                        <div class="dashboard-list">
                            {{-- <div>
                                <span class="add-button add-room-btn color-bg">Add Room + </span>
                            </div> --}}
                            <form action="{{ route('hotels.roomlist.update', ['id' => $rooms->id]) }}"
                                enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="profile-edit-container addroomform">
                                    <div class="custom-form">
                                        <div class="room-add-item">
                                            <label>Room Name <i class="fal fa-warehouse-alt"></i></label>
                                            <input type="text" name="name" placeholder="Room Name"
                                                value="{{ old('name', $rooms->name) }}" />
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Price <i class="fal fa-dollar-sign"></i></label>
                                                    <input type="text" name="price" placeholder="VND"
                                                        value="{{ old('price', $rooms->price) }}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Guest <i class="fal fa-briefcase"></i></label>
                                                    <input type="text" name="persons" placeholder=" Number of guests"
                                                        value="{{ old('persons', $rooms->persons) }}" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Acreage <i class="fal fa-dollar-sign"></i></label>
                                                    <input type="text" name="acreage" placeholder="Square feet"
                                                        value="{{ old('acreage', $rooms->acreage) }}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="bedtypes">
                                                                <label>Bed type<i class="fal fa-briefcase"></i></label>
                                                                <select name="bed_type_id"
                                                                    class="chosen-select no-search-select">
                                                                    <option value="" selected>Choose bed type
                                                                    </option>
                                                                    @foreach ($bed_types as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $item->id == old('bed_type_id', $room_bed_type->bed_type_id) ? 'selected' : '' }}>
                                                                            {{ $item->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <label>Quantity</label>
                                                            <div class="quantity">
                                                                <input step="1" min="1" type="number"
                                                                    name="quantity"
                                                                    value="{{ old('quantity', $room_bed_type->quantity) }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <label>Room Details</label>
                                            <textarea cols="40" rows="3" name="description" placeholder="Details"></textarea>
                                            <div class="profile-edit-container" style="margin-top:30px">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Gallery</label>
                                                        <div class="add-list-media-wrap">
                                                            <div class="fuzone">
                                                                <div class="fu-text">
                                                                    <span><i class="far fa-cloud-upload-alt"></i> Click
                                                                        here
                                                                        or
                                                                        drop
                                                                        files to upload</span>
                                                                    <div class="photoUpload-files fl-wrap"></div>
                                                                </div>
                                                                <input type="file" multiple name="image[]"
                                                                    class="upload">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <!-- Checkboxes -->
                                                        <label>Room Services</label>

                                                        <ul class="fl-wrap filter-tags" style="margin-top:24px">
                                                            @foreach ($services as $item)
                                                                <li>
                                                                    <input id="check-dd51" type="checkbox"
                                                                        value="{{ $item->id }}"
                                                                        @if (in_array($item->id, $room_services)) checked @endif
                                                                        name="service[]">
                                                                    <label for="check-dd51">{{ $item->name }}</label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <!-- Checkboxes end -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" style="border: none" class="add-button save-room-btn color-bg">
                                        Save</button>
                                </div>
                                <!-- profile-edit-container end-->
                            </form>
                            <span class="fw-separator"></span>

                            <div id="rooms-container">
                                {{-- @if (count($rooms) == 0)
                                    <h1 class="title">You not have room in hotels, click add room</h1>
                                @else
                                    @foreach ($rooms as $item)
                                        @if (!in_array($item->id, $tempArr))
                                            <div class="rooms-item fl-wrap">
                                                <div class="rooms-media">
                                                    @foreach ($room_image as $image)
                                                        @if ($item->id == $image->rooms_id)
                                                            <img src="{{ asset('image/rooms/' . $image->image) }}"
                                                                alt="" />
                                                            <div class="dynamic-gal more-photos-button"
                                                                data-dynamicPath="[{'src': '{{ asset('client/images/gal/slider/1.jpg') }}'}, {'src': '{{ asset('client/images/gal/slider/2.jpg') }}'},{'src': '{{ asset('client/images/gal/slider/3.jpg') }}'}]">
                                                                View Gallery <span>3 photos</span>
                                                                <i class="far fa-long-arrow-right"></i>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="rooms-details">
                                                    <div class="rooms-details-header fl-wrap">
                                                        <span class="rooms-price">
                                                            <td>{{ number_format($item->price, 0, ' ', '.') }} VND</td>
                                                            <strong> / night</strong>
                                                        </span>
                                                        <a href="{{ route('hotels.rooms.index', ['hotelId' => implode($hotelsId), 'roomId' => $item->id]) }}"
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
                                                    </div>
                                                    <div class="btn-group">
                                                        @if ($item->status == 1)
                                                            <a class="btn-success btn-sm dropdown-toggle" type="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Available
                                                            </a>
                                                        @else
                                                            <a class="btn-danger btn-sm dropdown-toggle" type="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">Not
                                                                Available
                                                            </a>
                                                        @endif

                                                        <ul class="dropdown-menu">
                                                            @if ($item->status == 1)
                                                                <li>
                                                                    <a class="dropdown-item status-toggle" href="#"
                                                                        data-room-id="{{ $item->id }}"
                                                                        data-status="2">Not Available</a>
                                                                </li>
                                                            @else
                                                                <li>
                                                                    <a class="dropdown-item status-toggle" href="#"
                                                                        data-room-id="{{ $item->id }}"
                                                                        data-status="1">Available</a>
                                                                </li>
                                                            @endif

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  rooms-item -->
                                            @php
                                                array_push($tempArr, $item->id);
                                            @endphp
                                        @endif
                                        <!--  rooms-item end -->
                                    @endforeach
                                @endif --}}

                            </div>
                            <!-- profile-edit-container-->
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('.status-toggle').on('click', function(e) {
                                    e.preventDefault();
                                    var button = $(this);
                                    var roomId = button.data('room-id');
                                    var status = button.data('status');

                                    updateStatus(roomId, status);

                                    function updateStatus(roomId, status) {
                                        $.ajax({
                                            url: '/hotels/roomlist/rooms/' + roomId + '/' + status,
                                            type: 'POST',
                                            data: {
                                                status: status,
                                                _token: '{{ csrf_token() }}'
                                            },
                                            success: function(response) {
                                                // Cập nhật thành công, thực hiện các hành động khác (nếu cần)
                                                if (status == 1) {
                                                    button.removeClass('btn-danger').addClass('btn-success').text(
                                                        'Available');
                                                } else {
                                                    button.removeClass('btn-success').addClass('btn-danger').text(
                                                        'Not Available');
                                                }
                                                console.log(response.message);
                                            },
                                            error: function(xhr, status, error) {
                                                // Xử lý lỗi (nếu có)
                                                console.error(error);
                                            }
                                        });
                                    }
                                });
                            });
                        </script>
                        <!-- dashboard-list end-->
                    </div>
                    <!-- pagination-->
                    <div class="pagination">
                        <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                        <a href="#"class="current-page">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                    </div>
                </div>
                <!-- dashboard-list-box end-->
            </div>
            <!-- dasboard-wrap end-->
        </div>
    </section>
    <script>
        $(document).ready(function() {
            let roomContainer = $('#rooms-container'),
                addRoomBtn = $('.add-room-btn');
            addRoomBtn.click(function() {

                $('.addroomform').toggle();
                $('h1.title').toggle();

            });
        })
    </script>

@endsection
@section('active-2')
    user-profile-act
@endsection
