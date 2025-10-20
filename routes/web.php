<?php

use App\Http\Controllers\AiController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ArchiveTenderController;
use App\Http\Controllers\AwardedTenderController;
use App\Http\Controllers\BeyondBidController;
use App\Http\Controllers\BeyondSupplierController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Roles_And_Permissions;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\User_Management;
use App\Http\Controllers\ParticipatedBidderController;
use App\Http\Controllers\RejectedBidderController;
use App\Http\Controllers\BidderController;
use App\Http\Controllers\BidhiveController;
use App\Http\Controllers\CompletedTenderController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\IonwaveBidController;
use App\Http\Controllers\ParticipatedTenderController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoleListController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user_profile', function () {
    return view('user_profile');
})->middleware(['auth', 'verified'])->name('profile');


Route::group(['middleware' => ['auth', 'permission']], function () {
    // Demo Routes
    Route::get('/demo', [HomeController::class, 'demo'])->name('demo.index');
    Route::get('/demo/create', [HomeController::class, 'create'])->name('demo.create');
    Route::post('/demo', [HomeController::class, 'store'])->name('demo.store');
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/user_activity_log', [ProfileController::class, 'userLog'])->name('user_activity_log');
    Route::get('/profile-management', [ProfileController::class, 'profileManagement'])->name('profile.management');
    Route::get('/user_profile', [ProfileController::class, 'visitor_profile'])->name('profile');
    Route::get('/user_profile_edit', [ProfileController::class, 'user_profile_edit'])->name('user_profile_edit');
    Route::put('/user_profile_edit', [ProfileController::class, 'user_profile_update'])->name('user_profile_update');
    Route::get('/profile_picture_edit', [ProfileController::class, 'pictureEdit'])->name('profile_picture_edit');
    Route::put('/profile_picture_edit', [ProfileController::class, 'pictureUpdate'])->name('profile_picture_update');
    Route::put('/user_password_update', [ProfileController::class, 'updatePassword'])->name('user_password_update');
    Route::get('/user_password_edit', [ProfileController::class, 'editPassword'])->name('user_password_edit');
    Route::get('/user_password_reset', [ProfileController::class, 'resetPassword'])->name('user_password_reset');

    // AI Chat Routes
    Route::get('/ai_chat', [AiController::class, 'ai_chat_index'])->name('ai_chat.index');
    Route::post('/ai-chat', [AiController::class, 'ai_chat_response'])->name('ai.chat.response');
    Route::post('/ai-chat-store', [AiController::class, 'storeChat'])->name('ai.chat.store');
    Route::get('/ai-chat-list', [AiController::class, 'listChats'])->name('ai.chat.list');
    Route::get('/ai-chat-view/{id}', [AiController::class, 'viewChat'])->name('ai.chat.view');
    Route::get('/ai-chat-pdf', [AiController::class, 'ai_chat_pdf'])->name('ai.chat.pdf');
    Route::get('/ai-chat/download/{id}', [AiController::class, 'downloadAIChatPDF'])->name('ai.chat.download');

    // User Management Routes
    Route::get('/add_user', [User_Management::class, 'add_user'])->name('add_user');
    Route::get('/users', [User_Management::class, 'user_index'])->name('users.index');
    Route::get('/users/{id}/edit', [User_Management::class, 'user_edit'])->name('users.edit');
    Route::post('/users/{id}', [User_Management::class, 'user_update'])->name('users.update');

    Route::get('/all_users', [User_Management::class, 'allUsers'])->name('all_users');
    Route::get('/user/{id}/view', [User_Management::class, 'allUserView'])->name('all_user_view');
    Route::get('/user/{id}/edit', [User_Management::class, 'allUserEdit'])->name('all_user_edit');
    Route::put('/user/{id}/update', [User_Management::class, 'allUserUpdate'])->name('all_user_update');
    Route::delete('/user/{id}/delete', [User_Management::class, 'allUserDelete'])->name('all_user_delete');
    Route::post('/store_user', [User_Management::class, 'store_user'])->name('store_user');

    Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
    Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
    Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
    Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit');
    Route::put('/patients/{patient}', [PatientController::class, 'update'])->name('patients.update');

    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
    Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
    Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');
    Route::get('/doctors/{doctor}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');
    Route::put('/doctors/{doctor}', [DoctorController::class, 'update'])->name('doctors.update');

    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
});

Auth::routes();
