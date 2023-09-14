@extends('modules.client.dashboard')
@section('profile')
    <!-- section-->
    <section class="middle-padding">
        <div class="container">
            <!--dasboard-wrap-->
            <div class="dasboard-wrap fl-wrap">
                <!-- dashboard-content-->
                <div class="dashboard-content fl-wrap">
                    <div class="box-widget-item-header">
                        <h3> Your Profile</h3>
                    </div>
                    <!-- profile-edit-container-->
                    <div class="profile-edit-container">
                        <div class="custom-form">
                            <label>Email Address<i class="far fa-envelope"></i> </label>
                            <input readonly type="email" name="email" value="{{ old('email', $members->email) }}" />
                            <label>Your Name <i class="far fa-user"></i></label>
                            <input readonly type="text" name="name" value="{{ old('name', $members->name) }}" />
                            <label>Phone<i class="far fa-phone"></i> </label>
                            <input readonly type="text" name="phone" value="{{ $members->phone }}" />
                            <label> Adress <i class="fas fa-map-marker"></i> </label>
                            <input readonly type="text" name="address" value="{{ $members->address }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="limit-box fl-wrap"></div>
@endsection
@section('active-1')
    user-profile-act
@endsection
