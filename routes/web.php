<?php

use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\TenderController as AdminTenderController;
use App\Http\Controllers\Admin\VacancyApplicationController;
use App\Http\Controllers\Frontend\InvestorIdeaController;
use App\Http\Controllers\Frontend\TenderController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Blade\HomeController;
use App\Http\Controllers\Blade\RoleController;
use App\Http\Controllers\Blade\UserController;
use App\Http\Controllers\Blade\ApiUserController;
use App\Http\Controllers\Blade\PermissionController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Blade\ProjectController;

// Sitemap Route
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Load test routes (comment out in production)
if (file_exists(__DIR__ . '/test.php')) {
    require __DIR__ . '/test.php';
}

Route::get('/investment-project', [FrontendController::class, 'investmentProjects'])->name('frontend.investment-projects');

Route::get('/jac-projects', [FrontendController::class, 'jacProjects'])->name('frontend.jac-projects');


Auth::routes(['register' => false]);

// Welcome page (Admin dashboard)
Route::get('/admin', [HomeController::class, 'index']);



Route::get('/home', [HomeController::class, 'index'])->name('home');
// Web pages
Route::group(['middleware' => ['auth', 'checkUserRole']], function () {

Route::prefix('admin/news')->name('admin.news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');           // GET /admin/news
    Route::get('/create', [NewsController::class, 'create'])->name('create');   // GET /admin/news/create
    Route::post('/', [NewsController::class, 'store'])->name('store');          // POST /admin/news
    Route::get('/{news}', [NewsController::class, 'show'])->name('show');       // GET /admin/news/{id}
    Route::get('/{news}/edit', [NewsController::class, 'edit'])->name('edit');  // GET /admin/news/{id}/edit
    Route::put('/{news}', [NewsController::class, 'update'])->name('update');   // PUT /admin/news/{id}
    Route::delete('/{news}', [NewsController::class, 'destroy'])->name('destroy'); // DELETE /admin/news/{id}
});
Route::post('news/{news}/remove-image', [NewsController::class, 'removeImage'])
      ->name('news.removeImage');

// Vacancy Applications
Route::prefix('admin/vacancy-applications')->name('admin.vacancy-applications.')->group(function () {
    Route::get('/', [VacancyApplicationController::class, 'index'])->name('index');
    Route::get('/{id}', [VacancyApplicationController::class, 'show'])->name('show');
    Route::put('/{id}/status', [VacancyApplicationController::class, 'updateStatus'])->name('update-status');
    Route::delete('/{id}', [VacancyApplicationController::class, 'destroy'])->name('destroy');
});

// Tenders CRUD
Route::prefix('admin/tenders')->name('admin.tenders.')->group(function () {
    Route::get('/', [AdminTenderController::class, 'index'])->name('index');
    Route::get('/create', [AdminTenderController::class, 'create'])->name('create');
    Route::post('/', [AdminTenderController::class, 'store'])->name('store');
    Route::get('/{tender}', [AdminTenderController::class, 'show'])->name('show');
    Route::get('/{tender}/edit', [AdminTenderController::class, 'edit'])->name('edit');
    Route::put('/{tender}', [AdminTenderController::class, 'update'])->name('update');
    Route::delete('/{tender}', [AdminTenderController::class, 'destroy'])->name('destroy');
    Route::post('/{tender}/remove-document', [AdminTenderController::class, 'removeDocument'])->name('removeDocument');
});


    Route::get('/optimize-cache', [HomeController::class, 'optimize'])->name('optimize.command');

        // Statistics
        Route::get('/statistics', [HomeController::class, 'statistics'])->name('admin.statistics');


    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');


    // Permissions
    Route::prefix('permissions')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('permissionIndex');
        Route::get('/add', [PermissionController::class, 'add'])->name('permissionAdd');
        Route::post('/create', [PermissionController::class, 'create'])->name('permissionCreate');
        Route::get('/{id}/edit', [PermissionController::class, 'edit'])->name('permissionEdit');
        Route::post('/update/{id}', [PermissionController::class, 'update'])->name('permissionUpdate');
        Route::delete('/delete/{id}', [PermissionController::class, 'destroy'])->name('permissionDestroy');
    });
    // Roles
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('roleIndex');
        Route::get('/add', [RoleController::class, 'add'])->name('roleAdd');
        Route::post('/create', [RoleController::class, 'create'])->name('roleCreate');
        Route::get('/{role_id}/edit', [RoleController::class, 'edit'])->name('roleEdit');
        Route::post('/update/{role_id}', [RoleController::class, 'update'])->name('roleUpdate');
        Route::delete('/delete/{id}', [RoleController::class, 'destroy'])->name('roleDestroy');
    });
    // ApiUsers
    Route::prefix('api-users')->group(function () {
        Route::get('/', [ApiUserController::class, 'index'])->name('api-userIndex');
        Route::get('/add', [ApiUserController::class, 'add'])->name('api-userAdd');
        Route::post('/create', [ApiUserController::class, 'create'])->name('api-userCreate');
        Route::get('/show/{id}', [ApiUserController::class, 'show'])->name('api-userShow');
        Route::get('/{id}/edit', [ApiUserController::class, 'edit'])->name('api-userEdit');
        Route::post('/update/{id}', [ApiUserController::class, 'update'])->name('api-userUpdate');
        Route::delete('/delete/{id}', [ApiUserController::class, 'destroy'])->name('api-userDestroy');
        Route::delete('-token/delete/{id}', [ApiUserController::class, 'destroyToken'])->name('api-tokenDestroy');
    });
});

