<!DOCTYPE html>
<html lang="en">

<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8" />
    <title>@yield('title')</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <script src="https://kit.fontawesome.com/d9876ed7d9.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>

    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/reset.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/plugins.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.css') }}">

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css' rel='stylesheet' />



    <link rel="shortcut icon" href="{{ asset('client/images/favicon.ico') }}" />

    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .policy-item {
            margin-bottom: 20px;
        }

        .policy-title {
            font-size: 18px;
            font-weight: ;
        }

        .policy-description {
            margin-top: 5px;
            font-size: 14px;
            color: #666;
        }
    </style>

</head>


<body>
    <!--loader-->
    @include('partials.client.loader')
    <!--loader end-->
    <!-- Main  -->
    <div id="main">
        <!-- header-->

        @if (Auth::check())
            @include('partials.client.header-logged-in')
        @else
            @include('partials.client.header-not-logged-in')
        @endif
        <!--  header end -->
        <!--  wrapper  -->
        <div id="wrapper">
            <!-- content-->
            @yield('content')
            <!-- content end-->

        </div>
        <!--wrapper end -->
        <!--footer -->
        @include('partials.client.footer')
        <!--footer end -->
        <!--map-modal -->

        <!--map-modal end -->
        <!--register form -->
        @include('partials.client.form')

        @if (Auth::check())
            @include('partials.client.reg-owner-form')
            @include('partials.client.modal-confirm')
        @endif


        <!--register form end -->
        <a class="to-top"><i class="fas fa-caret-up"></i></a>
    </div>
    <!-- Main end -->
    <!--=============== scripts  ===============-->

    <script src="{{ asset('admin/plugins/toastr/toastr.js') }}"></script>
    <script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>
    @if (session()->has('success'))
        <script>
            toastr.success('{{ session()->get('success') }}');
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            toastr.error('{{ session()->get('error') }}');
        </script>
    @endif


    {{-- 
    @if (session()->has('login_error'))
        <script>
            let modal = document.querySelector('.main-register-wrap.modal');
            modal.style.display = 'block';
            let errorMessage = "{{ session('login_error') }}";
            let errorBox = modal.querySelector('.alert-danger');
            errorBox.innerHTML = `<ul><li>${errorMessage}</li></ul>`;
            errorBox.style.display = 'block';
        </script>
    @endif --}}

    <script type="text/javascript" src="{{ asset('admin/dist/js/jquery/jquery-3.6.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client/js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client/js/scripts.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&amp;libraries=places&amp;callback=initAutocomplete">
    </script>
    {{-- <script type="text/javascript" src="{{ asset('client/js/mapplugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client/js/maps.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client/js/map-single.js') }}"></script> --}}


</body>


</html>
