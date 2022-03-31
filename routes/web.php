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

Route::get('/password/reset', function () {
    return view('auth.email');
})->middleware('guest')->name('password.request');

Auth::routes();

Route::group(['middleware' => ['role:Admin', 'auth']], function () {    
    Route::get('/admin-page', 'HomeController@demoAdmin');

    // admin_dashboard
    Route::get('/adminDashboard', 'HomeController@index')->name('adminDashboard');

    // system_user
    Route::resource('/systemUsers', 'Admin\UserManagement\SystemUserController');
    Route::post('/systemUsers/multiple-delete', 'Admin\UserManagement\SystemUserController@deleteMultiple')->name('systemUsers.deleteMultiple');
    Route::post('/employeeNameSearch', 'Admin\UserManagement\SystemUserController@employeeNameSearch');
    Route::post('/getUsername', 'Admin\UserManagement\SystemUserController@getUsername')->name('getUsername');
    
    // job_title
    Route::resource('/jobTitles', 'Admin\Job\JobTitles\JobTitlesController');
    Route::post('/jobTitles/multiple-delete', 'Admin\Job\JobTitles\JobTitlesController@deleteMultiple')->name('jobTitles.deleteMultiple');
    // pay_grades
    Route::resource('/payGrades', 'Admin\Job\PayGrades\PayGradesController');
    Route::post('/payGrades/multiple-delete', 'Admin\Job\PayGrades\PayGradesController@deleteMultiple')->name('payGrades.deleteMultiple');

    // payGradecurrency
    Route::resource('/payGradeCurrency', 'Admin\Job\PayGrades\PayGradeCurrencyController');
    Route::post('/payGradeCurrency/multiple-delete', 'Admin\Job\PayGrades\PayGradeCurrencyController@deleteMultiple')->name('payGradeCurrency.deleteMultiple');
    // currency-autocomplete-ajax
    Route::get('/currency-autocomplete-ajax', 'Admin\Job\PayGrades\PayGradeCurrencyController@searchCurrencyAjax')->name('currency-autocomplete-ajax');
    // job_categories
    Route::resource('/jobCategory', 'Admin\Job\JobCategories\JobCategoryController');
    Route::post('/jobCategory/multiple-delete', 'Admin\Job\JobCategories\JobCategoryController@deleteMultiple')->name('jobCategory.deleteMultiple');

    // leave_period
    Route::resource('/leavePeriod', 'Leave\LeavePeriod\LeavePeriodController');
    Route::post('/leavePeriod/multiple-delete', 'Leave\LeavePeriod\LeavePeriodController@deleteMultiple')->name('leavePeriod.deleteMultiple');
    // leave_type
    Route::resource('/leaveTypes', 'Leave\LeaveType\LeaveTypeController');
    Route::post('/leaveTypes/multiple-delete', 'Leave\LeaveType\LeaveTypeController@deleteMultiple')->name('leaveTypes.deleteMultiple');
    // holidays
    Route::resource('/holidays', 'Leave\Holidays\HolidaysController');
    Route::post('/holidays/multiple-delete', 'Leave\Holidays\HolidaysController@deleteMultiple')->name('holidays.deleteMultiple');
    Route::get('/holidays-import', 'Leave\Holidays\ImportHolidaysController@index')->name('holidays.import');
    Route::post('/holidays-import', 'Leave\Holidays\ImportHolidaysController@import')->name('holidays-import');
    
    Route::resource('/myEntitlements', 'Leave\Entitlements\MyLeaveEntitlementController'); //only list of my entitlements
    Route::post('/myEntitlements/multiple-delete', 'Leave\Entitlements\MyLeaveEntitlementController@deleteMultiple')->name('myEntitlements.deleteMultiple');

    // employee   
    Route::post('/employees/multiple-delete', 'Employee\EmployeeController@deleteMultiple')->name('employees.deleteMultiple');
    Route::get('/employees-import', 'Employee\ImportEmployeeController@index')->name('employees.import');
    Route::post('/employees-import', 'Employee\ImportEmployeeController@import')->name('employees-import');    

    /* Admin/Qualifications/Skills */
    Route::resource('/skills', 'Admin\Qualifications\SkillsController');
    Route::post('/skills/multiple-delete', 'Admin\Qualifications\SkillsController@deleteMultiple')->name('skills.deleteMultiple');

    /* Admin/Organization/Locations */
    Route::resource('/locations', 'Admin\Organization\LocationsController');
    Route::post('/locations/multiple-delete', 'Admin\Organization\LocationsController@deleteMultiple')->name('locations.deleteMultiple');

    /* Time/ProjectInfo/Customers */
    Route::resource('/customers', 'Time\ProjectInfo\CustomersController');
    Route::post('/customers/multiple-delete', 'Time\ProjectInfo\CustomersController@deleteMultiple')->name('customers.deleteMultiple');

    /* Time/ProjectInfo/Projects */
    Route::resource('/projects', 'Time\ProjectInfo\ProjectsController');
    Route::get('/projects-import', 'Time\ProjectInfo\ProjectsImportController@index')->name('projects.import');
    Route::post('/projects-insert', 'Time\ProjectInfo\ProjectsImportController@import')->name('projects.insert');

    Route::post('/project-save-customer', 'Time\ProjectInfo\ProjectsController@project_save_customer')->name('project-save-customer');
    Route::post('/update-project', 'Time\ProjectInfo\ProjectsController@update_project')->name('update-project');
    Route::post('/projects/multiple-delete', 'Time\ProjectInfo\ProjectsController@deleteMultiple')->name('projects.deleteMultiple');
    Route::post('/check-assigned-manager-employees-ajax', 'Time\ProjectInfo\ProjectsController@checkAssignedEmployeeManagerAjax')->name('project.checkEmployeeAjax');
    

    /* Time/ProjectInfo/Projects/Activities */
    Route::resource('/activities', 'Time\ProjectInfo\ActivitiesController');
    Route::post('/update-activity', 'Time\ProjectInfo\ActivitiesController@update_activity')->name('update-activity');
    Route::post('/activities/multiple-delete', 'Time\ProjectInfo\ActivitiesController@deleteMultiple')->name('activities.deleteMultiple');

    /* Admin/Organization/CompanyInfo */
    Route::resource('/company', 'Admin\Organization\CompanyInfoController');
    Route::post('/update-company-name', 'Admin\Organization\CompanyInfoController@update_company_name')->name('update-company-name');
    Route::post('/update-company-info', 'Admin\Organization\CompanyInfoController@update_company_info')->name('update-company-info');
    Route::post('/update-company-contact', 'Admin\Organization\CompanyInfoController@update_company_contact')->name('update-company-contact');
    Route::post('/update-headoffice', 'Admin\Organization\CompanyInfoController@updateHeadOffice')->name('headoffice.update');

    /* Time/Attendance/Configuration */
    Route::resource('/configurations', 'Time\Attendance\ConfigurationsController');
    /* Time/Attendance/PunchInOut */
    Route::resource('/punch', 'Time\Attendance\PunchInOutController');
    Route::get('import-biometric-data', 'Biometric\BiometricImportController@index')->name('upload.biometric');
    Route::post('import-biometric-data', 'Biometric\BiometricImportController@import')->name('attendance.import');
    
});

