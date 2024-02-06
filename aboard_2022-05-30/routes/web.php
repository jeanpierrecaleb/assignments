<?php


use App\Http\Controllers;
use App\Http\Controllers\review\RvwpaController;
use App\Http\Controllers\SPActivityController;
use App\Models\Department;
use App\Models\Ocindicator;
use App\Models\Program;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\WPAController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SubproController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\UserController;




use App\Http\Controllers\CommunityController;
use App\Http\Controllers\DirectorateController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\OcindicatorController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\OutputController;

use App\Http\Controllers\OtpindicatorController;







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

/* Welcome  Page without authentification  */


Route::get('/', function () {
    return view('welcome');
});


/* Authentification routes */

/* Route::middleware(['admin', /* 'second'*//*]) ->group(function () {
    Route::get('/', function () {

    });*/

// Auth::routes();

Auth::routes([
    // 'register' => false
    //'register' -> middleware('auth');
]);

Route::get('/markAsRead', function(){
    Auth()->user()->unReadNotifications->markAsRead();
});

/* Route::group(['middleware' => 'auth'], function () {
      Route::get('register', 'Auth\AuthController@showRegistrationForm');
      Route::post('register', 'Auth\AuthController@register'); }); */

/* Home Route that send to the Dashboard  */

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/progressionbar', [WPAController::class, 'index'])->name('progressionbar');

// Planning routes

// Routes admin or super admin to comment when no user in the database - not forget register too

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', /*'role:admin'*/])->name('admin.index');




// Route::put('planning/wpa/review/{id}', [WPAController::class, 'submitter'])->name('planning/wpa/review/{id}');

#Status change Toggle Example

Route::get('status/update', [WPAController::class, 'updateStatus'])->name('update.status');

Route::get('planning/status/review', [WPAController::class, 'updateReview'])->name('planning.status.review');

Route::get('planning/status/approval', [WPAController::class, 'updateApprove'])->name('planning.status.approval');




/* 'role:admin' */ /* users routes be admin or comment when refresh everything */
    Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    // Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    // Route::get('/permissions/{id}/delete/', [PermissionController::class, 'delete']);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');


    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');

    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');



    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');

    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
});





/* THIS is for Annual Work Plan (WPA)  in Planning */

Route::get('planning/listwpa', [WPAController::class, 'index'])->name('planning/listwpa');

// Route::get('/add-wpa', [WPAController::class, 'add'])->name('add-wpa');

Route::get('planning/add-wpa', [WPAController::class, 'add'])->name('planning/add-wpa') ; // ->middleware(['role:focal point', 'role:admin' ]);

Route::post('planning/create-wpa', [WPAController::class, 'store'])->name('planning/create-wpa');

Route::get('planning/wpa/edit/{id}', [WPAController::class, 'edit'])->name('planning/wpa/edit/{id}');
Route::put('planning/wpa/update/{id}', [WPAController::class, 'update'])->name('planning/wpa/update/{id}');

Route::get('planning/del-wpa/{id}', [WPAController::class, 'delete'])->name('planning/del-wpa/{id}');
Route::get('planning/details-wpa/{id}', [WPAController::class, 'details'])->name('planning/details-wpa/{id}');

/* Program routes */

Route::get('/listprogram', [ProgramController::class, 'index'])->name('listprogram');
Route::get('/planning/add-program/{id}', [ProgramController::class, 'add'])->name('planning/add-program/{id}');
Route::post('planning/create-program', [ProgramController::class, 'store'])->name('planning/create-program');
Route::get('planning/program/edit/{id}', [ProgramController::class, 'edit'])->name('planning/program/edit/{id}');
Route::put('planning/program/update/{id}', [ProgramController::class, 'update'])->name('planning/program/update/{id}');

Route::get('planning/del-program/{id}', [ProgramController::class, 'delete'])->name('planning/del-program/{id}');
Route::get('planning/details-program/{wpaid}/{progid}', [ProgramController::class, 'details'])->name('details-program/{wpaid}/{progid}');

/* Fin route program */


/* Indicator for Outcome ou Ocindicators Routes */

Route::post('/planning/create-ocindicator', [OcindicatorController::class, 'store'])->name('planning/create-ocindicator');
Route::get('planning/ocindicator/edit/{id}', [OcindicatorController::class, 'edit'])->name('planning/ocindicator/edit/{id}');

