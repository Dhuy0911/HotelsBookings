<!--ajax-modal-wrap -->
<div style="margin-top: 110px" class="ajax-modal-wrap fl-wrap h-100">
    <div class="ajax-modal-close"><i class="fal fa-times"></i></div>
    <!--ajax-modal-item-->
    <div class="ajax-modal-item">
        <div class="ajax-modal-media fl-wrap">
            @php
                $isFirstImage = true;
                $dynamicPath = [];
                
                foreach ($room_image as $image) {
                    if ($room->id == $image->rooms_id) {
                        if ($isFirstImage) {
                            echo '<img src="' . asset('image/rooms/' . $image->image) . '" alt="" />';
                            $isFirstImage = false;
                        }
                
                        $dynamicPath[] = ['src' => asset('image/rooms/' . $image->image)];
                    }
                }
                
                $dynamicPathJson = json_encode($dynamicPath);
            @endphp

            <div class="ajax-modal-title">
                <div class="section-title-separator"><span></span></div>
                {{ $room->name }}
            </div>
            <div class="ajax-modal-photos-btn dynamic-gal" data-dynamicPath="{{ $dynamicPathJson }}">
                Photos (<span>{{ count($dynamicPath) }}</span>)</div>
        </div>
        <div class="ajax-modal-list fl-wrap">
            <ul>
                <li>
                    <i class="fal fa-user-alt"></i>
                    <h5><span>{{ $room->persons }}</span> Persons</h5>
                </li>
                <li>
                    <i class="fal fa-chalkboard"></i>
                    <h5><span>{{ $room->acreage }}</span> m²</h5>
                </li>
                <li>
                    <i class="fal fa-bed"></i>
                    <h5><span>{{ $room_bed_type->quantity }} {{ $room_bed_type->bed_name }}</span></h5>
                </li>
                <li>
                    <i class="fal fa-hand-holding-usd"></i>
                    <h5><span>{{ number_format($room->price, 0, ' ', '.') }} VND</span> / Night</h5>
                </li>
            </ul>
        </div>
        <div class="ajax-modal-details fl-wrap">
            <!--ajax-modal-details-box-->
            {{-- <div class="ajax-modal-details-box">
                <h3>Details</h3>
                <p>{{ $room->description }}</p>
            </div> --}}
            <!--ajax-modal-details-box end-->
            <!--ajax-modal-details-box-->
            <div class="ajax-modal-details-box">
                <h3>Room services</h3>
                <div class="listing-features fl-wrap">
                    <ul>
                        @foreach ($services as $item)
                            <li><i class="{{ $item->description }}"></i>{{ $item->name }}</li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <!--ajax-modal-details-box end-->
            @if (Auth::check())
                @if (Auth::user()->id != $hotels->user_id)
                    <a href="{{ route('hotels.rooms.bookings.book', ['hotelId' => $hotels->id, 'roomId' => $room->id]) }}"
                        class="btn book-btn float-btn color2-bg">Book Now<i class="fas fa-caret-right"></i></a>
                @else
                    <a href="{{ route('hotels.roomlist.edit', ['id' => $room->id]) }}"
                        class="btn float-btn color3-bg">Edit
                        room<i class="fas fa-caret-right"></i></a>
                @endif
            @else
                <div class="btn float-btn color2-bg show-reg-form modal-open  ">
                    <i class="fas fa-caret-right"></i>Book Now
                </div>
            @endif

        </div>
    </div>
    <!--ajax-modal-item-->
</div>
<script>
    $(document).ready(function() {
        $('.book-btn').click(function(e) {
            if (!localStorage.getItem('header-search')) {
                e.preventDefault();
                $('.booking-modal-wrap').css('display', 'block');
                $('.bmw-overlay').css('display', 'block');
            }

        })
        $('.show-reg-form.modal-open').click(function(e) {
            e.preventDefault();
            $('.main-register-wrap.modal').css('display', 'block');
            $('.reg-overlay').css('display', 'block');
        })
    })
</script>
<!--ajax-modal-wrap end -->
