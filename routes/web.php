<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
        return view('index');
    });
    
    Route::get('/home', function () {
        return view('index');
    });
Route::get('/index', function () {
    return view('index');
})->name('index');
Route::get('/employees', function () {
    return view('employees');
})->name('employees');
Route::get('/company', function () {
    return view('company');
})->name('company');
Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');
Route::get('/leave', function () {
    return view('leave');
})->name('leave');
Route::get('/reviews', function () {
    return view('reviews');
})->name('reviews');
Route::get('/reports', function () {
    return view('reports');
})->name('reports');
Route::get('/manage', function () {
    return view('manage');
})->name('manage');
Route::get('/settings', function () {
    return view('settings');
})->name('settings');
Route::get('/add-employee', function () {
    return view('add-employee');
})->name('add-employee');
Route::get('/admin', function () {
    return view('admin');
})->name('admin');
Route::get('/contact-reports', function () {
    return view('contact-reports');
})->name('contact-reports');
Route::get('/create-review', function () {
    return view('create-review');
})->name('create-review');
Route::get('/custom-timeoff-approver', function () {
    return view('custom-timeoff-approver');
})->name('custom-timeoff-approver');
Route::get('/details', function () {
    return view('details');
})->name('details');
Route::get('/documents', function () {
    return view('documents');
})->name('documents');
Route::get('/edit-review', function () {
    return view('edit-review');
})->name('edit-review');
Route::get('/email-reports', function () {
    return view('email-reports');
})->name('email-reports');
Route::get('/employees-dashboard', function () {
    return view('employees-dashboard');
})->name('employees-dashboard');
Route::get('/employees-list', function () {
    return view('employees-list');
})->name('employees-list');
Route::get('/employees-offices-list', function () {
    return view('employees-offices-list');
})->name('employees-offices-list');
Route::get('/employees-offices', function () {
    return view('employees-offices');
})->name('employees-offices');
Route::get('/employees-team', function () {
    return view('employees-team');
})->name('employees-team');
Route::get('/employment', function () {
    return view('employment');
})->name('employment');
Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');
Route::get('/leave-reports', function () {
    return view('leave-reports');
})->name('leave-reports');
Route::get('/line-manager', function () {
    return view('line-manager');
})->name('line-manager');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/manage-leadership', function () {
    return view('manage-leadership');
})->name('manage-leadership');
Route::get('/payroll-admin', function () {
    return view('payroll-admin');
})->name('payroll-admin');
Route::get('/payroll-reports', function () {
    return view('payroll-reports');
})->name('payroll-reports');
Route::get('/payroll', function () {
    return view('payroll');
})->name('payroll');
Route::get('/profile-reviews', function () {
    return view('profile-reviews');
})->name('profile-reviews');
Route::get('/profile-settings', function () {
    return view('profile-settings');
})->name('profile-settings');
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('/security-reports', function () {
    return view('security-reports');
})->name('security-reports');
Route::get('/settings-timeoff', function () {
    return view('settings-timeoff');
})->name('settings-timeoff');
Route::get('/super-admin', function () {
    return view('super-admin');
})->name('super-admin');
Route::get('/team-lead', function () {
    return view('team-lead');
})->name('team-lead');
Route::get('/team-member', function () {
    return view('team-member');
})->name('team-member');
Route::get('/time-off', function () {
    return view('time-off');
})->name('time-off');
Route::get('/work-from-home-reports', function () {
    return view('work-from-home-reports');
})->name('work-from-home-reports');


*/
Route::get('/password/reset', function () {
    return view('auth.email');
})->middleware('guest')->name('password.request');

Auth::routes();

Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/admin-page', 'HomeController@demoAdmin');
    Route::get('/listSystemUsers', 'AdminController@listSystemUsers')->name('listSystemUsers');
    Route::get('/addSystemUser', 'AdminController@addSystemUser')->name('addSystemUser');

    Route::get('/listJobTitles', 'AdminController@listJobTitles')->name('listJobTitles');
    Route::get('/addJobTitle', 'AdminController@addJobTitle')->name('addJobTitle');

    Route::resource('/employees', 'EmployeeController');
    Route::post('/employees/multiple-delete', 'EmployeeController@deleteMultiple');

    /* admin/qualifications/skills */
    Route::get('/listSkills', 'SkillsController@listSkills')->name('listSkills');
    Route::get('/addSkills', 'SkillsController@addSkills')->name('addSkills');
    Route::get('/editSkills/{id}', 'SkillsController@editSkills')->name('editSkills');
    Route::get('/deleteSkills/{id}', 'SkillsController@deleteSkills')->name('deleteSkills');
    Route::post('/storeSkill', 'SkillsController@storeSkill')->name('storeSkill');
    Route::post('/updateSkill/{id}', 'SkillsController@updateSkill')->name('updateSkill');

    /* admin/organization/locations */
    Route::get('/listLocations', 'LocationsController@listLocations')->name('listLocations');
    Route::get('/addCompanyLocation', 'LocationsController@addCompanyLocation')->name('addCompanyLocation');
    Route::get('/editCompanyLocation', 'LocationsController@editCompanyLocation')->name('editCompanyLocation');
    
});

Route::group(['middleware' => ['role:Employee']], function () {
    Route::get('/emp-page', 'HomeController@demoEmployee');
});

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile-settings', 'ProfileSettingsController@index')->name('profile-settings');
Route::post('/change-password', 'ProfileSettingsController@changePassword')->name('change-password');