Route::put('/planning/ocindicator/update/{id}', [OcindicatorController::class, 'update'])->name('/planning/ocindicator/update/{id}');
Route::get('/planning/del-ocindicator/{id}', [OcindicatorController::class, 'delete'])->name('planning/del-ocindicator/{id}');

Route::get('planning/details-ocindicator/{outcomeid}/{ocindicatorid}', [OcindicatorController::class, 'details'])->name('planning/details-ocindicator/{outcomeid}/{ocindicatorid}');


// Some other routes in planning



/* Route for outcome */

Route::get('/listoutcome', [OutcomeController::class, 'index'])->name('listoutcome');

Route::get('/planning/add-outcome/{progid}', [OutcomeController::class, 'add'])->name('planning/add-outcome/{progid}');

Route::post('/planning/create-outcome', [OutcomeController::class, 'store'])->name('planning/create-outcome');
Route::get('/planning/outcome/edit/{id}', [OutcomeController::class, 'edit'])->name('/planning/outcome/edit/{id}');
Route::put('/planning/outcome/update/{id}', [OutcomeController::class, 'update'])->name('/planning/outcome/update/{id}');
Route::get('planning/del-outcome/{id}', [OutcomeController::class, 'delete'])->name('planning/del-outcome/{id}');

Route::get('planning/details-outcome/{progid}/{outcomeid}', [OutcomeController::class, 'details'])->name('planning/details-outcome/{progid}/{outcomeid}');


/* End Route for outcome */

/* Begin Route Subpro */

Route::get('planning/add-subpro/{progid}', [SubproController::class, 'add'])->name('planning/add-subpro/{progid}');

Route::post('/planning/create-subpro', [SubproController::class, 'store'])->name('planning/create-subpro');

Route::get('/planning/subpro/edit/{id}', [SubproController::class, 'edit'])->name('/planning/subpro/edit/{id}');

Route::put('/planning/subpro/update/{id}', [SubproController::class, 'update'])->name('/planning/subpro/update/{id}');

Route::get('planning/del-subpro/{id}', [SubproController::class, 'delete'])->name('planning/del-subpro/{id}');

Route::get('planning/details-subpro/{programid}/{subprogramid}', [SubproController::class, 'details'])->name('planning/details-subpro/{programid}/{subprogramid}');


/* Route::get('/listsubpro', function () {
    return view('planning.sub-program');
})->name('listsubpro'); */

/* End subpro routes */

/* Route for Output  */

Route::get('/listoutput', function () {
    return view('planning.output');
})->name('listoutput');

Route::get('planning/output/add/{subproid}', [OutputController::class, 'add'])->name('planning/output/add/{subproid}');

Route::post('/planning/output/create', [OutputController::class, 'store'])->name('planning/output/create');

Route::get('/planning/output/edit/{id}', [OutputController::class, 'edit'])->name('planning/output/edit/{id}');


Route::put('/planning/output/update/{id}', [OutputController::class, 'update'])->name('planning/output/update/{id}');

Route::get('planning/output/delete/{id}', [OutputController::class, 'delete'])->name('planning/output/delete/{id}');

Route::get('planning/output/details/{subprogramid}/{outputid}', [OutputController::class, 'details'])->name('planning/output/details/{subprogramid}/{outputid}');


/* Fin Route Output  */

/* Route for Indicator of Output - Otpindicator  */

// Route::get('planning/output/add/{subproid}', [OutputController::class, 'add'])->name('planning/output/add/{subproid}');

Route::post('/planning/otpindicator/create', [OtpindicatorController::class, 'store'])->name('planning/otpindicator/create');

Route::get('/planning/otpindicator/edit/{id}', [OtpindicatorController::class, 'edit'])->name('planning/otpindicator/edit/{id}');


Route::put('/planning/otpindicator/update/{id}', [OtpindicatorController::class, 'update'])->name('planning/otpindicator/update/{id}');

Route::get('planning/otpindicator/delete/{id}', [OtpindicatorController::class, 'delete'])->name('planning/otpindicator/update/{id}');

