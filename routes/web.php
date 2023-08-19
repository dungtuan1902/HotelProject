<?php

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\ServiceContrller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhongController;
use App\Http\Controllers\LoaiPhongController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\KhuyenMaiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HotelController;

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

// use Illuminate\Http\Request;

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

//client
Route::match(['get', 'post'], '/', [ClientController::class, 'index'])->name('client');
Route::match(['get'], '/room', [ClientController::class, 'room'])->name('room_client');
Route::match(['get'], '/room/detail/{id}', [ClientController::class, 'detail'])->name('detail_room_client');
Route::match(['get'], '/contact', [ClientController::class, 'contact'])->name('contact_client');
Route::match(['get'], '/about', [ClientController::class, 'about'])->name('about_client');
Route::match(['get'], '/page', [ClientController::class, 'page'])->name('page_client');
Route::match(['get'], '/page/{id}', [ClientController::class, 'page_detail'])->name('page_detail_client');
Route::match(['get', 'post'], '/profiles', [ClientController::class, 'profiles'])->name('profiles_client');

Route::middleware(['client'])->group(function () {
    Route::match(['get', 'post'], '/check', [ClientController::class, 'check'])->name('check');
});


//Login 

Route::match(['get', 'post'], '/login', [UserController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [UserController::class, 'register'])->name('register');
Route::match(['get', 'post'], '/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        //Dashboard
        Route::match(['get'], '/dashboard', [DashBoardController::class, 'dashboard'])->name('dashboard');
        //User 
        Route::match(['get'], '/user', [UserController::class, 'getAll'])->name('user');
        Route::match(['get', 'post'], '/user/add', [UserController::class, 'add'])->name('insert');
        Route::match(['get', 'post'], '/user/edit/{id}', [UserController::class, 'detail'])->name('edit');
        Route::match(['get'], '/user/delete/{id}', [UserController::class, 'delete'])->name('delete');
        Route::match(['get', 'post'], '/user/profile/{id}', [UserController::class, 'profiles'])->name('profile');
        Route::match(['get'], '/user/view-delete', [UserController::class, 'view_delete'])->name('view-delete');
        Route::match(['get'], '/user/view-delete/delete/{id}', [UserController::class, 'force_delete'])->name('force_delete');
        Route::match(['get'], '/user/view-delete/restore/{id}', [UserController::class, 'force_restore'])->name('force_restore');
        Route::match(['get'], '/user/profiles-detail', [UserController::class, 'profiles_detail'])->name('profiles_detail');

        //Phong
        Route::match(['get'], '/room', [PhongController::class, 'getAll'])->name('room');
        Route::match(['get', 'post'], '/room/add', [PhongController::class, 'insert'])->name('insert_phong');
        Route::match(['get'], '/room/detail/{id}', [PhongController::class, 'detail'])->name('detail_phong');
        Route::match(['get'], '/room/force-phong/{id}', [PhongController::class, 'force'])->name('force_phong');
        Route::match(['get'], '/room/restore-phong/{id}', [PhongController::class, 'restore'])->name('restore_phong');
        Route::match(['get'], '/room/delete/{id}', [PhongController::class, 'delete'])->name('delete_phong');
        Route::match(['get'], '/room/view-delete-phong', [PhongController::class, 'view_delete'])->name('view_delete_phong');
        Route::match(['get', 'post'], '/room/edit/{id}', [PhongController::class, 'edit'])->name('edit_phong');

        //Service
        Route::match(['get'], '/service', [ServiceContrller::class, 'getAll'])->name('service');
        Route::match(['get', 'post'], '/service/add', [ServiceContrller::class, 'add'])->name('insert_service');
        Route::match(['get'], '/service/delete/{id}', [ServiceContrller::class, 'delete'])->name('delete_service');
        Route::match(['get', 'post'], '/service/edit/{id}', [ServiceContrller::class, 'edit'])->name('edit_service');
        Route::match(['get'], '/service/view-delete-service', [ServiceContrller::class, 'view_delete'])->name('view_delete_service');
        Route::match(['get'], '/service/force-delete-service/{id}', [ServiceContrller::class, 'force_delete'])->name('force_delete_service');
        Route::match(['get'], '/service/restore-service/{id}', [ServiceContrller::class, 'restore'])->name('restore_delete_service');

        //KhuyenMai
        Route::match(['get'], '/khuyenmai', [KhuyenMaiController::class, 'getAll'])->name('khuyenmai');
        Route::match(['get', 'post'], '/khuyenmai/add', [KhuyenMaiController::class, 'insert'])->name('insert_khuyenmai');
        Route::match(['get', 'post'], '/khuyenmai/edit/{id}', [KhuyenMaiController::class, 'update'])->name('edit_khuyenmai');
        Route::match(['get'], '/khuyenmai/force/{id}', [KhuyenMaiController::class, 'force'])->name('force_khuyenmai');
        Route::match(['get'], '/khuyenmai/restore/{id}', [KhuyenMaiController::class, 'restore'])->name('restore_khuyenmai');
        Route::match(['get'], '/khuyenmai/delete/{id}', [KhuyenMaiController::class, 'delete'])->name('delete_khuyenmai');
        Route::match(['get'], '/khuyenmai/view-deleted', [KhuyenMaiController::class, 'view_delete'])->name('view_delete_khuyenmai');

        //Loai Phong
        Route::match(['get'], '/typeroom', [LoaiPhongController::class, 'getAll'])->name('typeroom');
        Route::match(['get', 'post'], '/typeroom/add', [LoaiPhongController::class, 'insert'])->name('insert_typeroom');
        Route::match(['get', 'post'], '/typeroom/edit/{id}', [LoaiPhongController::class, 'update'])->name('edit_typeroom');
        Route::match(['get'], '/typeroom/force/{id}', [LoaiPhongController::class, 'force'])->name('force_typeroom');
        Route::match(['get'], '/typeroom/restore/{id}', [LoaiPhongController::class, 'restore'])->name('restore_typeroom');
        Route::match(['get'], '/typeroom/delete/{id}', [LoaiPhongController::class, 'delete'])->name('delete_typeroom');
        Route::match(['get'], '/typeroom/view-deleted', [LoaiPhongController::class, 'view_delete'])->name('view_delete_typeroom');


        //Setting
        Route::match(['get'], '/hotel', [HotelController::class, 'index'])->name('hotel');
        Route::match(['get', 'post'], '/hotel/edit', [HotelController::class, 'edit'])->name('edit_hotel');

        //Banner
        Route::match(['get'], '/banner', [BannerController::class, 'getAll'])->name('banner');
        Route::match(['get', 'post'], '/banner/add', [BannerController::class, 'insert'])->name('insert_banner');
        Route::match(['get'], '/banner/view-delete-banner', [BannerController::class, 'view_delete'])->name('view_delete_banner');
        Route::match(['get'], '/banner/delete/{id}', [BannerController::class, 'delete'])->name('delete_banner');
        Route::match(['get', 'post'], '/banner/edit/{id}', [BannerController::class, 'edit'])->name('edit_banner');
        Route::match(['get'], '/banner/force-delete-banner/{id}', [BannerController::class, 'force'])->name('force_delete_banner');
        Route::match(['get'], '/banner/restore-delete-banner/{id}', [BannerController::class, 'restore'])->name('restore_delete_banner');

        //Hoa Don
        Route::match(['get'], '/bill', [HoaDonController::class, 'getAll'])->name('bill');

        //Role 
        Route::match(['get'], '/role', [RoleController::class, 'getAll'])->name('role');
        Route::match(['get', 'post'], '/role/add', [RoleController::class, 'insert'])->name('insert_role');
        Route::match(['get', 'post'], '/role/edit/{id}', [RoleController::class, 'edit'])->name('edit_role');
        Route::match(['get'], '/role/delete/{id}', [RoleController::class, 'delete'])->name('delete_role');
        Route::match(['get'], '/role/view-delete-role', [RoleController::class, 'view_delete'])->name('view_delete_role');
        Route::match(['get'], '/role/role-force-delete/{id}', [RoleController::class, 'force_delete'])->name('force_delete_role');
        Route::match(['get'], '/role/role-restore/{id}', [RoleController::class, 'restore_role'])->name('restore_role');

        //Post
        Route::match(['get'], '/post', [PostController::class, 'getAll'])->name('post');
        Route::match(['get', 'post'], '/post/add', [PostController::class, 'add'])->name('insert_post');
        Route::match(['get'], '/post/delete/{id}', [PostController::class, 'delete'])->name('delete_post');
        Route::match(['get', 'post'], '/post/edit/{id}', [PostController::class, 'edit'])->name('edit_post');
        Route::match(['get'], '/post/view-delete-post', [PostController::class, 'view_delete'])->name('view_delete_post');
        Route::match(['get'], '/post/force-delete-post/{id}', [PostController::class, 'force'])->name('force_delete_post');
        Route::match(['get'], '/post/restore-post/{id}', [PostController::class, 'restore'])->name('restore_delete_post');
        Route::match(['get'], '/post/detail/{id}', [PostController::class, 'detail'])->name('detail_post');
    });
});