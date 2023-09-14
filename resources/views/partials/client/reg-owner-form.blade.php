<div class="main-register-owner-wrap modal">
    <div class="reg-overlay"></div>
    <div class="main-register-holder">
        <div class="main-register fl-wrap">
            <div class="close-reg color-bg"><i class="fal fa-times"></i></div>
            <!--tabs -->
            <div id="tabs-container">
                <div class="tab">
                    <!--tab -->
                    <h3><span>Register <strong>Owner</strong></span></h3>
                    <div class="custom-form">
                        <form method="POST" action="{{ route('register-owner') }}" enctype="multipart/form-data"
                            name="registerOwnerForm" class="main-register-form" id="main-register-form1">
                            @csrf
                            <label>Front ID Card Image <span>*</span></label>
                            <input name="image_idcard_front" type="file" onClick="this.select()" value="">
                            @error('image_idcard_front')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label>Back ID Card Image <span>*</span></label>
                            <input name="image_idcard_back" type="file" onClick="this.select()" value="">
                            @error('image_idcard_back')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label>Business License Image <span>*</span></label>
                            <input name="image_business_license" type="file" onClick="this.select()" value="">
                            @error('image_business_license')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label>Hotels Image <span>*</span></label>
                            <input name="image_hotels" type="file" onClick="this.select()" value="">
                            @error('image_hotels')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="log-submit-btn color-bg"><span>Register</span></button>
                        </form>
                    </div>

                </div>
                <!--tabs end -->
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <script>
        let modalOwner = document.querySelector('.main-register-owner-wrap.modal');
        let overlay = document.querySelector('.reg-overlay');
        modalOwner.style.display = 'block';
        overlay.style.display='block';
    </script>
@endif
