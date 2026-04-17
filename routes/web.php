<?php

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
use App\Models\Opportunity;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentprofileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('parent');
});

Route::prefix('cms/admin')->name('admin.')->group(function () {
    Route::resource('student', AstudentController::class);
    Route::resource('companies', AcompanyController::class);
    Route::resource('supervisor', AsuperviosController::class);

    Route::view('/dashboard', 'cms.admin.dashboard')->name('dashboard');
    Route::view('/students', 'cms.admin.student')->name('students');
    Route::view('/companies', 'cms.admin.company')->name('companies');
    Route::view('/supervisors', 'cms.admin.supervisor')->name('supervisors');
    Route::view('/opportunities', 'cms.admin.opportunity')->name('opportunities');
    Route::view('/internships', 'cms.admin.internship')->name('internships');
    Route::view('/reports', 'cms.admin.report')->name('reports');
    Route::view('/certificates', 'cms.admin.cirtificate')->name('certificates');
    Route::view('/notifications', 'cms.admin.notifications')->name('notifications');

    Route::get('colleges/trashed', [CollegeController::class, 'trashed'])->name('colleges.trashed');
    Route::get('colleges/restore/{id}', [CollegeController::class, 'restore'])->name('colleges.restore');
    Route::delete('colleges/force/{id}', [CollegeController::class, 'force'])->name('colleges.force');
    Route::delete('colleges/force-all', [CollegeController::class, 'forceAll'])->name('colleges.forceAll');

    Route::resource('colleges', CollegeController::class);

    Route::get('specializations/trashed', [SpecializationController::class, 'trashed'])->name('specializations.trashed');
    Route::get('specializations/restore/{id}', [SpecializationController::class, 'restore'])->name('specializations.restore');
    Route::delete('specializations/force/{id}', [SpecializationController::class, 'force'])->name('specializations.force');
    Route::delete('specializations/force-all', [SpecializationController::class, 'forceAll'])->name('specializations.forceAll');

    Route::resource('specializations', SpecializationController::class);

    Route::get('cities/trashed', [CityController::class, 'trashed'])->name('cities.trashed');
    Route::get('cities/restore/{id}', [CityController::class, 'restore'])->name('cities.restore');
    Route::delete('cities/force/{id}', [CityController::class, 'force'])->name('cities.force');

    Route::resource('cities', CityController::class);

});



 Route::resource('opportunities', OpportunityController::class);
 Route::post('opportunities_update/{id}',[ OpportunityController::class , 'update'])->name('opportunities_update');
 Route::get('opportunities_trashed',[ OpportunityController::class , 'trashed'])->name('opportunities_trashed');
 Route::get('opportunities_restore/{id}',[ OpportunityController::class , 'restore'])->name('opportunities_restore');
 Route::get('opportunities_force/{id}',[ OpportunityController::class , 'force'])->name('opportunities_force');
 Route::get('opportunities_forceAll',[ OpportunityController::class , 'forceAll'])->name('opportunities_forceAll');




Route::prefix('front/auth')->group(function () {

    Route::get('/forget_password', function () {
        return view('front.auth.forget_password');
    })->name('front.auth.forgot-password');
    Route::get('/login', function () {
        return view('front.auth.login');
    })->name('front.auth.login');
    Route::get('/register-company', function () {
        return view('front.auth.register-company');
    })->name('front.auth.register-company');

    Route::get('/register-new', function () {
        return view('front.auth.register-type');
    })->name('front.auth.register-new');

    Route::get('/college-specializations/{college}', [AuthController::class, 'getCollegeSpecializations']);
    Route::get('/register-student', [AuthController::class, 'registerStudent'])
        ->name('front.auth.register-student');
});

Route::prefix('front/home')->group(function () {
    Route::get('/', function () {
        return view('front.home.index');
    })->name('front.home.index');

    Route::get('/about', function () {
        return view('front.home.about');
    })->name('front.home.about');

    Route::get('/how-it-works', function () {
        return view('front.home.how-it-works');
    })->name('front.home.how-it-works');

    Route::get('/opportunities', function () {
        return view('front.home.opportunities');
    })->name('front.home.opportunities');

    Route::get('/opportunity-details', function () {
        return view('front.home.opportunity-details');
    })->name('front.home.opportunity-details');
});

