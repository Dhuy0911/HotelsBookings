@extends('modules.client.dashboard')
@section('title', 'My Hotels')
@section('hotels')
    <!-- section-->
    <section class="middle-padding">
        <div class="container">
            <!--dasboard-wrap-->
            <div class="dasboard-wrap fl-wrap">
                <!-- dashboard-content-->
                <div class="dashboard-content fl-wrap">
                    <div class="dashboard-list-box fl-wrap">
                        @if ($hotels->isEmpty())
                            <section class="parallax-section" data-scrollax-parent="true">
                                <div class="bg" data-bg="{{ asset('client/images/bg/14.jpg') }}"
                                    data-scrollax="properties: { translateY: '100px' }"></div>
                                <div class="overlay"></div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <!-- column text-->
                                            <div class="colomn-text fl-wrap">
                                                @if (Auth::user()->level != 2)
                                                    <div @if ($status == 2) style="display:none;" @endif
                                                        class="colomn-text-title">
                                                        <h3>The owner of the hotel or business ?</h3>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                            Maecenas in pulvinar neque. Nulla finibus lobortis
                                                            pulvinar.
                                                        </p>
                                                        <span><a class="reg-owner btn color-bg float-btn"
                                                                href="">Register owner<i
                                                                    class="fal fa-plus"></i></a></span>

                                                    </div>
                                                    @if ($status == 2)
                                                        <div class="colomn-text-title">
                                                            <h3> Request for business owner
                                                                registration is being reviewed.</h3>
                                                            <p> Please wait for confirmation.<br>
                                                                If you need assistance, please contact the administrator
                                                                at admin@gmail.com.</p>
                                                        </div>
                                                    @endif
                                                @else
                                                    @if ($status == 1 && $hotels->empty())
                                                        <div class="colomn-text-title">
                                                            <h3>Your request was accepted, please add your hotels</h3>

                                                            <span><a class="btn color-bg float-btn"
                                                                    href="{{ route('hotels.create') }}">Add your hotels<i
                                                                        class="fal fa-plus"></i></a></span>
                                                        </div>
                                                    @endif

                                                @endif

                                            </div>
                                            <!--column text   end-->
                                        </div>
                                    </div>
                                </div>
                            </section>

                        @endif



                        {{-- @if ($status == 2)
                                <h1 style="font-size: 16px"> Request for business owner registration is being reviewed.
                                    Please wait for confirmation.<br>
                                    If you need assistance, please contact the administrator at admin@gmail.com.</h1>
                            @endif
                        @else
                            @if ($status === 1 && empty($hotels))
                                <div>
                                    <h1 class="" onclick="location.href='{{ route('hotels.create') }}'"
                                        style="font-size: 16px; cursor: pointer">
                                        <span>Add Your Hotel</span>
                                    </h1>
                                </div>
                            @endif
                        @endif --}}



                        <script>
                            $(document).ready(function() {
                                $('.reg-owner').click(function(e) {
                                    e.preventDefault();
                                    $('.main-register-owner-wrap,.reg-overlay').fadeIn(200);
                                    $("body").addClass("hid-body");
                                })
                            })
                        </script>
                        <!-- dashboard-list  -->

                      
                        <div @if ($hotels->isEmpty())
                            style="display:none;"
                        @endif class="dashboard-header fl-wrap">
                            <h3>Your Hotels</h3>
                        </div>
                        @foreach ($hotels as $item)
                            <div class="dashboard-list">
                                <div class="dashboard-message">
                                    <div class="dashboard-listing-table-image">
                                        <a href="{{ route('hotels.info', ['id' => $item->id]) }}">

                                            <img src="{{ asset('image/hotels/' . $item->main_image) }}" alt="">
                                        
                                        </a>
                                    </div>
                                    <div class="dashboard-listing-table-text">
                                        <h4><a
                                                href="{{ route('hotels.info', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                        </h4>
                                        <span class="dashboard-listing-table-address"><i class="far fa-map-marker"></i><a
                                                href="#">{{ $item->address }}</a></span>
                                        <ul class="dashboard-listing-table-opt  fl-wrap">
                                            <li><a href="{{ route('hotels.edit', ['id' => $item->id]) }}">Edit <i
                                                        class="fal fa-edit"></i></a></li>
                                            <li><a href="{{ route('hotels.remove', ['id' => $item->id]) }}" class="del-btn"
                                                    onclick="return confirm('Are you sure you want to delete this hotel?')">Delete
                                                    <i class="fal fa-trash-alt"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- dashboard-list end-->
                    </div>
                    <!-- pagination-->

                </div>
                <!-- dashboard-list-box end-->
            </div>
            <!-- dasboard-wrap end-->
        </div>
    </section>
    <div class="limit-box fl-wrap"></div>


@endsection
@section('active-1')
    user-profile-act
@endsection
