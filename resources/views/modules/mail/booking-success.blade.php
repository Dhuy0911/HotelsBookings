<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from easybook.kwst.net/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Mar 2023 04:47:17 GMT -->

<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8" />
    <title>Your Invoice</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/invoice.css') }}" />
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="{{ asset('client/images/favicon.ico') }}" />
</head>

<body>
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('client/images/logo2.png') }}" style="width: 150px; height: auto"
                                    alt="" />
                            </td>
                            <td>
                                Invoice : {{ $data['booking_code'] }}<br />
                                Created: {{ $data['booked_on'] = (new \DateTime())->format('Y-m-d H:i:s') }}<br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Easybook , Inc.<br />
                                USA 27TH Brooklyn NY<br />
                                <a href="#" style="color: #666; text-decoration: none">JessieManrty@domain.com</a>
                                <br />
                                <a href="#" style="color: #666; text-decoration: none">+4(333)123456</a>
                            </td>
                            <td>
                                {{ $data['fullname']}}<br />
                                <a href="#" style="color: #666; text-decoration: none">{{ $data['email'] }}</a>
                                <br />
                                <a href="#" style="color: #666; text-decoration: none">{{ $data['phone'] }}</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Payment Method</td>
                <td>Check #</td>
            </tr>
            <tr class="details">
                <td>Visa ending **** 4242</td>
                <td>Check</td>
            </tr>
            <tr class="heading">
                <td>Option</td>
                <td>Details</td>
            </tr>
            <tr class="item">
                <td>Hotel</td>
                <td>{{ $hotelName->name }}</td>
            </tr>
            <tr class="item">
                <td>Room Type</td>
                <td>{{ $roomName->name }}</td>
            </tr>
            <tr class="item">
                <td>From</td>
                <td>{{ $data['check_in_date'] }}</td>
            </tr>
            <tr class="item">
                <td>To</td>
                <td>{{ $data['check_out_date'] }}</td>
            </tr>
            <tr class="item">
                <td>Persons</td>
                <td>{{ $data['adult'] }}</td>
            </tr>
            <tr class="item last">
                <td>Taxes</td>
                <td>10%</td>
            </tr>
            <tr class="total">
                <td></td>
                <td style="padding-top: 50px">Total: {{ number_format($data['total_price'], 0, ' ', '.') }} VND</td>
            </tr>
        </table>
    </div>
</body>

<!-- Mirrored from easybook.kwst.net/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Mar 2023 04:47:21 GMT -->

</html>
