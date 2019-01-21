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
 
Auth::routes();
Route::prefix('manage')->middleware('auth')->group(function(){
Route::get('/', 'ManageController@index');
Route::get('/dashboard','ManageController@checkRole');
Route::get('/admin','ManageController@dashboard')->name('manage.admin');
Route::resource('/users', 'UserController');
Route::resource('/roles', 'RoleController');
Route::resource('/loans', 'LoanController');
Route::get('/payslips/{id}/edit', 'PayslipController@create')->name('payslips.edit');
Route::post('/payslips/store', 'PayslipController@store')->name('payslips.store');
Route::get('/payslips/show/{id}', 'PayslipController@show')->name('payslips.show');
Route::get('/payslips/index', 'PayslipController@index')->name('payslips.index');
Route::resource('/social-securities', 'SocialSecurityController');
Route::resource('/permissions', 'PermissionController');
Route::resource('/companies', 'CompanyController');
Route::resource('/ptens', 'PtenController');
Route::resource('/draft_payslips', 'DraftPayslipController');
// Route::get('/datatables','DepartmentController@anyData')->name('datatables.data');
// Route::get('/datatables','DepartmentController@getIndex')->name('datatables');
Route::resource('/employees', 'EmployeeController');
Route::resource('/departments', 'DepartmentController');
Route::resource('/designations', 'DesignationController');
Route::resource('/counties', 'CountryController');
Route::resource('/regions', 'RegionController');
Route::resource('/banks', 'BankController');
Route::resource('/leaves', 'LeaveController');
Route::resource('/leave-types', 'LeaveTypeController');
Route::resource('/income-types', 'IncomeTypeController');
Route::resource('/deduction-types', 'DeductionTypeController');
Route::resource('/deduction-types', 'DeductionTypeController');
Route::resource('/tax-table', 'TaxTableController');
Route::resource('/work-stations', 'WorkStationController');
Route::resource('/salary-scales', 'SalaryScaleController');
Route::resource('/districts', 'DistrictController');
Route::resource('/qualifications', 'QualificationController');
Route::get('/left_employee', 'EmployeeController@left')->name('employees.left');
Route::resource('/nationality', 'NationalityController');
Route::resource('/applications', 'ApplicationController');
Route::resource('/vacancies', 'VacancyController');
Route::resource('/field-students', 'FieldStudentController');
Route::resource('/volunteers', 'VolunteerController');
Route::resource('/interns', 'InternController');
Route::resource('/bankLetter', 'BankLetterController');
Route::resource('/scholarships', 'ScholarshipController');
Route::get('/designations/get/{id}', 'DesignationController@getDesignations');
Route::get('/departments/{department_id}/{employee_id}', 'DepartmentController@makeSupervisor')->name('makeSupervisor');
Route::get('/employee/payslip/', 'PayslipController@getEmployee')->name('employee.payslip');
Route::get('/employees/get/{id}', 'EmployeeController@getEmployees');
Route::get('/company/{id}','SetCompanyController@setCompanyId')->name('manage.company');
Route::view('/mail', 'manage.mail.inbox')->name('manage.mail');
Route::view('/access-denied', 'errors.403')->name('access-denied');
Route::get('change-status/{id}/{leaveId}','LeaveController@changeStatus')->name('manage.change.leave');
Route::resource('/logs','ActivityController');
Route::get('/employee-leaves/{id}','LeaveController@viewLeave')->name('manage.employee.leave');
Route::post('/leave-request','LeaveController@requestLeave')->name('manage.leave.request');
Route::post('/open_pay_period','PayslipController@openPayPeriod')->name('openPayPeriod.store');
Route::view('/payperiod','manage.payslips.openPayPeriod')->name('openPayPeriod.create');
Route::put('/update-leave-request/{id}','LeaveController@updateLeaveRequest')->name('update.leave.request');
Route::get('/edit-leave-request/{id}','LeaveController@editLeave')->name('manage.editLeave');
Route::get('/mark_leave_as_read',function(){
    $user=Auth::user()->unreadNotifications->markAsRead();
})->name('markLeaveNotificationAsRead');

Route::get('/allEmployees',function(){
    $employees=active_employees();
    return view('manage.payslips.select')->with('employees',$employees);

})->name('employee.select');


Route::get('/payslip_pdf/{id}','PayslipController@generatePdf')->name('payslipPdf');
Route::get('/bank_letter_pdf/{id}','BankLetterController@generatePdf')->name('bankLetterPdf');


});

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');