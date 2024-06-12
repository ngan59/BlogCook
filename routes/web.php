<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryEventController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashBoard;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\WebController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('admin')->group(function () {

    Route::get('login', [AuthController::class, 'login'])
        ->name('admin.auth.login');

    /**kiem tra dang nhap */
    Route::post('login', [AuthController::class, 'checkLogin'])
        ->name('admin.auth.check-login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'checkadminLogin'], function () {
    Route::get('logout', [AuthController::class, 'logout'])
        ->name('admin.logout');
    Route::get('profile', [AuthController::class, 'profile'])
        ->name('admin.profile.index');
    Route::put('profile', [AuthController::class, 'updateProfile'])
        ->name('admin.profile.update');


    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])
            ->name('admin.category.index');

        Route::get('create', [CategoryController::class, 'create'])
            ->name('admin.category.create');
        /**cập nhật thông tin vào database */
        Route::post('store', [CategoryController::class, 'store'])
            ->name('admin.category.store');
        /**lấy danh mục ra để chỉnh sửa */
        Route::get('edit/{id}', [CategoryController::class, 'edit'])
            ->name('admin.category.edit');
        /**cập nhật thông tin đã chỉnh sửa */
        Route::put('update/{id}', [CategoryController::class, 'update'])
            ->name('admin.category.update');

        Route::get('delete/{id}', [CategoryController::class, 'delete'])
            ->name('admin.category.delete');
    });

    Route::prefix('dish')->group(function () {
        Route::get('/', [DishController::class, 'index'])
            ->name('admin.dish.index');

        Route::get('create', [DishController::class, 'create'])
            ->name('admin.dish.create');
        /**cập nhật vào database */
        Route::post('store', [DishController::class, 'store'])
            ->name('admin.dish.store');
        /**lấy danh mục ra để chỉnh sửa */
        Route::get('edit/{id}', [DishController::class, 'edit'])
            ->name('admin.dish.edit');
        /**cập nhật thông tin đã chỉnh sửa */
        Route::put('update/{id}', [DishController::class, 'update'])
            ->name('admin.dish.update');

        Route::get('delete/{id}', [DishController::class, 'delete'])
            ->name('admin.dish.delete');
    });

    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactController::class, 'index'])
            ->name('admin.contact.index');

        Route::get('delete/{id}', [ContactController::class, 'delete'])
            ->name('admin.contact.delete');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])
            ->name('admin.user.index');

        Route::get('create', [UserController::class, 'create'])
            ->name('admin.user.create');
        /**cập nhật vào database */
        Route::post('store', [UserController::class, 'store'])
            ->name('admin.user.store');
        /**lấy danh mục ra để chỉnh sửa */
        Route::get('edit/{id}', [UserController::class, 'edit'])
            ->name('admin.user.edit');
        /**cập nhật thông tin đã chỉnh sửa */
        Route::put('update/{id}', [UserController::class, 'update'])
            ->name('admin.user.update');

        Route::get('delete/{id}', [UserController::class, 'delete'])
            ->name('admin.user.delete');
    });

    Route::prefix('event')->group(function () {
        Route::get('/', [EventController::class, 'index'])
            ->name('admin.event.index');
        Route::get('create', [EventController::class, 'create'])
            ->name('admin.event.create');
        /**cập nhật vào database */
        Route::post('store', [EventController::class, 'store'])
            ->name('admin.event.store');
        /**lấy danh mục ra để chỉnh sửa */
        Route::get('edit/{id}', [EventController::class, 'edit'])
            ->name('admin.event.edit');
        /**cập nhật thông tin đã chỉnh sửa */
        Route::put('update/{id}', [EventController::class, 'update'])
            ->name('admin.event.update');

        Route::get('delete/{id}', [EventController::class, 'delete'])
            ->name('admin.event.delete');
    });

    Route::prefix('categoryevent')->group(function () {
        Route::get('/', [CategoryEventController::class, 'index'])
            ->name('admin.categoryevent.index');

        Route::get('create', [CategoryEventController::class, 'create'])
            ->name('admin.categoryevent.create');
        /**cập nhật thông tin vào database */
        Route::post('store', [CategoryEventController::class, 'store'])
            ->name('admin.categoryevent.store');
        /**lấy danh mục ra để chỉnh sửa */
        Route::get('edit/{id}', [CategoryEventController::class, 'edit'])
            ->name('admin.categoryevent.edit');
        /**cập nhật thông tin đã chỉnh sửa */
        Route::put('update/{id}', [CategoryEventController::class, 'update'])
            ->name('admin.categoryevent.update');

        Route::get('delete/{id}', [CategoryEventController::class, 'delete'])
            ->name('admin.categoryevent.delete');
    });

    Route::prefix('slide')->group(function () {
        Route::get('/', [SlideController::class, 'index'])
            ->name('admin.slide.index');

        Route::get('create', [SlideController::class, 'create'])
            ->name('admin.slide.create');
        /**cập nhật vào database */
        Route::post('store', [SlideController::class, 'store'])
            ->name('admin.slide.store');
        /**lấy danh mục ra để chỉnh sửa */
        Route::get('edit/{id}', [SlideController::class, 'edit'])
            ->name('admin.slide.edit');
        /**cập nhật thông tin đã chỉnh sửa */
        Route::put('update/{id}', [SlideController::class, 'update'])
            ->name('admin.slide.update');

        Route::get('delete/{id}', [SlideController::class, 'delete'])
            ->name('admin.slide.delete');
    });

    // Route::prefix('dashboard')->group(function(){
    //     Route::get('/',[DashboardController::class,'index'])
    //     ->name('admin.dashboard.index');


});

// Home
Route::get('/', [WebController::class, 'home']);

/**lấy hết tất cả các danh mục */
Route::get('category', [WebController::class, 'category']);
/**sẽ lấy những bài viết ở trong danh mục bài viết nào */
Route::get('category/{slug}', [WebController::class, 'categorySlug'])
    ->name('web.category');

/**chi tiết bài viết */
Route::get('dish/{slug}', [WebController::class, 'dish'])
    ->name('web.dish');

Route::post('dish/comment/{id}', [WebController::class, 'comment'])
    ->name('web.dish.comment');
/**contact */
Route::get('contact', [WebController::class, 'contact'])
    ->name('web.contact');
/**để người dùng gửi form */
Route::post('contact', [WebController::class, 'sendContact'])
    ->name('web.contact.store');


Route::get('login',[LoginController::class,'formLogin']);

Route::post('login',[LoginController::class,'login'])
->name ('web.auth.login');

Route::get('logout', [LoginController::class, 'logout']);
