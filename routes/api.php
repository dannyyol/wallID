<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return response([
        'status' => true,
        'message' => 'You are now on WALL-ID API endpoints'
    ]);
});


Route::group(['middleware' => ['cors', 'json.response']], function () {


    // Auth
    Route::prefix('auth')->group(function () {
        Route::post('login', 'Auth\LoginController@index');
        Route::post('register', 'Auth\RegisterController@store');


        Route::post('organization/register', 'Auth\RegisterController@storeOrganization');
    });


    // Passport Protected
    Route::middleware('auth:api')->group(function () {
        Route::post('logout', 'Api\Auth\AuthController@apiLogout');
        Route::get('/events/notifications', 'Events\MainController@unreadNotification');

        // Payments
        Route::prefix('payments')->group(function () {
            Route::post('/', 'Payment\PaymentController@index');
            Route::get('/verify/{ref}', 'Payment\PaymentController@verify');
        });

        // Ticketing
        Route::prefix('tickets')->group(function () {
            Route::get('/', 'Ticket\MainController@index');
            Route::post('/', 'Ticket\MainController@store');
            Route::post('/buy', 'Ticket\MainController@buy');
        });


        // IDs
        Route::group(['prefix' => 'ids', 'namespace' => 'IDs'], function () {
            Route::get('/', 'MainController@index');
            Route::post('/store', 'MainController@store');
            Route::patch('/{id}', 'MainController@update');
            Route::get('/user/{user_id}', 'MainController@getUserIdcard');
            Route::get('/organization', 'MainController@getOrgIdcard');
            Route::delete('/delete/{id}', 'MainController@destroy');
        });

        // Users
        Route::prefix('users')->group(function () {
            Route::get('/', 'User\MainController@index');
            Route::get('/roles', 'User\MainController@roles');
            Route::get('/notifications', 'User\MainController@notifications');
            Route::get('/{id}', 'User\MainController@getUser');
            Route::get('/username/{username?}', 'User\MainController@profile');
            Route::get('/user/get', 'User\MainController@getUserByuserName');
        });

        // Individual
        Route::prefix('individuals')->group(function () {
            Route::get('/', 'Individual\MainController@index');
            Route::patch('/', 'Individual\MainController@update');
            Route::get('/organizations', 'Individual\MainController@organizations');
            Route::post('/organizations', 'Individual\MainController@joinOrganization');
            Route::get('/organizations/{status}', 'Individual\MainController@organizations');
            Route::post('member/create-request', 'Organization\MemberController@createRequest');
        });

        // Orgs
        Route::group(['prefix' => 'organizations', 'middleware' => 'role:organization'], function () {

            Route::get('/', 'Organization\MainController@index');
            Route::get('/lists', 'Organization\MainController@lists');

            // Member
            Route::get('members', 'Organization\MemberController@index');
            Route::post('members', 'Organization\MemberController@store');
            Route::patch('members/{id}', 'Organization\MemberController@update');

            Route::get('members/requests', 'Organization\MemberController@requests');
            Route::get('members/{id}', 'Organization\MemberController@show');
            Route::get('members/{id}/approve', 'Organization\MemberController@approve');
            Route::post('/add-and-approve', 'Organization\MemberController@addApprove');
            // Sub
            Route::get('/subscriptions', 'Organization\SubscriptionController@index');
            Route::post('/subscriptions', 'Organization\SubscriptionController@store');
            Route::post('/subscribe', 'Organization\SubscriptionController@userSubscribe');
            Route::put('/subscriptions/{id}/update', 'Organization\SubscriptionController@updateSubscription');

            // Cat
            Route::get('/categories', 'Organization\CategoryController@index');
            Route::post('/categories', 'Organization\CategoryController@store');
        });


        // Events
        Route::prefix('events')->group(function () {
            Route::get('/', 'Events\MainController@index');
            Route::get('/upcoming', 'Events\MainController@upcomingEvents');
            Route::post('/', 'Events\MainController@store');
            Route::post('/invite', 'Events\MainController@invite');
            Route::get('/invites', 'Events\MainController@invites');
            Route::get('/all', 'Events\MainController@allMyEvents');
            Route::put('/{id}', 'Events\MainController@update');
            Route::get('/mine', 'Events\MainController@userEvents');
            Route::get('/{id}', 'Events\MainController@show');
            Route::delete('/{id}', 'Events\MainController@destroy');
            Route::get('/close/{id}', 'Events\MainController@closeEvent');

            Route::get('/{id}/requests', 'Events\MainController@eventRequests');
            Route::get('/requests/{id}/{status}', 'Events\MainController@updateRequestStatus');

            Route::get('/{id}/share', 'Events\MainController@shareEvent');
            Route::get('/export', 'Events\MainController@exportEvents');
        });



        // Admin
        Route::group(['prefix' => 'admin'], function () {
            Route::group(['namespace' => 'Admin'], function () {
                Route::get('/', 'HomeController@details');

                // Users
                Route::get('/users/{status?}', 'UserController@index');
                Route::get('/users/{id}/{status?}', 'UserController@updateStatus');
                Route::delete('/users/{id}', 'UserController@destroy');

                // Orgs
                Route::get('/organizations/{status?}', 'OrganizationController@index');
                Route::get('/organizations/{id}/{status?}', 'OrganizationController@updateStatus')->where(
                    ['status' => '([0-1])']
                );

                // Events
                Route::get('/events', 'EventController@index');

                // Payments
                Route::get('/payments', 'PaymentController@index');
            });
        });
    });

    Route::prefix('test')->group(function () {
        Route::get('role', 'TestController@roles');
        Route::get('resource', 'TestController@resource');
        Route::get('util', 'TestController@util');
    });
});