Route::prefix('front/student')->group(function () {
    Route::resource('editProfile', StudentprofileController::class);

    Route::get('/applications', function () {
        return view('front.student.applications');
    })->name('front.student.applications');

    Route::get('/certificate', function () {
        return view('front.student.certificate');
    })->name('front.student.certificate');

    Route::get('/dashboard', function () {
        return view('front.student.dashboard');
    })->name('front.student.dashboard');

    Route::get('/hours', function () {
        return view('front.student.hours');
    })->name('front.student.hours');

    Route::get('/internship', function () {
        return view('front.student.internship');
    })->name('front.student.internship');

    Route::get('/notifications', function () {
        return view('front.student.notifications');
    })->name('front.student.notifications');

    Route::get('/profile', function () {
        return view('front.student.profile');
    })->name('front.student.profile');

    Route::get('/weekly-reports', function () {
        return view('front.student.reports');
    })->name('front.student.weekly-reports');
    Route::get('/messages', function () {
        return view('front.student.massege');
    })->name('front.student.massege');

    Route::resource('students', StudentController::class);
});

Route::prefix('cms/company')->group(function () {
    Route::resource('editProfile', CompanyprofileController::class);

    Route::view('/parent', 'cms.company.parent')->name('parent');

    Route::get('/dashboard', function () {
        return view('cms.company.dashboard');
    })->name('cms.Company.dashboard');

    Route::get('/applications', function () {
        return view('cms.company.applications');
    })->name('cms.Company.applications');

    Route::get('/evaluation', function () {
        return view('cms.company.evaluation');
    })->name('cms.Company.evaluation');

    Route::get('/interns', function () {
        return view('cms.company.interns');
    })->name('cms.Company.interns');

    Route::get('/notifications', function () {
        return view('cms.company.notifications');
    })->name('cms.Company.notifications');

    Route::get('/opportunities', function () {
        return view('cms.company.opportunities');
    })->name('cms.Company.opportunities');

    Route::get('/opportunity-create', function () {
        return view('cms.company.opportunity-create');
    })->name('cms.Company.opportunity-create');

    Route::get('/profile', function () {
        return view('cms.company.profile');
    })->name('cms.Company.profile');
    Route::get('/profileintern', function () {
        return view('cms.company.internsprofile');
    })->name('cms.company.internsprofile');
    Route::get('/change_password', function () {
        return view('cms.company.change_password');
    })->name('cms.company.change-password');

});

Route::prefix('cms/supervisor')->group(function () {
    Route::resource('Supervisormsstudent', SupervisormsStudentController::class);
    Route::resource('editProfile', 'SupervisorprofileController'::class);
    Route::view('/parent', 'cms.supervisor.parent')->name('parent');
    Route::get('/dashboard', function () {
        return view('cms.supervisor.dashboard');
    })->name('cms.supervisor.dashboard');

    Route::get('/evaluation', function () {
        return view('cms.supervisor.evaluation');
    })->name('cms.supervisor.evaluation');

    Route::get('/students', function () {
        return view('cms.supervisor.students');
    })->name('cms.supervisor.estudents');

    Route::get('/messages', function () {
        return view('cms.supervisor.messages');
    })->name('cms.supervisor.imessages');

    Route::get('/notifications', function () {
        return view('cms.supervisor.notifications');
    })->name('cms.supervisor.notifications');

    Route::get('/weekly-reports', function () {
        return view('cms.supervisor.weekly-reports');
    })->name('cms.supervisor.weekly-reports');
    Route::get('/profile', function () {
        return view('cms.supervisor.profile');
    })->name('cms.supervisor.profile');
    Route::get('/change_password', function () {
        return view('cms.supervisor.change_password');
    })->name('cms.supervisor.change-password');

});
