<?php
use App\Http\Controllers\Cms\Admin\CollegeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('parent');
});


Route::prefix('cms/admin')->name('admin.')->group(function () {

    Route::view('/dashboard', 'cms.admin.dashboard')->name('dashboard');

    Route::view('/students', 'cms.admin.student')->name('students');
    Route::view('/companies', 'cms.admin.company')->name('companies');
    Route::view('/supervisors', 'cms.admin.supervisor')->name('supervisors');
    Route::view('/opportunities', 'cms.admin.opportunity')->name('opportunities');
    Route::view('/internships', 'cms.admin.internship')->name('internships');
    Route::view('/reports', 'cms.admin.report')->name('reports');
    Route::view('/certificates', 'cms.admin.cirtificate')->name('certificates');
    Route::view('/notifications', 'cms.admin.notifications')->name('notifications');

    Route::resource('colleges', CollegeController::class);

});



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


Route::get('/register-student', function () {
        return view('front.auth.register-student');
    })->name('front.auth.register-student');
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

});



Route::prefix('cms/company')->group(function () {


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