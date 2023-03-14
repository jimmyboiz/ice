<?php

// Call Controller

use App\Http\Controllers\AccessController;
use App\Http\Controllers\AgreementController;
use App\Http\Controllers\CarryProjectController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentUnitController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DrawingController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EnvironmentalController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OtherRecordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubGroupController;
use App\Http\Controllers\SubReportController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\WatchlistController;

use Illuminate\Support\Facades\Route;

// use Illuminate\Support\Facades\Redirect;
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
// function previous() {
//     return redirect()->back();
// }

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    // System Module Route
    Route::get('/system-dashboard', [SystemController::class, 'index'])->name('system.index');
    Route::post('/system-update/{system_id}', [SystemController::class, 'update'])->name('system.update');
    Route::post('/system-create', [SystemController::class, 'store'])->name('system.store');

    // System Access Module Route
    Route::get('/system-access', [AccessController::class, 'create'])->name('access.create');
    Route::post('/system-access/store', [AccessController::class, 'store'])->name('access.store');

    // Employee Module Route
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
    Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::post('/employee/update/{emp_id}', [EmployeeController::class, 'update'])->name('employee.update');

    // Company Module Route
    Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
    Route::post('/company/store', [CompanyController::class, 'store'])->name('company.store');
    Route::post('/company/update/{company_id}', [CompanyController::class, 'update'])->name('company.update');

    // Department Module Route
    Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
    Route::post('/department/store', [DepartmentController::class, 'store'])->name('department.store');
    Route::post('/department/update/{dept_d}', [DepartmentController::class, 'update'])->name('department.update');

    // Department Unit Module Route
    Route::get('/deptUnit', [DepartmentUnitController::class, 'index'])->name('deptUnit.index');
    Route::post('/deptUnit/store', [DepartmentUnitController::class, 'store'])->name('deptUnit.store');
    Route::post('/deptUnit/update/{dept_unit_id}', [DepartmentUnitController::class, 'update'])->name('deptUnit.update');

    // Designation Module Route
    Route::get('/designation', [DesignationController::class, 'index'])->name('designation.index');
    Route::post('/designation/store', [DesignationController::class, 'store'])->name('designation.store');
    Route::post('/designation/update/{designation_id}', [DesignationController::class, 'update'])->name('designation.update');

    // Division Module Route
    Route::get('/division', [DivisionController::class, 'index'])->name('division.index');
    Route::post('/division/store', [DivisionController::class, 'store'])->name('division.store');
    Route::post('/division/update/{division_id}', [DivisionController::class, 'update'])->name('division.update');

    // Grade Module Route
    Route::get('/grade', [GradeController::class, 'index'])->name('grade.index');
    Route::post('/grade/store', [GradeController::class, 'store'])->name('grade.store');
    Route::post('/grade/update/{grade_id}', [GradeController::class, 'update'])->name('grade.update');

    // Location Module Route
    Route::get('/location', [LocationController::class, 'index'])->name('location.index');
    Route::post('/location/store', [LocationController::class, 'store'])->name('location.store');
    Route::post('/location/update/{location_id}', [LocationController::class, 'update'])->name('location.update');

    // Project Module Route
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::post('/project/store', [ProjectController::class, 'store'])->name('project.store');
    Route::post('/project/update/{project_id}', [ProjectController::class, 'update'])->name('project.update');

    // Role Module Route
    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
    Route::post('/role/update/{role_id}', [RoleController::class, 'update'])->name('role.update');

    // Title Module Route
    Route::get('/title', [TitleController::class, 'index'])->name('title.index');
    Route::post('/title/store', [TitleController::class, 'store'])->name('title.store');
    Route::post('/title/update/{title_id}', [TitleController::class, 'update'])->name('title.update');
});

