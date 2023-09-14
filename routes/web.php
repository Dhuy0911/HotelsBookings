<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingsController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\FacilitiesController;
use App\Http\Controllers\Admin\HotelsController;
use App\Http\Controllers\Admin\LocationsController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoomsController;
use App\Http\Controllers\Admin\RoomServiceController;
use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\PoliciesController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\HotelController;
use App\Http\Controllers\Client\InvoiceController;
use App\Http\Controllers\Client\LocationController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Route Login
Route::prefix('auth')->name('auth.')->controller(LoginController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::get('logout', 'logout')->name('logout');
});
//Route Register
Route::post('/store', [RegisterController::class, 'register'])->name('register');
// Route cho user
Route::post('/register-owner', [RegisterController::class, 'registerOwner'])->name('register-owner');

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/reset-password', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::post('/forgot-password',[ResetPasswordController::class, 'forgot'])->name('password.forgot');


// Dashboard cho user & owner
Route::prefix('account')->name('dashboard.')->middleware('checkLogin')->group(function () {
    Route::prefix('sendmail')->controller(SendMailController::class)->name('sendmail.')->group(function () {
        Route::get('requestaccepted', 'requestAccepted')->name('requestAccepted');
    });
    //profile cho user va owner
    Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function () {
        Route::get('index', 'showProfile')->name('index');
        Route::get('edit', 'editProfile')->name('edit');
        Route::post('update', 'updateProfile')->name('update');
    });
    Route::prefix('mybookings')->name('mybookings.')->controller(DashboardController::class)->middleware('checkLogin')->group(function () {
        Route::get('bookings', 'showBooking')->name('bookings');
        Route::get('cancel/{idBookings}', 'cancelBookings')->name('cancel');
        Route::get('history', 'historyBooking')->name('history');
    });
    Route::get('invoice/{id}', [InvoiceController::class, 'index'])->name('invoice');
});
Route::prefix('hotels')->name('hotels.')->controller(HotelController::class)->group(function () {
    Route::get('index', 'index')->name('index')->middleware('checkLogin');
    Route::get('info/{id}', 'info')->name('info');
    Route::get('create', 'create')->name('create')->middleware('checkLogin');
    Route::post('store', 'store')->name('store')->middleware('checkLogin');
    Route::get('edit/{id}', 'edit')->name('edit')->middleware('checkLogin');
    Route::post('update/{id}', 'update')->name('update')->middleware('checkLogin');
    Route::get('remove/{id}', 'remove')->name('remove')->middleware('checkLogin');

    Route::prefix('roomlist')->name('roomlist.')->controller(DashboardController::class)->middleware('checkLogin')->group(function () {
        Route::get('list', 'roomlist')->name('list');
        Route::post('rooms/{roomId}/{status}', 'updateStatus')->name('updatestatus');
        Route::get('edit/{id}', 'editRoom')->name('edit');
        Route::post('update/{id}', 'updateRoom')->name('update');
    });
    Route::prefix('reservations')->name('reservations.')->controller(DashboardController::class)->middleware('checkLogin')->group(function () {
        Route::get('index/{idUser}', 'reservations')->name('index');
        Route::get('confirm/{idBookings}', 'confirmReservation')->name('confirm');
        Route::get('done/{idBookings}', 'doneReservation')->name('done');
        Route::get('cancel/{idBookings}', 'cancelReservation')->name('cancel');
        Route::get('noshow/{idBookings}', 'noshowReservation')->name('noshow');


        Route::get('history/{idUser}', 'historyReservation')->name('history');
    });

    Route::prefix('rooms')->controller(RoomController::class)->name('rooms.')->group(function () {
        Route::get('index/{hotelId}/{roomId}', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('confirmbooking/{hotelId}/{roomId}', 'confirmbooking')->name('confirmbooking');
        Route::prefix('bookings')->name('bookings.')->controller(BookingController::class)->middleware('checkLogin')->group(function () {
            Route::get('book/{hotelId}/{roomId}', 'bookings')->name('book');
            Route::post('create', 'create')->name('create');
        });
    });
});
Route::prefix('locations')->name('city.')->controller(LocationController::class)->group(function () {
    Route::get('all', 'all')->name('all');
    Route::get('result/{id}', 'result')->name('result');
    Route::get('get-hotels-in-city/{idCity}', 'getHotelsInCity')->name('get-hotels-in-city');
});



// Login Admin  
Route::prefix('dhadmin')->middleware('checkLogin')->controller(AdminLoginController::class)->name('admin.')->group(function () {
    Route::get('login', 'viewlogin')->name('viewlogin')->withoutMiddleware('checkLogin');
    Route::post('auth', 'postlogin')->name('postlogin')->withoutMiddleware('checkLogin');
    Route::get('register', 'viewregister')->name('viewregister')->withoutMiddleware('checkLogin');
    Route::post('authregister', 'postregister')->name('postregister')->withoutMiddleware('checkLogin');
    Route::get('logout', 'logout')->name('logout');
});

// Admin
Route::prefix('dhadmin')->middleware('checkLogin', 'admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
    // Trang admin 
    Route::prefix('')->controller(AdminController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('info/{id}', 'info')->name('info');
        Route::get('edit/{id}', 'edit')->name('edit');
    });

    // Quan ly tien nghi khach san falicities
    Route::prefix('facilities')->name('facilities.')->controller(FacilitiesController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('remove/{id}', 'remove')->name('remove');
    });
    // Quan ly location 
    Route::prefix('location')->name('location.')->controller(LocationsController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('remove/{id}', 'remove')->name('remove');
    });
    // Quan ly Member
    Route::prefix('member')->name('member.')->controller(MemberController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('info/{id}', 'info')->name('info');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
    });


    // Quan ly Hotel
    Route::prefix('hotels')->name('hotels.')->controller(HotelsController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('info/{id}', 'info')->name('info');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        // Route::get('editRooms/{id}', 'editRooms')->name('editRooms');
        // Route::post('updateRooms/{id}', 'updateRooms')->name('updateRooms');
        Route::get('remove/{id}', 'remove')->name('remove');
        // Route::get('removerooms/{id}', 'removeRooms')->name('removeRooms');


        // Quan ly rooms cua hotel
        Route::prefix('rooms')->name('rooms.')->controller(RoomsController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create/{idhotel}', 'create')->name('create');
            Route::post('store/{idhotel}', 'store')->name('store');
            Route::get('edit/{idhotel}', 'edit')->name('edit');
            Route::post('update/{idhotel}', 'update')->name('update');
            Route::get('remove/{idhotel}', 'remove')->name('remove');
        });
    });
    Route::prefix('rooms')->name('rooms.')->controller(RoomsController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create/{idhotel}', 'create')->name('create');
        Route::post('store/{idhotel}', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('remove/{id}', 'remove')->name('remove');
    });

    // Service
    Route::prefix('service')->name('service.')->controller(ServiceController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('remove/{id}', 'remove')->name('remove');
    });
    Route::prefix('roomService')->name('roomService.')->controller(RoomServiceController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('remove/{id}', 'remove')->name('remove');
    });
    // Quan ly booking
    Route::prefix('bookings')->name('bookings.')->controller(BookingsController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit/{id}')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('remove/{id}', 'remove')->name('remove');
    });
    // Quan ly news
    Route::prefix('news')->name('news.')->controller(NewsController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('remove/{id}', 'remove')->name('remove');
    });
    // Quan ly posts
    Route::prefix('policy')->name('policy.')->controller(PoliciesController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('remove/{id}', 'remove')->name('remove');
    });
    Route::prefix('owner')->name('owner.')->controller(OwnerController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('history', 'history')->name('history');
        Route::get('accept/{id}', 'acceptRegOwner')->name('accept');
        Route::get('reject/{id}', 'rejectRegOwner')->name('reject');
    });
});
 

// paypal
Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

// Route::prefix('user')->name('user.')->controller(UserController::class)->group(function () {
//     Route::post('store', 'store')->name('store');
//     Route::get('booking', 'booking')->name('booking');
//     Route::get('edit', 'edit')->name('edit');
//     Route::post('update/{id}', 'update/{id}')->name('update');
//     Route::get('remove/{id}', 'remove/{id}')->name('remove');
// });

// Route::prefix('member')->name('member.')->controller(MemberController::class)->group(function () {
//     Route::get('index', 'index')->name('index');
//     Route::get('create', 'create')->name('create');
//     Route::post('store', 'store')->name('store');
//     Route::get('edit', 'edit')->name('edit');
//     Route::post('update/{id}', 'update/{id}')->name('update');
//     Route::get('remove/{id}', 'remove/{id}')->name('remove');
// });
