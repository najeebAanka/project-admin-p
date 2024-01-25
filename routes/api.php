<?php

use App\Http\Middleware\LangMid;

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\BigCompaniesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\JobRequestsController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\PartnerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectCategoriesController;
use App\Http\Controllers\ProjectImagesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ServiceTabsController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutSettingsController;
use App\Http\Controllers\ServiceSettingsController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//--------------------------------API


Route::get('home-settings', [ SiteSettingsController::class   ,'homeData'  ]);


Route::get('blogs', [ BlogsController::class   ,'getBlogs'  ]);
//Route::get('blogs/{id}', [ BlogsController::class   ,'getBlogsID'  ]);

Route::get('companies', [ CompaniesController::class   ,'getCompanies'  ]);
//Route::get('companies/{id}', [ CompaniesController::class   ,'getCompaniesID'  ]);

//Route::get('contacts', [ ContactsController::class   ,'getContacts'  ]);
//Route::get('contacts/{id}', [ ContactsController::class   ,'getContactsID'  ]);

//Route::get('job-requests', [ JobRequestsController::class   ,'getJobRequests'  ]);
//Route::get('job-requests/{id}', [ JobRequestsController::class   ,'getJobRequestsID'  ]);

Route::get('jobs', [ JobsController::class   ,'getJobs'  ]);
//Route::get('jobs/{id}', [ JobsController::class   ,'getJobsID'  ]);

Route::get('partners', [ PartnerController::class   ,'getPartners'  ]);
//Route::get('partners/{id}', [ PartnerController::class   ,'getPartnersID'  ]);

Route::get('project-categories', [ ProjectCategoriesController::class   ,'getProjectCategories'  ]);
//Route::get('project-categories/{id}', [ ProjectCategoriesController::class   ,'getProjectCategoriesID'  ]);
//Route::get('single-category-projects/{id}', [ ProjectCategoriesController::class   ,'getSingleCategoryProjects'  ]);

Route::get('project-images', [ ProjectImagesController::class   ,'getProjectImages'  ]);
//Route::get('project-images/{id}', [ ProjectImagesController::class   ,'getProjectImagesID'  ]);

Route::get('projects', [ ProjectsController::class   ,'getProjects'  ]);
Route::get('projects/{id}', [ ProjectsController::class   ,'getProjectsID'  ]);

Route::get('services', [ ServicesController::class   ,'getServices'  ]);
//Route::get('services/{id}', [ ServicesController::class   ,'getServicesID'  ]);

Route::get('service-tabs', [ ServiceTabsController::class   ,'getServiceTabs'  ]);
//Route::get('service-tabs/{id}', [ ServiceTabsController::class   ,'getServiceTabsID'  ]);
//Route::get('single-service-tabs/{id}', [ ServiceTabsController::class   ,'getSingleServiceTabs'  ]);

Route::get('site-settings', [ SiteSettingsController::class   ,'getSiteSettings'  ]);
//Route::get('site-settings/{id}', [ SiteSettingsController::class   ,'getSiteSettingsID'  ]);

Route::get('testimonials', [ TestimonialsController::class   ,'getTestimonials'  ]);
//Route::get('testimonials/{id}', [ TestimonialsController::class   ,'getTestimonialsID'  ]);

Route::get('big-companies', [ BigCompaniesController::class   ,'getCompanies'  ]);

//----------------------------------

Route::post('contacts', [ ContactsController::class   ,'addItem'  ]);

Route::post('requests', [ JobRequestsController::class   ,'addItem'  ]);