// ------------------------------------------------------------------------------------------------------------------------------------------------------------
Route::middleware('auth')->group(function () {
    //PMD Route
    Route::get('/project-management-pyline', [DashboardController::class, 'pmdIndex'])->name('pmd.pyline');
    Route::get('/project-management-about-us', [DashboardController::class, 'pmdAbout'])->name('pmd.about');
    Route::get('/project-management-directory', [DashboardController::class, 'pmdDirectory'])->name('pmd.directory');

    //PMD Search
    Route::get('/project-management/search/index', [SearchController::class, 'index'])->name('pmd.search.index');
    Route::get('/project-management/search', [SearchController::class, 'search'])->name('pmd.search');

    //PMD Watchlist
    Route::get('/project-management/watchlist', [WatchlistController::class, 'index'])->name('pmd.watchlist');


    //Content Centrallize
    Route::post('/project-management/update-content/{content_id}', [ContentController::class, 'update'])->name('pmd.content.update');
    Route::post('/project-management/create-content', [ContentController::class, 'store'])->name('pmd.content.create');

    //Report Module Route
    Route::get('/project-management/report', [ReportController::class, 'index'])->name('pmd.report');
    Route::get('/project-management/detail-report/{report_id}', [ReportController::class, 'viewReport'])->name('pmd.viewreport');
    Route::get('/project-management/edit-report/{report_id}', [ReportController::class, 'edit'])->name('pmd.editreport');
    Route::post('/project-management/update-report/{report_id}', [ReportController::class, 'update'])->name('pmd.updatereport');
    Route::post('/project-management/create-report', [ReportController::class, 'storeReport'])->name('pmd.storereport');
    // Route::post('/project-management/create-content-report',               [ContentController::class, 'storeReport'])->name('pmd.storeContent');

    // Sub Report Module Route
    Route::post('/project-management/create-subreport', [SubGroupController::class, 'store'])->name('pmd.storeSubReport');
    Route::post('/project-management/create-sub-content', [ContentController::class, 'storeSubContent'])->name('pmd.storeSubContent');
    // Route::get('/sub-report/project-management/{subreport_id}',     [ReportController::class, 'subReport'])->name('pmd.subreport');

    // Drawing Module Route
    Route::get('/project-management/drawing', [DrawingController::class, 'index'])->name('pmd.drawing');
    Route::post('/project-management/create-drawing', [DrawingController::class, 'store'])->name('pmd.storeDrawing');
    Route::get('/project-management/edit-drawing/{drawing_id}', [DrawingController::class, 'edit'])->name('pmd.editDrawing');
    Route::post('/project-management/update-drawing/{drawing_id}', [DrawingController::class, 'update'])->name('pmd.updateDrawing');
    Route::get('/project-management/view-drawing/{drawing_id}', [DrawingController::class, 'show'])->name('pmd.showDrawing');

    // Route::post('/project-management/add-drawing-content', [ContentController::class, 'store'])->name('pmd.storeDrawingContent'); // non-grouped content
    Route::post('/project-management/add-drawing-group', [SubGroupController::class, 'store'])->name('pmd.storeDrawingGroup'); // grouped content
    Route::post('/project-management/add-drawing-group-content', [ContentController::class, 'storeSubContent'])->name('pmd.storeSubDrawingContent'); // grouped content
// Route::post('/project-management/edit-drawing-content/{content_id}', [ContentController::class, 'update'])->name('pmd.updateDrawingContent'); // non-grouped content

    // Certificate Module Route
    Route::get('/project-management/cert', [CertificateController::class, 'index'])->name('pmd.cert');
    Route::post('/project-management/create-cert', [CertificateController::class, 'store'])->name('pmd.storeCert');
    Route::get('/project-management/edit-cert/{cert_id}', [CertificateController::class, 'edit'])->name('pmd.editCert');
    Route::post('/project-management/update-cert/{cert_id}', [CertificateController::class, 'update'])->name('pmd.updateCert');
    Route::get('/project-management/view-cert/{cert_id}', [CertificateController::class, 'show'])->name('pmd.showCert');

    // Route::post('/project-management/add-cert-content', [ContentController::class, 'store'])->name('pmd.storeCertContent'); // non-grouped content
// Route::post('/project-management/edit-cert-content/{content_id}', [ContentController::class, 'update'])->name('pmd.updateCertContent'); // non-grouped content

    // Carry-Over Project Scope (COPS) Module Route
    Route::get('/project-management/cops', [CarryProjectController::class, 'index'])->name('pmd.cops');
    Route::post('/project-management/create-cops', [CarryProjectController::class, 'store'])->name('pmd.storeCops');
    Route::get('/project-management/edit-cops/{carryProject_id}', [CarryProjectController::class, 'edit'])->name('pmd.editCops');
    Route::post('/project-management/update-cops/{carryProject_id}', [CarryProjectController::class, 'update'])->name('pmd.updateCops');
    Route::get('/project-management/view-cops/{carryProject_id}', [CarryProjectController::class, 'show'])->name('pmd.showCops');

    // Route::post('/project-management/add-cops-content', [ContentController::class, 'store'])->name('pmd.storeCopsContent'); // non-grouped content
// Route::post('/project-management/edit-cops-content/{content_id}', [ContentController::class, 'update'])->name('pmd.updateCopsContent'); // non-grouped content

    //Mutual Agreement Route
    Route::get('/project-management/mutual-agreement', [AgreementController::class, 'index'])->name('pmd.agreement');
    Route::post('/project-management/create-agreement', [ContentController::class, 'storeAgreement'])->name('pmd.storeAgreement');
    // Route::post('/project-management/edit/{agreement_id}',              [ContentController::class, 'update'])->name('pmd.updateAgreement');

    //Significant Events Route
    Route::get('/project-management/significant-event', [EventController::class, 'index'])->name('pmd.event');
    Route::post('/project-management/create-event', [ContentController::class, 'storeAgreement'])->name('pmd.storeEvent');
    // Route::post('/project-management/edit/{event_id}',                  [ContentController::class, 'update'])->name('pmd.updateEvent');

    //Environmental Route
    Route::get('/project-management/environmental', [EnvironmentalController::class, 'index'])->name('pmd.environmental');
    Route::post('/project-management/create-environmental', [EnvironmentalController::class, 'store'])->name('pmd.storeEnvironment');
    Route::get('/project-management/edit-environmental/{environment_id}', [EnvironmentalController::class, 'edit'])->name('pmd.editEnvironmental');
    Route::post('/project-management/update-environmental/{environment_id}', [EnvironmentalController::class, 'update'])->name('pmd.updateEnvironmental');
    Route::get('/project-management/view-environmental/{environment_id}', [EnvironmentalController::class, 'view'])->name('pmd.viewEnvironmental');
    // Route::post('/project-management/create-environmental/doc',         [ContentController::class, 'store'])->name('pmd.storeEnvironmental.doc');

    // Software Module Route
    Route::get('/project-management/software', [SoftwareController::class, 'index'])->name('pmd.software');
    Route::post('/project-management/create-software', [SoftwareController::class, 'store'])->name('pmd.storeSoftware');
    Route::get('/project-management/edit-software/{software_id}', [SoftwareController::class, 'edit'])->name('pmd.editSoftware');
    Route::post('/project-management/update-software/{software_id}', [SoftwareController::class, 'update'])->name('pmd.updateSoftware');
    Route::get('/project-management/view-software/{software_id}', [SoftwareController::class, 'view'])->name('pmd.viewSoftware');

    // Other Records Module Route
    Route::get('/project-management/other', [OtherRecordController::class, 'index'])->name('pmd.other');
    Route::post('/project-management/create-other', [OtherRecordController::class, 'store'])->name('pmd.storeOther');
    Route::get('/project-management/edit-other/{otherRec_id}', [OtherRecordController::class, 'edit'])->name('pmd.editOther');
    Route::post('/project-management/update-other/{otherRec_id}', [OtherRecordController::class, 'update'])->name('pmd.updateOther');
    Route::get('/project-management/view-other/{otherRec_id}', [OtherRecordController::class, 'show'])->name('pmd.showOther');

    // Route::post('/project-management/add-other-content', [ContentController::class, 'store'])->name('pmd.storeOtherContent'); // non-grouped content
// Route::post('/project-management/edit-other-content/{content_id}', [ContentController::class, 'update'])->name('pmd.updateOtherContent'); // non-grouped content
});

require __DIR__ . '/auth.php';