<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Middleware\User_Middleware;
use App\Http\Middleware\Admin_Middleware;

// Controllers
use App\Http\Controllers\{
    Admin\Admin_Dilivary_boy_Controller,
    Admin\Admin_Home_Controller,
    Admin\Admin_Login_Controller,
    Admin\Admin_Product_Controller,
    Admin\Admin_User_Controller,
    Admin\Order_controllers,
    Admin\Salesman_controller,
    Auth\RegisterController,
    Bill_controller,
    BuyController,
    Dilivary\Available_Delivary_Controller,
    Dilivary\Comform_dilivary_controller,
    Dilivary\Dilivary_login_controller,
    Dilivary\Dilivary_logout_controller,
    Dilivary\Dilivary_register_controller,
    Dilivary\Terms_and_condition_Controller,
    Dilivary\Your_Dilivayr_controller,
    Like_Controller,
    PDF_Controller,
    Mail_Controller,
    Product_controller,
    Sealsmen\Add_Product_Controller,
    Sealsmen\Sealsmen_Login_Controller,
    Sealsmen\Sealsmen_Logout_Controller,
    Sealsmen\Sealsmen_Register_Controller,
    Sealsmen\Your_Product_Controller,
    Search_Controller,
    Show_Controller
};

// Public Routes
Route::get('/', function (Request $request) {
    $add = Product::paginate(3);
    return view('welcome', ['product' => $add]);
});
Route::post('show_product', [Product_controller::class, 'index']);
Auth::routes();

// User Routes with Middleware
Route::middleware(['auth', User_Middleware::class])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Likes
    Route::post('add_like', [Like_Controller::class, 'index'])->name('add_likes');
    Route::post('dislike', [Like_Controller::class, 'delete'])->name('dislike');

    // Purchases
    Route::post('buy_nave', [BuyController::class, 'index'])->name('buy_nave');
    Route::post('add_bill', [Bill_controller::class, 'index'])->name('add_bill');

    // Search
    Route::get('search', [Search_Controller::class, 'search'])->name('search');

    // Saved Products and Cart
    Route::get('show_save/{uid}', [Show_Controller::class, 'index1'])->name('show_save');
    Route::get('show_cart/{uid}', [Show_Controller::class, 'index2'])->name('show_cart');
    Route::get('cart/{id}', [Show_Controller::class, 'cart'])->name('cart');

    // Canceled Orders
    Route::post('cancelled_orders', [Bill_controller::class, 'cancelled_orders'])->name('cancelled_orders');
});

// Delivery Boy Routes
Route::prefix('dilivary')->name('dilivary.')->group(function () {
    Route::post('terms_and_condition', [Terms_and_condition_Controller::class, 'index'])->name('terms_and_condition');
    Route::view('add', 'Dilivary/Auth/register')->name('add');
    Route::post('register', [Dilivary_register_controller::class, 'register'])->name('register');
    Route::get('logout', [Dilivary_logout_controller::class, 'logout'])->name('logout');
    Route::view('home', 'dilivary/home')->name('home');
    Route::view('find', 'Dilivary/Auth/Login')->name('find');
    Route::post('login', [Dilivary_login_controller::class, 'login'])->name('login');
    Route::get('available_delivary', [Available_Delivary_Controller::class, 'index'])->name('available_delivary');
    Route::post('take_dilivary', [Available_Delivary_Controller::class, 'available_bill'])->name('take_dilivary');
    Route::get('your_dilivary', [Your_Dilivayr_controller::class, 'index'])->name('your_dilivary');
    Route::get('comform_dilivary/{id}', [Comform_dilivary_controller::class, 'index'])->name('comform_dilivary');
    Route::post('comform', [Comform_dilivary_controller::class, 'comform'])->name('comform');
});

// Admin Routes with Middleware
Route::get('admin', [Admin_Login_Controller::class, 'index']);
Route::post('admin/login', [Admin_Login_Controller::class, 'login']);
Route::middleware(['auth', Admin_Middleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('home', [Admin_Home_Controller::class, 'index'])->name('home');
    Route::get('user', [Admin_User_Controller::class, 'index'])->name('user');
    Route::get('salesman', [Salesman_controller::class, 'index'])->name('salesman');
    Route::get('dilivary_boy', [Admin_Dilivary_boy_Controller::class, 'index'])->name('dilivary_boy');
    Route::get('view_product', [Admin_Product_Controller::class, 'index1'])->name('view_product');
    Route::get('product', [Admin_Product_Controller::class, 'index']);
    Route::get('order', [Order_controllers::class, 'index'])->name('order');
});

// Sealsmen Routes
Route::prefix('sealsmen')->name('sealsmen.')->group(function () {
    Route::get('add', [Sealsmen_Register_Controller::class, 'index'])->name('add');
    Route::post('register', [Sealsmen_Register_Controller::class, 'register'])->name('register');
    Route::get('logout', [Sealsmen_Logout_Controller::class, 'logout'])->name('logout');
    Route::get('find', [Sealsmen_Login_Controller::class, 'index'])->name('find');
    Route::post('login', [Sealsmen_Login_Controller::class, 'login'])->name('login');
    Route::view('home', 'Sealsmen/home')->name('home');
    Route::get('add_products', [Add_Product_Controller::class, 'index']);
    Route::post('product_add', [Add_Product_Controller::class, 'add_product']);
    Route::get('your_products', [Your_Product_Controller::class, 'index'])->name('your_products');
    Route::post('delete', [Your_Product_Controller::class, 'delete']);
    Route::post('update', [Your_Product_Controller::class, 'index1']);
    Route::post('edit', [Your_Product_Controller::class, 'update']);
});

//send email
Route::get('/send-pdf/{bid}', [PDF_Controller::class, 'generatePDF'])->name('send_pdf');

Route::get('send_mail/{id}', [Mail_Controller::class, 'SendEmail'])->name('send_mail');
