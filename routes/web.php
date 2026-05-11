<?php
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\OurWorkController;


Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
 
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
    // About
    Route::resource('abouts', 'AboutController');
    Route::resource('about-values', 'AboutValueController');
    Route::resource('about-objectives', 'AboutObjectiveController');
    Route::resource('about-goals', 'AboutGoalController');

    // Our Work
    Route::resource('our-works', 'OurWorkController');
    Route::resource('our-work-categories', 'OurWorkCategoryController');
    Route::resource('our-work-details', 'OurWorkDetailController');
    Route::resource('our-work-initiatives', 'OurWorkInitiativeController');

    
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

// Frontend routes

Route::get('/about', [AboutController::class, 'index'])->name('frontend.about');
Route::get('/our-work', [OurWorkController::class, 'index'])->name('frontend.our-work');
