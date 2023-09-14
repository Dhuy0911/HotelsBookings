@extends('modules.client.dashboard')
@section('title', 'Bookings History')
@section('bookings')
    <section class="middle-padding">
        <div class="container">
            <!--dasboard-wrap-->
            <div class="dasboard-wrap fl-wrap">
                <!-- dashboard-content-->
                <div class="dashboard-content fl-wrap">
                    <div class="dashboard-list-box fl-wrap">
                        <div class="dashboard-header fl-wrap">
                            <h3>Bookings</h3>
                        </div>

                        @if ($bookings->isEmpty())
                            <div>
                                <img class="py-4" src="https://cdn6.agoda.net/images/MMB-3149/illustration-empty.png">
                            </div>
                            <div>
                                <h1 class="fs-4 py-4">You have no history bookings.</h1>
                            </div>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Hotel</th>
                                        <th>Rooms</th>
                                        <th>Check-in</th>
                                        <th>Check-out</th>
                                        <th>Guests</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>View Invoice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->booking_code }}</td>
                                            <td> <a href="{{ route('hotels.info', ['id' => $booking->hotels_id]) }}">
                                                    {{ $booking->hotels_name }}</a>
                                            </td>
                                            <td>{{ $booking->rooms_name }}</td>
                                            <td>{{ date('d-m-Y', strtotime($booking->check_in_date)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($booking->check_out_date)) }}</td>
                                            <td>{{ $booking->adult }} Adults - {{ $booking->kids }} Children</td>
                                            <td>{{ number_format($booking->total_price, 0, ' ', '.') }}</td>
                                            <td
                                                class="{{ $booking->status == 3 ? 'text-success' : ($booking->status == 4 ? 'text-danger' : 'text-danger') }}">
                                                {{ $booking->status == 3 ? 'Done' : ($booking->status == 4 ? 'Cancelled' : 'No Show') }}
                                            </td>
                                            <td>
                                             <a class="badge "
                                                        href="{{ route('dashboard.invoice', ['id' => $booking->id]) }}">View
                                                        invoice</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif


                    </div>
                    <!-- pagination-->
                    <div class="pagination">
                        <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                        <a href="#" class="current-page">1</a>
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
    <div class="limit-box fl-wrap"></div>
@endsection
@section('active-3')
    user-profile-act
@endsection
