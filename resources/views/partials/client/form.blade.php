<div class="main-register-wrap modal">
    <div class="reg-overlay"></div>
    <div class="main-register-holder">
        <div class="main-register fl-wrap">
            <div class="close-reg color-bg"><i class="fal fa-times"></i></div>
            <ul class="tabs-menu">
                <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Login</a></li>
                <li><a href="#tab-2"><i class="fal fa-user-plus"></i> Register</a></li>
            </ul>
            <!--tabs -->
            <div id="tabs-container">
                <div class="tab">
                    <!--tab -->
                    <div id="tab-1" class="tab-content">
                        <h3>Sign In <span>Easy<strong>Book</strong></span></h3>
                        <div class="custom-form">

                            <form action="{{ route('auth.login') }}" method="POST" name="registerform">
                                @csrf
                                <div>
                                    <label>Email Address <span>*</span> </label>
                                    <input value="{{ old('email') }}" name="email" type="email"
                                        onClick="this.select()">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label>Password <span>*</span> </label>
                                    <input name="password" type="password" onClick="this.select()" value="">
                                    @error('password')
                                        <div class=" text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <input type="submit" value="Log In" class="log-submit-btn color-bg">
                                <div class="clearfix"></div>
                                <div class="filter-tags">
                                    <input id="check-a" type="checkbox" name="check">
                                    <label for="check-a">Remember me</label>
                                </div>
                            </form>
                            <div class="lost_password">
                                <a href="{{ route('password.reset') }}">Lost Your Password?</a>
                            </div>
                        </div>
                    </div>
                    <!--tab end -->
                    <!--tab -->
                    <div class="tab">
                        <div id="tab-2" class="tab-content">
                            <h3>Sign Up <span>Easy<strong>Book</strong></span></h3>
                            <div class="custom-form">
                                <form method="POST" action="{{ route('register') }}" name="registerform"
                                    class="main-register-form" id="main-register-form2">
                                    @csrf
                                    <label>Your Name <span>*</span></label>
                                    <input name="name" type="text" onClick="this.select()" value="">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <label>Email Address <span>*</span></label>
                                    <input name="email" type="text" onClick="this.select()" value="">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <label>Password <span>*</span></label>
                                    <input name="password" type="password" onClick="this.select()" value="">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <label>Password Confirmation <span>*</span></label>
                                    <input name="password_confirmation" type="password" onClick="this.select()"
                                        value="">
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="submit"
                                        class="log-submit-btn color-bg"><span>Register</span></button>
                                </form>
                            </div>
                        </div>
                    </div>



                    <!--tab end -->
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
        let modal = document.querySelector('.main-register-wrap.modal');
        modal.style.display = 'block';
    </script>
@endif
