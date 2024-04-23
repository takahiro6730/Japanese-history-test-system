<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestPaymantController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\GanreController;
use App\Http\Controllers\TestProblemController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\AdminEditController;
use App\Http\Controllers\FreeTestController;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome_page');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);


Route::get('_login', [LoginController::class, 'showLoginForm'])->name('_login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('_register', [RegisterController::class, 'showRegistrationForm'])->name('_register');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('mypage/test_login_/{id}', [MypageController::class, 'test_login_form'])->name('test.login_form');
Route::post('mypage/test_login', [MypageController::class, 'test_login'])->name('test.login');
Route::post('mypage/test/enter', [MypageController::class, 'test_enter'])->name('test.enter');
Route::post('question/', [MypageController::class, 'question_admin'])->name('question_admin');


Route::get('guide/notice', [NoticeController::class, 'notice'])->name('guide.notice');
Route::get('guide/notice/{id}', [NoticeController::class, 'notice_select'])->name('notice.select');

Route::get('guide/about_site', [GuideController::class, 'about_site'])->name('guide.about_site');
Route::get('guide/method', [GuideController::class, 'method'])->name('guide.method');
Route::get('guide/question', [GuideController::class, 'question'])->name('guide.question');
Route::get('guide/privacy', [GuideController::class, 'privacy'])->name('guide.privacy');
Route::get('guide/site/policy', [GuideController::class, 'site_policy'])->name('guide.site_policy');
Route::get('my_page', [GuideController::class, 'my_page'])->name('my_page');

Route::get('prefecture/select/{id}', [ProvinceController::class, 'index_selected'])->name('prefecture.select');
Route::get('prefecture/search/result', [ProvinceController::class, 'prefecture_search'])->name('prefecture.search');
Route::get('prefecture/search', [ProvinceController::class, 'all_area_selected'])->name('search.area');
Route::get('ganre/select/{id}', [GanreController::class, 'ganre_selected'])->name('ganre.select');
Route::get('ganre/search/result', [GanreController::class, 'ganre_search'])->name('ganre.search');
Route::get('garne/search', [GanreController::class, 'all_ganre_selected'])->name('search.ganre');

Route::get('test/apply/{id}', [TestController::class, 'apply_test'])->name('test.apply');

Route::post('payment/apply/', [TestPaymantController::class, 'payment_apply'])->name('payment.apply');
Route::post('payment/charge/', [TestPaymantController::class, 'payment_charge'])->name('payment.charge');
Route::get('status/month/{point_date}', [TestPaymantController::class, 'get_point_month'])->name('status.month');
Route::get('status/date/{point_date}', [TestPaymantController::class, 'get_point_date'])->name('status.date');
Route::get('status/month_chart', [TestPaymantController::class, 'get_point_month_chart'])->name('status.month_chart');
Route::get('status/date_chart', [TestPaymantController::class, 'get_point_date_chart'])->name('status.date_chart');


Route::get('reserve/add/{id}', [ReserveController::class, 'add'])->name('reserve.add');

Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('admin/reserve/accept', [AdminController::class, 'reserve_accept'])->name('admin.reserve.accept');
Route::get('admin/reserve/delete/{id}', [AdminController::class, 'reserve_delete'])->name('admin.reserve.delete');
Route::get('admin/reserve/agree/{id}', [AdminController::class, 'reserve_agree'])->name('admin.reserve.agree');
Route::get('admin/reserve/mail_send/{id}', [AdminController::class, 'reserve_mail_send'])->name('admin.reserve.mail_send');
Route::get('admin/test/make',[AdminController::class, 'test_make'])->name('admin.test.make');
Route::post('admin/test/add_test', [AdminController::class, 'add_test'])->name('admin.test.add_test');
Route::get('admin/test/problem_make', [AdminController::class, 'problem_make'])->name('admin.test.problem_make');
Route::post('admin/test/add_problem', [AdminController::class, 'add_problem'])->name('admin.test.add_problem');

Route::get('admin/test/test_problem_edit/{id}', [AdminController::class, 'test_problem'])->name('admin.test.test_problem_edit');
Route::get('admin/test/test_problem_del/{id}', [AdminController::class, 'test_problem_del'])->name('admin.test.test_problem_del');
Route::get('admin/test/test_select', [TestProblemController::class, 'test_select'])->name('admin.test.test_select');
Route::post('admin/test/problem/save', [TestProblemController::class, 'test_problem_save'])->name('admin.test.problem.save');
Route::post('admin/test/add_problem_test', [TestProblemController::class, 'add_problem_test'])->name('admin.test.add_problem_test');
Route::post('admin/test/estimate/calc', [TestProblemController::class, 'calc_test'])->name('admin.test.estimate.calc');

Route::get('admin/prefecture/new', [AdminEditController::class, 'prefecture_new'])->name('admin.prefecture.new');
Route::get('admin/prefecture/view', [AdminEditController::class, 'prefecture_view'])->name('admin.prefecture.view');
Route::get('admin/prefecture/edit/{id}', [AdminEditController::class, 'prefecture_edit'])->name('admin.prefecture.edit');
Route::get('admin/prefecture/delete/{id}', [AdminEditController::class, 'prefecture_delete'])->name('admin.prefecture.delete');
Route::post('admin/prefecture/save', [AdminEditController::class, 'prefecture_save'])->name('admin.prefecture.save');
Route::post('admin/prefecture/picture_upload', [AdminEditController::class, 'prefecture_upload'])->name('admin.prefecture.upload');

Route::get('admin/ganre/new', [AdminEditController::class, 'ganre_new'])->name('admin.ganre.new');
Route::get('admin/ganre/view', [AdminEditController::class, 'ganre_view'])->name('admin.ganre.view');
Route::get('admin/ganre/edit/{id}', [AdminEditController::class, 'ganre_edit'])->name('admin.ganre.edit');
Route::get('admin/ganre/delete/{id}', [AdminEditController::class, 'ganre_delete'])->name('admin.ganre.delete');
Route::post('admin/ganre/save', [AdminEditController::class, 'ganre_save'])->name('admin.ganre.save');


Route::get('admin/notice/new', [AdminEditController::class, 'notice_new'])->name('admin.notice.new');
Route::get('admin/notice/view', [AdminEditController::class, 'notice_view'])->name('admin.notice.view');
Route::get('admin/notice/edit/{id}', [AdminEditController::class, 'notice_edit'])->name('admin.notice.edit');
Route::get('admin/notice/delete/{id}', [AdminEditController::class, 'notice_delete'])->name('admin.notice.delete');
Route::post('admin/notice/save', [AdminEditController::class, 'notice_save'])->name('admin.notice.save');
Route::post('admin/notice/picture_upload', [AdminEditController::class, 'notice_upload'])->name('admin.notice.upload');


Route::get('admin/user/view', [AdminEditController::class, 'user_view'])->name('admin.user.view');
Route::get('admin/user/payment', [AdminEditController::class, 'user_payment'])->name('admin.user.payment');
Route::get('admin/user/delete/{id}', [AdminEditController::class, 'user_delete'])->name('admin.user.delete');
Route::get('admin/user/question', [AdminEditController::class, 'user_question'])->name('admin.user.question');
Route::post('admin/user/question/reply', [AdminEditController::class, 'user_question_reply'])->name('admin.user.reply');
Route::get('admin/user/question/delete{id}', [AdminEditController::class, 'user_question_delete'])->name('admin.user.question.delete');

Route::get('_verifyMailSend', [VerificationController::class, '_verifyMailSend'])->name('_verifyMailSend');
Route::post('verifyMailSend', [VerificationController::class, 'verifyMailSend'])->name('verifyMailSend');
Route::get('/email/verify/{hash}', [VerificationController::class, 'getVerifyMail'])->name('getVerifyMail');

Route::get('/mailSended', [VerificationController::class, 'mailSended'])->name('mailSended');


Route::get('admin/test/free_test/enter/{id}', [FreeTestController::class, 'free_test_enter'])->name('free_test_enter');
Route::get('admin/test/free_test/{id}', [FreeTestController::class, 'free_test'])->name('admin.test.free_test');
Route::post('admin/test/free_test_problem/', [FreeTestController::class, 'free_test_problem'])->name('free_test_problem');