Route::group(['middleware' => ['auth']], function () {
    // Users
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('userIndex');
        Route::get('/add', [UserController::class, 'add'])->name('userAdd');
        Route::post('/create', [UserController::class, 'create'])->name('userCreate');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('userEdit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('userUpdate');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('userDestroy');
        Route::get('/theme-set/{id}', [UserController::class, 'setTheme'])->name('userSetTheme');
    });
});

Route::get('/language/{lang}', [FrontendController::class, 'changeLanguage'])->name('changelang');

// new -----------------------

// Redirect old bidding URL
Route::get('/ru/bidding.html', [FrontendController::class, 'redirectBidding']);

Route::prefix('')->name('frontend.')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('index');
    // Route::get('/investoram', [FrontendController::class, 'investoram'])->name('investoram');
    Route::get('/investoram/{subcategory?}', [FrontendController::class, 'investoram'])->name('investoram');



    Route::get('/zakupki', [FrontendController::class, 'zakupki'])->name('zakupki');
    Route::group(['prefix' => 'media'], function () {
        Route::get('/', [FrontendController::class, 'media'])->name('media');
        Route::get('/news/{id}', [FrontendController::class, 'mediaDetail'])->name('media.detail');

    });

    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::get('/ustav', [FrontendController::class, 'ustav'])->name('ustav');
    Route::get('/struktura', [FrontendController::class, 'struktura'])->name('struktura');
    Route::get('/supervisory-board', [FrontendController::class, 'supervisory_board'])->name('supervisory_board');
    Route::get('/supervisory_board_committees', [FrontendController::class, 'supervisory_board_committees'])->name('supervisory_board_committees');
    Route::get('/board', [FrontendController::class, 'board'])->name('board');
    Route::get('/decision-on-the-initial-issue', [FrontendController::class, 'decision'])->name('decision');
    Route::get('/reports', [FrontendController::class, 'reports'])->name('reports');
    Route::get('/balance', [FrontendController::class, 'balance'])->name('balance');
    Route::get('/income', [FrontendController::class, 'income'])->name('income');
    Route::get('/spisok', [FrontendController::class, 'spisok'])->name('spisok');
    Route::get('/share-struktura', [FrontendController::class, 'share_struktura'])->name('share_struktura');
    Route::get('/kodeks', [FrontendController::class, 'kodeks'])->name('kodeks');
    Route::get('/vacancies', [FrontendController::class, 'vacancies'])->name('vacancies');
    Route::post('/vacancies/apply', [FrontendController::class, 'submitVacancyApplication'])->name('vacancies.apply');
    Route::get('/development_strategies', [FrontendController::class, 'development_strategies'])->name('development_strategies');
    Route::get('/business_plan', [FrontendController::class, 'business_plan'])->name('business_plan');
    Route::get('/xaridlar', [FrontendController::class, 'xaridlar'])->name('xaridlar');
    Route::get('/offers', [FrontendController::class, 'offers'])->name('offers');
    Route::get('/internal_documents_of_the_company', [FrontendController::class, 'internal_documents_of_the_company'])->name('internal_documents_of_the_company');
    Route::get('/essential_facts', [FrontendController::class, 'essential_facts'])->name('essential_facts');
    Route::get('/assessment_system', [FrontendController::class, 'assessment_system'])->name('assessment_system');
    Route::get('/essential_facts/{number}', [FrontendController::class, 'essential_facts_show'])->name('essential_facts.show');
    Route::get('/npa', [FrontendController::class, 'npa'])->name('npa');
    Route::get('/investoram_slayd', [FrontendController::class, 'investoram_slayd'])->name('investoram_slayd');
    Route::get('/about_us', [FrontendController::class, 'about_us'])->name('about_us');
    Route::get('/nizomlar', [FrontendController::class, 'nizomlar'])->name('nizomlar');

    Route::get('/key_performance_indicators', [FrontendController::class, 'key_performance_indicators'])->name('key_performance_indicators');
    Route::get('/risk_takers', [FrontendController::class, 'risk_takers'])->name('risk_takers');
    Route::get('/information_on_the_purchase_of_shares_by_the_company', [FrontendController::class, 'information_on_the_purchase_of_shares_by_the_company'])->name('information_on_the_purchase_of_shares_by_the_company');
    Route::get('/dividends', [FrontendController::class, 'dividends'])->name('dividends');
    Route::get('/charter_capital', [FrontendController::class, 'charter_capital'])->name('charter_capital');
    Route::get('/open_tender_notice', [FrontendController::class, 'open_tender_notice'])->name('open_tender_notice');

        // Dynamic Tenders
        Route::prefix('tenders')->name('tenders.')->group(function () {
            Route::get('/', [TenderController::class, 'index'])->name('index');
            Route::get('/{id}', [TenderController::class, 'show'])->name('show');
        });

    // Investor Ideas Routes
    Route::prefix('investor-ideas')->name('investor_ideas.')->group(function () {
        Route::get('/', [InvestorIdeaController::class, 'index'])->name('index');
        Route::get('/create', [InvestorIdeaController::class, 'create'])->name('create');
        Route::post('/', [InvestorIdeaController::class, 'store'])->name('store');
        Route::get('/success', [InvestorIdeaController::class, 'success'])->name('success');
        Route::get('/{id}', [InvestorIdeaController::class, 'show'])->name('show');
    });
});