Route::get('planning/otpindicator/details/{outputid}/{otpindicatorid}', [OtpindicatorController::class, 'details'])->name('planning/otpindicator/details/{outputid}/{otpindicatorid}');


/* Fin Route Output  */



/* Route Activity  */

Route::get('/listactivity', function () {
    return view('planning.activity');
})->name('listactivity');

Route::get('planning/spactivity/add/{id}', [SPActivityController::class, 'add'])->name('planning/spactivity/add/{id}');

Route::post('/planning/spactivity/create', [SPActivityController::class, 'store'])->name('planning/spactivity/create');

Route::get('/planning/spactivity/edit/{id}', [SPActivityController::class, 'edit'])->name('planning/spactivity/edit/{id}');

Route::put('/planning/spactivity/update/{id}', [SPActivityController::class, 'update'])->name('planning/spactivity/update/{id}');

Route::get('planning/spactivity/delete/{id}', [SPActivityController::class, 'delete'])->name('planning/spactivity/update/{id}');

Route::get('planning/spactivity/details/{subprogramid}/{spactivityid}', [SPActivityController::class, 'details'])->name('planning/spactivity/details/{subprogramid}/{spactivityid}');


/* Fin Route Activity  */


//Institution routes or Community

Route::get('/community_home', [CommunityController::class, 'index'])->name('community_home');

Route::get('/institution', [InstitutionController::class, 'index'])->name('institution')->middleware('role:admin');;


Route::get('/add-instit', [InstitutionController::class, 'add'])->name('add-instit')->middleware('role:admin');

Route::post('/create-instit', [InstitutionController::class, 'store'])->name('create-instit')->middleware('role:admin');;


Route::get('institution/edit/{id}', [InstitutionController::class, 'edit'])->name('institution/edit/{id}')->middleware('role:admin');;

Route::put('institution/update/{id}', [InstitutionController::class, 'update'])->name('institution/update/{id}')->middleware('role:admin');;


Route::get('/del-instit/{id}', [InstitutionController::class, 'delete'])->name('del-instit/{id}')->middleware('role:admin');;


Route::get('/details-instit/{id}', [InstitutionController::class, 'details'])->name('/details-instit/{id}')->middleware('role:admin');;


// Department routes


Route::get('/department', [DepartmentController::class, 'index'])->name('department');


Route::get('/add-depart', [DepartmentController::class, 'add'])->name('add-depart');

Route::post('/create-depart', [DepartmentController::class, 'store'])->name('create-depart');


Route::get('department/edit/{id}', [DepartmentController::class, 'edit'])->name('department/edit/{id}');

Route::put('department/update/{id}', [DepartmentController::class, 'update'])->name('department/update/{id}');

Route::get('/details-depart/{id}', [DepartmentController::class, 'details'])->name('/details-depart/{is}');

Route::get('/del-depart/{id}', [DepartmentController::class, 'delete'])->name('/del-depart/{id}');


// Directorate routes

Route::get('/directorate', [DirectorateController::class, 'index'])->name('directorate');

Route::get('/add-direc', [DirectorateController::class, 'add'])->name('add-direc');

Route::post('/create-direc', [DirectorateController::class, 'store'])->name('create-direc');


Route::get('directorate/edit/{id}', [DirectorateController::class, 'edit'])->name('directorate/edit/{id}');

Route::put('directorate/update/{id}', [DirectorateController::class, 'update'])->name('directorate/update/{id}');

Route::get('/details-direc/{id}', [DirectorateController::class, 'details'])->name('/details-direc/{id}');

Route::get('/del-direc/{id}', [DirectorateController::class, 'delete'])->name('/del-direc/{id}');

/* Fin Route Directorate  */


/* Reviewing wpa */

/* Route::group(['middleware' => ['can:publish articles']], function () {
    //
}); */


/* Old review routes

Route::get('planning/rv/wpa', [RvwpaController::class, 'index'])->name('planning/rv/wpa');
// {{ route('planning/rv/wpa') }}
Route::get('planning/rv/wpa/edit/{id}', [RvwpaController::class, 'edit'])->name('planning/rv/wpa/edit/{id}');


Route::put('/planning/rv/wpa/update/{id}', [RvwpaController::class, 'update'])->name('planning/rv/wpa/update/{id}');

*/


/* */
