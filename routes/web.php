<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cms\Admin\AcompanyController;
use App\Http\Controllers\Cms\Admin\AstudentController;
use App\Http\Controllers\Cms\Admin\AsuperviosController;
use App\Http\Controllers\Cms\Admin\CityController;
use App\Http\Controllers\Cms\Admin\CollegeController;
use App\Http\Controllers\Cms\Admin\SpecializationController;
use App\Http\Controllers\Cms\Supervisorms\StudentController as SupervisormsStudentController;
use App\Http\Controllers\CompanyprofileController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentprofileController;
use App\Http\Controllers\StudentHourController;
use App\Http\Controllers\WeeklyReportController;
use App\Http\Controllers\InternshipController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('front.home.index');
})->name('home');

// --- روابط المصادقة (Auth) ---
Route::prefix('front/auth')->group(function () {
    Route::get('/login', function () { return view('front.auth.login'); })->name('front.auth.login');
    Route::get('/forget_password', function () { return view('front.auth.forget_password'); })->name('front.auth.forgot-password');
    Route::get('/register-new', function () { return view('front.auth.register-type'); })->name('front.auth.register-new');
    Route::get('/register-company', function () { return view('front.auth.register-company'); })->name('front.auth.register-company');
    Route::get('/register-student', [AuthController::class, 'registerStudent'])->name('front.auth.register-student');
    Route::get('/college-specializations/{college}', [AuthController::class, 'getCollegeSpecializations']);
});

// --- روابط الطالب () ---
Route::prefix('front/student')->middleware('auth')->group(function () {
    // صفحة التدريب الرئيسية ()
    Route::get('/internship', [InternshipController::class, 'index'])->name('front.student.internship');

    // الساعات ()
    Route::get('/hours', [StudentHourController::class, 'index'])->name('front.student.hours');
    Route::post('/hours', [StudentHourController::class, 'store'])->name('hours.store');

    // التقارير الأسبوعية ()
    Route::get('/weekly-reports', [WeeklyReportController::class, 'index'])->name('front.student.weekly-reports');
    Route::post('/weekly-reports', [WeeklyReportController::class, 'store'])->name('reports.store');

    // بروفايل ولوحة تحكم الطالب ()
    Route::resource('editProfile', StudentprofileController::class);
    Route::get('/dashboard', function () { return view('front.student.dashboard'); })->name('front.student.dashboard');
    Route::get('/profile', function () { return view('front.student.profile'); })->name('front.student.profile');
    Route::get('/applications', function () { return view('front.student.applications'); })->name('front.student.applications');
    Route::get('/certificate', function () { return view('front.student.certificate'); })->name('front.student.certificate');
    Route::get('/notifications', function () { return view('front.student.notifications'); })->name('front.student.notifications');
    Route::get('/messages', function () { return view('front.student.massege'); })->name('front.student.massege');
});

// --- روابط المشرف () ---
Route::prefix('cms/supervisor')->middleware('auth')->group(function () {
    // مراجعة التقارير ()
    Route::get('/weekly-reports', [WeeklyReportController::class, 'review'])->name('cms.supervisor.weekly-reports');
    Route::post('/weekly-reports/approve/{id}', [WeeklyReportController::class, 'approve'])->name('reports.approve');

    // مهام المشرف الأخرى ()
    Route::resource('Supervisormsstudent', SupervisormsStudentController::class);
    Route::get('/dashboard', function () { return view('cms.supervisor.dashboard'); })->name('cms.supervisor.dashboard');
    Route::get('/profile', function () { return view('cms.supervisor.profile'); })->name('cms.supervisor.profile');
    Route::get('/evaluation', function () { return view('cms.supervisor.evaluation'); })->name('cms.supervisor.evaluation');
});

// --- روابط الشركة () ---
Route::prefix('cms/company')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () { return view('cms.company.dashboard'); })->name('cms.Company.dashboard');
    Route::get('/applications', function () { return view('cms.company.applications'); })->name('cms.Company.applications');
    Route::get('/opportunities', function () { return view('cms.company.opportunities'); })->name('cms.Company.opportunities');
    Route::resource('editProfile', CompanyprofileController::class);
});

// --- لوحة تحكم الإدمن (CMS Admin) ---
Route::prefix('cms/admin')->name('admin.')->middleware('auth')->group(function () {
    Route::view('/dashboard', 'cms.admin.dashboard')->name('dashboard');
    Route::resource('student', AstudentController::class);
    Route::resource('companies', AcompanyController::class);
    Route::resource('supervisor', AsuperviosController::class);
    Route::resource('colleges', CollegeController::class);
    Route::resource('specializations', SpecializationController::class);
    Route::resource('cities', CityController::class);
});

// روابط الفرص ()
Route::resource('opportunities', OpportunityController::class);
Route::post('opportunities_update/{id}', [OpportunityController::class, 'update'])->name('opportunities_update');