Route::group(['middleware' => ['role:Admin|Manager|Employee', 'auth']], function () {    
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/home', 'HomeController@index')->name('home');
    // dashboard
    Route::get('/getTodayNews-ajax', 'Admin\AdminController@getTodayNews')->name('getTodayNews-ajax');
    Route::get('/getTeamLeads-ajax', 'Admin\AdminController@getTeamLeads')->name('getTeamLeads-ajax');
    Route::get('/getUpcomingLeaves-ajax', 'Admin\AdminController@getUpcomingLeaves')->name('getUpcomingLeaves-ajax');
    Route::get('/getRecentActivities-ajax', 'Admin\AdminController@getRecentActivities')->name('getRecentActivities-ajax');

    Route::get('/all-recent-activities', 'Admin\AdminController@getAllRecentActivities')->name('allRecentActivities');
    
    // employee list
    Route::resource('/employees', 'Employee\EmployeeController');
    Route::post('/upload-profile-image', 'Employee\EmployeeController@updateProfileImage')->name('profile.image');   
    Route::get('/emp-page', 'HomeController@demoEmployee');

    //Leave
    Route::get('leave-list', 'Leave\Leave\LeaveController@getLeaveList')->name('leave.list');
    Route::resource('/leave', 'Leave\Leave\LeaveController');
    Route::post('leave/leave-balance-ajax', 'Leave\Leave\LeaveController@getLeaveBalance')->name('leave-balance-ajax');
    Route::delete('leave/delete-leave', 'Leave\Leave\LeaveController@destroy')->name('leave.delete_modal');
    Route::resource('/myEntitlements', 'Leave\Entitlements\MyLeaveEntitlementController'); //only list of my entitlements
    Route::get('my-info', 'Employee\EmployeeController@myInfo')->name('myinfo');

    /* Time/Timesheets/MyTimesheets */
    Route::resource('/mytimesheets', 'Time\Timesheets\MyTimesheetsController');
    Route::post('/mytimesheets/status-change', 'Time\Timesheets\MyTimesheetsController@updateStatusAjax')->name('mytimesheets.submit');
    Route::post('/mytimesheets/getMyTimeSheets-ajax', 'Time\Timesheets\MyTimesheetsController@getMyTimeSheets')->name('getMyTimeSheets-ajax');
    Route::post('/mytimesheets/multiple-delete', 'Time\Timesheets\MyTimesheetsController@deleteMultiple')->name('mytimesheets.deleteMultiple');
    // add Timesheets
    Route::get('/timesheets.create', 'Time\Timesheets\TimesheetsController@create')->name('timesheets.create');
    Route::post('/timesheets.store', 'Time\Timesheets\TimesheetsController@store')->name('timesheets.store');
    Route::post('/timesheets/multiple-delete', 'Time\Timesheets\TimesheetsController@deleteMultiple')->name('timesheets.deleteMultiple');

    //Employee autocomplete ajax
    Route::get('/employee-autocomplete-ajax', 'Employee\EmployeeController@searchEmployeeAjax')->name('ajax.employee_search');
    //Customers autocomplete ajax
    Route::get('/customers-autocomplete-ajax', 'Time\ProjectInfo\ProjectsController@searchCustomerAjax')->name('ajax.customers_search');
    //Project autocomplete ajax
    Route::get('/project-autocomplete-ajax', 'Time\ProjectInfo\ProjectsController@searchProjectAjax')->name('ajax.project_search');
    //Project admin autocomplete ajax
    Route::get('/project-admin-autocomplete-ajax', 'Time\ProjectInfo\ProjectsController@searchProjectAdminAjax')->name('ajax.project_admin_search');
    //Activity autocomplete ajax
    Route::post('/getActivityName-ajax', 'Time\ProjectInfo\ActivitiesController@getActivityName')->name('getActivityName-ajax');
    //country autocomplete ajax
    Route::get('/country-autocomplete-ajax', 'Admin\Organization\LocationsController@searchCountryAjax')->name('country-autocomplete-ajax');


    Route::resource('/punch', 'Time\Attendance\PunchInOutController');
    Route::post('/punch/multiple-delete', 'Time\Attendance\PunchInOutController@deleteMultiple')->name('punch.deleteMultiple');    
    Route::post('/punch/update-ajax', 'Time\Attendance\PunchInOutController@updateAjax')->name('punch.update-ajax');
    Route::post('/punch/status-change', 'Time\Attendance\PunchInOutController@updateStatusAjax')->name('punch.submit');    

    Route::post('/timesheets/getEmployeeTimeSheets-ajax', 'Time\Timesheets\TimesheetsController@getEmployeeTimeSheets')->name('getEmployeeTimeSheets-ajax');

    // Payslips
    Route::resource('payslips', 'Payslips\PayslipController');
    Route::get('payslip/upload', 'Payslips\PayslipController@uploadMultiple')->name('payslip.multiple');
    Route::post('payslip/upload', 'Payslips\PayslipController@storeMultipleFiles')->name('payslip.uploadMultiple');
    Route::get('payslip-download', 'Payslips\PayslipController@download')->name('payslip.download');
    Route::get('download-sample-file', 'Payslips\PayslipController@sampleDownload')->name('sample.download');
    Route::post('payslip-details-ajax', 'Payslips\PayslipController@downloadAjax')->name('payslip.ajax');

});

