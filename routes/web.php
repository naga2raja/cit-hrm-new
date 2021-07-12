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

    // admin_dashboard
    Route::get('/adminDashboard', 'Admin\AdminController@index')->name('adminDashboard');
    // system_user
    Route::resource('/systemUsers', 'Admin\UserManagement\SystemUserController');
    Route::post('/systemUsers/multiple-delete', 'Admin\UserManagement\SystemUserController@deleteMultiple');
    Route::post('/employeeNameSearch', 'Admin\UserManagement\SystemUserController@employeeNameSearch');
    
    // job_title
    Route::resource('/jobTitles', 'Admin\Job\JobTitles\JobTitlesController');
    Route::post('/jobTitles/multiple-delete', 'Admin\Job\JobTitles\JobTitlesController@deleteMultiple');
    // pay_grades
    Route::resource('/payGrades', 'Admin\Job\PayGrades\PayGradesController');
    Route::post('/payGrades/multiple-delete', 'Admin\Job\PayGrades\PayGradesController@deleteMultiple');
    Route::post('/currencyNameSearch', 'Admin\Job\PayGrades\PayGradesController@currencyNameSearch');
    // payGradecurrency
    Route::resource('/payGradeCurrency', 'Admin\Job\PayGrades\PayGradeCurrencyController');
    // job_categories
    Route::resource('/jobCategory', 'Admin\Job\JobCategories\JobCategoryController');
    Route::post('/jobCategory/multiple-delete', 'Admin\Job\JobCategories\JobCategoryController@deleteMultiple');

    // leave_period
    Route::resource('/leavePeriod', 'Leave\LeavePeriod\LeavePeriodController');
    // leave_type
    Route::resource('/leaveTypes', 'Leave\LeaveType\LeaveTypeController');

    // employee
    Route::resource('/employees', 'EmployeeController');
    Route::post('/employees/multiple-delete', 'EmployeeController@deleteMultiple');

    /* Admin/Qualifications/Skills */
    Route::resource('/skills', 'Admin\Qualifications\SkillsController');
    Route::post('/skills/multiple-delete', 'Admin\Qualifications\SkillsController@deleteMultiple');

    /* Admin/Organization/Locations */
    Route::resource('/locations', 'Admin\Organization\LocationsController');
    Route::post('/locations/multiple-delete', 'Admin\Organization\LocationsController@deleteMultiple');

    /* Time/ProjectInfo/Customers */
    Route::resource('/customers', 'Time\ProjectInfo\CustomersController');
    Route::post('/customers/multiple-delete', 'Time\ProjectInfo\CustomersController@deleteMultiple');

    /* Time/ProjectInfo/Projects */
    Route::resource('/projects', 'Time\ProjectInfo\ProjectsController');
    Route::post('/customers-search', 'Time\ProjectInfo\ProjectsController@customers_search')->name('customers-search');
    Route::post('/projects-search', 'Time\ProjectInfo\ProjectsController@projects_search')->name('projects-search');
    Route::post('/project-admin-search', 'Time\ProjectInfo\ProjectsController@project_admin_search')->name('project-admin-search'); 
    Route::post('/project-save-customer', 'Time\ProjectInfo\ProjectsController@project_save_customer')->name('project-save-customer'); 
    
});

Route::group(['middleware' => ['role:Employee']], function () {
    Route::get('/emp-page', 'HomeController@demoEmployee');
});

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile-settings', 'ProfileSettingsController@index')->name('profile-settings');
Route::post('/change-password', 'ProfileSettingsController@changePassword')->name('change-password');
