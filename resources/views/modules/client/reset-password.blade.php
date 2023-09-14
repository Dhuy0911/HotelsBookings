{{-- <form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>
    <button type="submit">Reset Password</button>
</form> --}}
<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/reset.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/plugins.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/color.css') }}">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            text-align: center;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <img class="logo" src="{{ asset('client/images/logo2.png') }}">
        
        <div class="custom-form">

            <form action="{{route('password.forgot')}}" method="POST" name="forgotPassword">
                @csrf
                <div>
                    <label>Email Address <span>*</span> </label>
                    <input value="{{ old('email') }}" name="email" type="email" onClick="this.select()">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <input type="submit" value="Submit" class="log-submit-btn color-bg">
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</body>

</html>
