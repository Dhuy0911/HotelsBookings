@extends('modules.admin.datables')
@section('title', 'Reservation List ')
@section('content')
    <div class="card">
        <div class="card-header">
            <a type="button" href="{{ route('admin.bookings.create') }}" class="btn btn-primary mb-2">Create</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Bookings code</th>
                        <th>Hotels</th>
                        <th>Rooms</th>
                        <th>Check in date</th>
                        <th>Check out date</th>
                        <th>Status</th>
                        <th>Fullname</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Messages</th>
                        <th>Total Price</th>
                        <th>Booked on</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->booking_code }}</td>
                            </td>
                            <td>{{ $item->hotels_name }}</td>
                            <td>{{ $item->rooms_name }}</td>
                            <td>{{ $item->check_in_date }}</td>
                            <td>{{ $item->check_out_date }}</td>
                            <td>{{ $item->status == 1 ? 'Ok' : ($item->status == 2 ? 'Canceled' : 'No Show') }}</td>
                            <td>{{ $item->fullname }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->message }}</td>
                            <td>{{ $item->total_price }}</td>
                            <td>{{ $item->booked_on }}</td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
