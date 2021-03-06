<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth routes
Auth::routes();

// Public routes
Route::group(['prefix' => ''], function() {
    Route::get('/', 'App\AppHomeController@home');
    Route::get('/home', 'App\AppHomeController@home');
    Route::get('/timeline', 'App\AppTimelineController@timeline');
    Route::get('/tasks/{id}', 'App\AppTasksController@task');
    Route::get('/splashes/levelup', 'App\AppSplashController@levelUp');
    Route::post('/tasks/{id}', 'App\AppTasksController@taskSubmit');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
    Route::get('/terms-of-service', 'Guest\GuestController@termsOfService');
    Route::get('/privacy-policy', 'Guest\GuestController@privacyPolicy');
});

// OAuth Routes
Route::get('auth/{provider}', 'Auth\OAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\OAuthController@handleProviderCallback');

// Admin Routes
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'Admin\AdminDashboardController@dashboard');
    Route::group(['prefix' => 'dashboard'], function() {
        Route::get('/', 'Admin\AdminDashboardController@dashboard');
    });
    Route::group(['prefix' => 'questions'], function() {
        Route::get('/', 'Admin\AdminQuestionsController@questions');
        Route::get('/add', 'Admin\AdminQuestionsController@questionAdd');
        Route::get('/{id}/edit', 'Admin\AdminQuestionsController@questionEdit');
        Route::get('/{id}/delete', 'Admin\AdminQuestionsController@questionDelete');
        Route::post('/add', 'Admin\AdminQuestionsController@questionAddSave');
        Route::post('/{id}/edit', 'Admin\AdminQuestionsController@questionEditSave');
        Route::get('/ajaxquestionsidlist', 'Admin\AdminQuestionsController@ajaxQuestionsIdList');
        Route::post('/ajaxquestionanswerinput', 'Admin\AdminQuestionsController@ajaxQuestionAnswerInput');
    });
    Route::group(['prefix' => 'settings'], function() {
        Route::get('/', 'Admin\AdminSettingsController@general');
        Route::get('/general', 'Admin\AdminSettingsController@general');
    });
    Route::group(['prefix' => 'tasks'], function() {
        Route::get('/', 'Admin\AdminTasksController@tasks');
        Route::get('/entries', 'Admin\AdminTasksController@taskEntries');
        Route::get('/add', 'Admin\AdminTasksController@taskAdd');
        Route::get('/{id}/edit', 'Admin\AdminTasksController@taskEdit');
        Route::get('/{id}/delete', 'Admin\AdminTasksController@taskDelete');
        Route::post('/add', 'Admin\AdminTasksController@taskAddSave');
        Route::post('/{id}/edit', 'Admin\AdminTasksController@taskEditSave');
        Route::post('/ajaxtasksfeed', 'Admin\AdminTasksController@ajaxTasksFeed');
        Route::post('/ajaxtasksconfirm', 'Admin\AdminTasksController@ajaxTasksConfirm');
        Route::get('/ajaxquestionsidlist', 'Admin\AdminTasksController@ajaxQuestionsIdList');
        Route::post('/ajaxquestionanswerinput', 'Admin\AdminTasksController@ajaxQuestionAnswerInput');
    });
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', 'Admin\AdminUsersController@users');
        Route::get('/add', 'Admin\AdminUsersController@userAdd');
        Route::get('/{id}/edit', 'Admin\AdminUsersController@userEdit');
        Route::get('/{id}/delete', 'Admin\AdminUsersController@userDelete');
        Route::post('/add', 'Admin\AdminUsersController@userAddSave');
        Route::post('/{id}/edit', 'Admin\AdminUsersController@userEditSave');
    });

    Route::group(['prefix' => 'levels'], function() {
        Route::get('/', 'Admin\AdminLevelsController@levels');
        Route::get('/add', 'Admin\AdminLevelsController@levelAdd');
        Route::get('/{id}/edit', 'Admin\AdminLevelsController@levelEdit');
        Route::get('/{id}/delete', 'Admin\AdminLevelsController@levelDelete');
        Route::post('/add', 'Admin\AdminLevelsController@levelAddSave');
        Route::post('/{id}/edit', 'Admin\AdminLevelsController@levelEditSave');
    });
});

// Splash Routes
Route::group(['prefix' => 'splash'], function() {
    Route::get('/levelup', 'Splash\SplashController@levelUp');
    Route::get('/taskcomplete', 'Splash\SplashController@taskComplete');
});

// Questions routes
Route::group(['prefix' => 'questions'], function() {
    Route::get('/', 'Questions\QuestionsController@questions');
    Route::post('/', 'Questions\QuestionsController@questionSubmit');
});
