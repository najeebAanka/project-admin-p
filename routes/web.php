<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\BigCompaniesController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectCategoriesController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\JobRequestsController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ProjectImagesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ServiceTabsController;
use App\Http\Controllers\TestimonialsController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', function () {
    return view('auth.login');
});


// Route::get('home', function () {
//     return view('home');
// });


Route::get('login', function () {
    return view('auth.login');
});

// Route::get('/projects', function () {
//     return view('projects');
// });

// Route::get('/blogs', function () {
//     return view('blogs');
// });

// Route::get('/services', function () {
//     return view('services');
// });

// Route::get('/service-tabs', function () {
//     return view('service-tabs');
// });

// Route::get('/companies', function () {
//     return view('companies');
// });

// Route::get('/jobs', function () {
//     return view('jobs');
// });

// Route::get('/project-categories', function () {
//     return view('project-categories');
// });

// Route::get('/site-settings', function () {
//     return view('site-settings');
// });

// Route::get('/partners', function () {
//     return view('partners');
// });

// Route::get('/testimonials', function () {
//     return view('testimonials');
// });

// Route::get('/single-project/{id}', function () {
//     return view('single-project');
// });

// Route::get('/job-requests', function () {
//     return view('job-requests');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });


//------------------------------------------------------






Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function () {

   // Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('/dashboard', function () {
        return view('auth.login');
        });

    Route::get('/projects', function () {
    return view('projects');
    });

    Route::get('/blogs', function () {
        return view('blogs');
    });
    
    Route::get('/big-companies', function () {
        return view('big-companies');
    });
    
    Route::get('/services', function () {
        return view('services');
    });
    
    Route::get('/service-tabs', function () {
        return view('service-tabs');
    });
    
    Route::get('/companies', function () {
        return view('companies');
    });
    
    Route::get('/jobs', function () {
        return view('jobs');
    });
    
    Route::get('/project-categories', function () {
        return view('project-categories');
    });
    
    Route::get('/site-settings', function () {
        return view('site-settings');
    });
    
    Route::get('/partners', function () {
        return view('partners');
    });
    
    Route::get('/testimonials', function () {
        return view('testimonials');
    });
    
    Route::get('/single-project/{id}', function () {
        return view('single-project');
    });
    
    Route::get('/job-requests', function () {
        return view('job-requests');
    });
    
    Route::get('/contact', function () {
        return view('contact');
    });

    Route::get('home', function () {
        return view('home');
    });



    //------------------------


Route::post('backend/project-categories/edit', [ ProjectCategoriesController::class   ,'editItem'  ]);
Route::post('backend/project-categories/delete', [ ProjectCategoriesController::class   ,'deleteItem'  ]);
Route::post('backend/project-categories/add', [ ProjectCategoriesController::class   ,'addItem'  ]);

Route::post('backend/companies/edit', [ CompaniesController::class   ,'editItem'  ]);
Route::post('backend/companies/delete', [ CompaniesController::class   ,'deleteItem'  ]);
Route::post('backend/companies/add', [ CompaniesController::class   ,'addItem'  ]);

Route::post('backend/big-companies/edit', [ BigCompaniesController::class   ,'editItem'  ]);
Route::post('backend/big-companies/delete', [ BigCompaniesController::class   ,'deleteItem'  ]);
Route::post('backend/big-companies/add', [ BigCompaniesController::class   ,'addItem'  ]);


Route::post('backend/site-settings/edit', [ SiteSettingsController::class   ,'editItem'  ]);
Route::post('backend/site-settings/delete', [ SiteSettingsController::class   ,'deleteItem'  ]);
Route::post('backend/site-settings/add', [ SiteSettingsController::class   ,'addItem'  ]);

Route::post('backend/partners/edit', [ PartnerController::class   ,'editItem'  ]);
Route::post('backend/partners/delete', [ PartnerController::class   ,'deleteItem'  ]);
Route::post('backend/partners/add', [ PartnerController::class   ,'addItem'  ]);

Route::post('backend/blogs/edit', [ BlogsController::class   ,'editItem'  ]);
Route::post('backend/blogs/delete', [ BlogsController::class   ,'deleteItem'  ]);
Route::post('backend/blogs/add', [ BlogsController::class   ,'addItem'  ]);

Route::post('backend/services/edit', [ ServicesController::class   ,'editItem'  ]);
Route::post('backend/services/delete', [ ServicesController::class   ,'deleteItem'  ]);
Route::post('backend/services/add', [ ServicesController::class   ,'addItem'  ]);

Route::post('backend/service-tabs/edit', [ ServiceTabsController::class   ,'editItem'  ]);
Route::post('backend/service-tabs/delete', [ ServiceTabsController::class   ,'deleteItem'  ]);
Route::post('backend/service-tabs/add', [ ServiceTabsController::class   ,'addItem'  ]);

Route::post('backend/jobs/edit', [ JobsController::class   ,'editItem'  ]);
Route::post('backend/jobs/delete', [ JobsController::class   ,'deleteItem'  ]);
Route::post('backend/jobs/add', [ JobsController::class   ,'addItem'  ]);

Route::post('backend/testimonials/edit', [ TestimonialsController::class   ,'editItem'  ]);
Route::post('backend/testimonials/delete', [ TestimonialsController::class   ,'deleteItem'  ]);
Route::post('backend/testimonials/add', [ TestimonialsController::class   ,'addItem'  ]);

Route::post('backend/projects/edit', [ ProjectsController::class   ,'editItem'  ]);
Route::post('backend/projects/delete', [ ProjectsController::class   ,'deleteItem'  ]);
Route::post('backend/projects/add', [ ProjectsController::class   ,'addItem'  ]);

Route::post('backend/project-images/edit', [ ProjectImagesController::class   ,'editItem'  ]);
Route::post('backend/project-images/delete', [ ProjectImagesController::class   ,'deleteItem'  ]);
Route::post('backend/project-images/add', [ ProjectImagesController::class   ,'addItem'  ]);


Route::post('backend/contacts/delete', [ ContactsController::class   ,'deleteItem'  ]);

Route::post('backend/job-requests/delete', [ JobRequestsController::class   ,'deleteItem'  ]);


});