@extends('modules.client.dashboard')
@section('title', 'Reservations')
@section('reservation')
    <section class="middle-padding">
        <div style="overflow: auto" class="container">
            <!--dasboard-wrap-->
            <div class="dasboard-wrap fl-wrap">
                <!-- dashboard-content-->
                <div class="dashboard-content fl-wrap" style="height: 400px">
                    <div class="dashboard-list-box fl-wrap" style="height: auto">
                        <div class="dashboard-header fl-wrap">
                            <h3>Reservations</h3>
                        </div>

                        @if ($bookings->isEmpty())
                            <div>
                                <img class="py-4" src="https://cdn6.agoda.net/images/MMB-3149/illustration-empty.png">
                            </div>
                            <div>
                                <h1 class="fs-4 py-4">You have no upcoming bookings.</h1>
                            </div>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Guest Name</th>
                                        <th>Rooms</th>
                                        <th>Check In </th>
                                        <th>Check Out </th>
                                        <th>Guest</th>
                                        <th>Total Price</th>
                                        <th>Commission</th>
                                        <th>Earning</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($bookings as $item)
                                        @if ($item->status == 2 || $item->status == 1)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->fullname }}</td>
                                                <td>{{ $item->rooms_name }}</td>
                                                <td>{{ date('d-m-Y', strtotime($item->check_in_date)) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($item->check_out_date)) }}</td>
                                                <td>{{ $item->adult }} Adults - {{ $item->kids }} Children</td>
                                                <td>{{ number_format($item->total_price, 0, ' ', '.') }}</td>
                                                <th>{{ number_format($item->commission, 0, ' ', '.') }}</th>
                                                <th>{{ number_format($item->earning, 0, ' ', '.') }}</th>
                                                <td class="{{ $item->status == 1 ? 'text-success' : 'text-warning' }}">
                                                    {{ $item->status == 1 ? 'Confirm' : ($item->status == 2 ? 'Pending' : ($item->status == 3 ? 'Done' : ($item->status == 4 ? 'Canceled' : 'No Show'))) }}
                                                </td>
                                                <td>
                                                    <button style="border: none"
                                                        class="btn-secondery btn-sm dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('hotels.reservations.confirm', ['idBookings' => $item->id]) }}">
                                                                Confirm</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('hotels.reservations.done', ['idBookings' => $item->id]) }}">
                                                                Done</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('hotels.reservations.cancel', ['idBookings' => $item->id]) }}">
                                                                Cancel</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('hotels.reservations.noshow', ['idBookings' => $item->id]) }}">
                                                                No Show</a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach


                                    <!-- Thêm các dòng dữ liệu khác tương tự -->
                                </tbody>
                            </table>
                            <!-- pagination-->

                        @endif
                        <!-- dashboard-list end-->


                    </div>

                </div>
                <div class="pagination">
                    <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                    <a href="#" class="current-page">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
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
