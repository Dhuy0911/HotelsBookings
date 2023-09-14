@extends('modules.client.dashboard')
@section('title', 'Edit Profile')
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
                    <form method="POST" action="{{ route('dashboard.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="profile-edit-container">
                            <div class="custom-form">
                                <label>Email Address<i class="far fa-envelope"></i> </label>
                                <input type="email" readonly name="email" value="{{ old('email', $members->email) }}" />
                                <label>Your Name <i class="far fa-user"></i></label>
                                <input type="text" name="name" value="{{ old('name', $members->name) }}" />
                                <label>Phone<i class="far fa-phone"></i> </label>
                                <input type="text" name="phone" value="{{ old('phone', $members->phone) }}" />
                                <label> Adress <i class="fas fa-map-marker"></i> </label>
                                <input type="text" name="address" value="{{ old('address', $members->address) }}" />
                                <input type="file" name="image" value="{{ old('image', $members->image) }}" />
                                <input type="hidden" name="level" value="{{ old('level', $members->level) }}" />
                                <input type="hidden" name="status" value="{{ old('status', $members->status) }}" />
    
                            </div>
                        </div>
                        <button type="submit" class="btn color2-bg float-btn">Save Changes<i
                                class="fal fa-save"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="limit-box fl-wrap"></div>
@endsection
@section('active-1')
    user-profile-act
@endsection
