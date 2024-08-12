<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryEventController;
use App\Http\Controllers\Admin\CategoryReportController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\EventsController;
use App\Http\Controllers\User\ManageController;
use App\Http\Controllers\User\RecipeController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\ReportsController;
use App\Http\Controllers\User\WebController;
use Illuminate\Support\Facades\Route;


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

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('admin.dashboard.index');
    });

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
        Route::delete('delete/{id}', [CategoryController::class, 'delete'])
            ->name('admin.category.delete');
    });

    Route::prefix('dish')->group(function () {
        Route::get('/', [DishController::class, 'index'])
            ->name('admin.dish.index');
        Route::get('view/{id}', [DishController::class, 'view'])
            ->name('admin.dish.view');
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
        Route::delete('delete/{id}', [DishController::class, 'delete'])
            ->name('admin.dish.delete');
        Route::get('dish/{id}/comments', [DishController::class, 'showComments'])
            ->name('admin.dish.comments');
        Route::post('comment/{id}/status', [DishController::class, 'status'])
            ->name('admin.comment.status');
    });

    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactController::class, 'index'])
            ->name('admin.contact.index');

        Route::delete('delete/{id}', [ContactController::class, 'delete'])
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
        Route::delete('delete/{id}', [UserController::class, 'delete'])
            ->name('admin.user.delete');
    });

    Route::prefix('event')->group(function () {
        Route::get('/', [EventController::class, 'index'])
            ->name('admin.event.index');
        Route::get('view/{id}', [EventController::class, 'view'])
            ->name('admin.event.view');
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
        Route::delete('delete/{id}', [EventController::class, 'delete'])
            ->name('admin.event.delete');
        /**danh sách người tham gia sự kiện */
        Route::get('event/{id}/participants', [EventController::class, 'participants'])
            ->name('admin.event.participants');
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

        Route::delete('delete/{id}', [CategoryEventController::class, 'delete'])
            ->name('admin.categoryevent.delete');
    });

    Route::prefix('slide')->group(function () {
        Route::get('/', [SlideController::class, 'index'])
            ->name('admin.slide.index');
        Route::get('view/{id}', [SlideController::class, 'view'])
            ->name('admin.slide.view');
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
        Route::delete('delete/{id}', [SlideController::class, 'delete'])
            ->name('admin.slide.delete');
    });

    Route::prefix('comment')->group(function () {
        Route::get('/', [CommentController::class, 'index'])
            ->name('admin.comment.index');
        Route::get('view/{id}', [CommentController::class, 'showReports'])
            ->name('admin.comment.reports');
        Route::post('reports/{id}/status', [CommentController::class, 'updateReportStatus'])
            ->name('admin.reports.status');

    });


    Route::prefix('categoryreport')->group(function () {
        Route::get('/', [CategoryReportController::class, 'index'])
            ->name('admin.categoryreport.index');
        Route::get('view/{id}', [CategoryReportController::class, 'view'])
            ->name('admin.categoryreport.view');
        Route::get('/report/{id}', [CategoryReportController::class, 'show'])
            ->name('admin.categoryreport.show');
        Route::get('create', [CategoryReportController::class, 'create'])
            ->name('admin.categoryreport.create');
        /**cập nhật vào database */
        Route::post('store', [CategoryReportController::class, 'store'])
            ->name('admin.categoryreport.store');
        /**lấy danh mục ra để chỉnh sửa */
        Route::get('edit/{id}', [CategoryReportController::class, 'edit'])
            ->name('admin.categoryreport.edit');
        /**cập nhật thông tin đã chỉnh sửa */
        Route::put('update/{id}', [CategoryReportController::class, 'update'])
            ->name('admin.categoryreport.update');
        Route::delete('delete/{id}', [CategoryReportController::class, 'delete'])
            ->name('admin.categoryreport.delete');
    });
});

// Home
Route::get('/', [WebController::class, 'home'])
    ->name('web.home');
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

/**sự kiện*/
Route::get('categoryevent', [EventsController::class, 'categoryevent'])
    ->name('web.categoryevent');
Route::get('categoryevent/{slug}', [EventsController::class, 'categoryeventSlug'])
    ->name('web.categoryevent.slug');
Route::post('event/register', [EventsController::class, 'sendEvent'])
    ->name('web.event.register')->middleware('auth');
Route::get('event/{slug}', [EventsController::class, 'event'])
    ->name('web.event');

/** đăng nhập */
Route::get('register', [RegisterController::class, 'formRegister']);
Route::post('register', [RegisterController::class, 'register'])
    ->name('web.auth.register');
Route::get('login', [LoginController::class, 'formLogin']);
Route::post('login', [LoginController::class, 'login'])
    ->name('web.auth.login');
Route::get('logout', [LoginController::class, 'logout'])
    ->name('web.auth.logout');

/** quên mật khẩu*/
Route::get('forgot-password', [LoginController::class, 'forgotPassword'])
    ->name('web.auth.forgot-password');
Route::post('send-mail-forgot-password', [LoginController::class, 'sendMail'])
    ->name('send-mail');
Route::get('reset-password', [LoginController::class, 'formReset'])
    ->name('form-reset');
Route::post('reset-password', [LoginController::class, 'resetPassword'])
    ->name('reset-password');

/** profile*/
Route::get('profile', [LoginController::class, 'profile'])
    ->name('web.profile.index');
Route::put('profile', [LoginController::class, 'updateProfile'])
    ->name('web.profile.update');

/**tìm kiếm*/
Route::get('search', [WebController::class, 'search'])
    ->name('web.search');

/**user đăng bài*/
Route::get('/recipes/create', [RecipeController::class, 'create'])
    ->name('recipes.create');
Route::post('/recipes', [RecipeController::class, 'store'])
    ->name('recipes.store');

/**user quản lý bài viết đã đăng*/
Route::get('/manage', [ManageController::class, 'index'])
    ->name('manage.index');
Route::get('manage/{slug}', [ManageController::class, 'view'])
    ->name('manage.view');
Route::get('delete/{id}', [ManageController::class, 'delete'])
    ->name('manage.delete');
Route::get('edit/{id}', [ManageController::class, 'edit'])
    ->name('manage.edit');
Route::put('update/{id}', [ManageController::class, 'update'])
    ->name('manage.update');

/**báo cáo*/
Route::post('/report', [ReportsController::class, 'store'])
    ->name('report.store');

/**user quản lý báo cáo của user*/
Route::get('/manage-report', [ManageController::class, 'manageRepport'])
    ->name('manage.report.index');
Route::get('manage-report/{id}', [ManageController::class, 'manageRepportDelete'])
    ->name('manage.report.delete');

/**test gửi mail*/

use App\Mail\EventReminder;
use App\Models\Event;
use Illuminate\Support\Facades\Mail;

Route::get('/send-test-email', function () {
    $event = Event::first();
    if ($event) {
        $user = $event->users()->first();
        if ($user) {
            Mail::to($user->email)->send(new EventReminder($event, $user));
            return 'Email đã được gửi thành công';
        } else {
            return 'Không có người tham gia event.';
        }
    } else {
        return 'Sự kiện không hợp lệ.';
    }
});