Route::group(['middleware' => ['role:Admin|Manager', 'auth']], function () {
    // dashboard news
    Route::resource('/news', 'Admin\NewsController');
    Route::post('/news/multiple-delete', 'Admin\NewsController@deleteMultiple')->name('news.deleteMultiple');
    Route::get('/getEmployeeChart-ajax', 'Employee\EmployeeController@getEmployeeChartData')->name('getEmployeeChart-ajax');
    Route::get('/getRequestChart-ajax', 'Admin\AdminController@getRequestChart')->name('getRequestChart-ajax');

    //Leave
    Route::post('leave-admin-action', 'Leave\Leave\LeaveController@adminAction')->name('leave.action');
    Route::get('leave-assign', 'Leave\Leave\LeaveController@assign')->name('leave.assign');
    Route::post('getEmployeeHolidays-ajax', 'Leave\Leave\LeaveController@getEmployeeHolidays')->name('getEmployeeHolidays-ajax');

    Route::get('employee-records', 'Time\Attendance\PunchInOutController@getEmployeeRecords')->name('punch.employee-records');
    Route::post('attendance-admin-action', 'Time\Attendance\PunchInOutController@adminAction')->name('punch.action');

    // Employee Entitlement List
    Route::resource('/leaveEntitlement', 'Leave\Entitlements\LeaveEntitlementController'); // add
    Route::post('/getSubUnits-ajax', 'Leave\Entitlements\LeaveEntitlementController@getSubUnits')->name('getSubUnits-ajax');
    Route::post('/getLeavePeriods-ajax', 'Leave\Entitlements\LeaveEntitlementController@getLeavePeriods')->name('getLeavePeriods-ajax');
    
    Route::post('/leaveEntitlement/multiple-delete', 'Leave\Entitlements\LeaveEntitlementController@deleteMultiple')->name('leaveEntitlement.deleteMultiple');

    // Employee Timesheet List
    Route::get('/timesheets', 'Time\Timesheets\TimesheetsController@index')->name('timesheets.index');

    //Reports
    Route::get('/reports', 'Reports\ReportsController@index')->name('reports.index');
    Route::post('timesheets-admin-action', 'Time\Timesheets\TimesheetsController@adminAction')->name('timesheets.action');
});

Route::get('/', 'HomeController@index')->name('index');
Route::post('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'HomeController@index');
Route::get('/profile-settings', 'ProfileSettingsController@index')->name('profile-settings');
Route::post('/change-password', 'ProfileSettingsController@changePassword')->name('change-password');
Route::get('/profile-settings', 'ProfileSettingsController@index')->name('profile-settings');
