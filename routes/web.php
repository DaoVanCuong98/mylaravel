<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TasksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login/store',[LoginController::class,'store']);

Route::get("admin/tasks",[TasksController::class,"read"])->name('admin')->middleware("check_login");
//url: public/admin/tasks/update/id -> sua ban ghi - GET
Route::get("admin/tasks/update/{id}",[TasksController::class,"update"])->middleware("check_login");
//url: public/admin/tasks/update/id -> sua ban ghi - POST
Route::post("admin/tasks/update/{id}",[TasksController::class,"updatePost"])->name("update")->middleware("check_login");
//url: public/admin/tasks/create -> tao moi ban ghi - GET
Route::get("admin/tasks/create",[TasksController::class,"create"])->middleware("check_login");
//url: public/admin/tasks/create -> sua ban ghi - POST
Route::post("admin/tasks/create",[TasksController::class,"createPost"])->middleware("check_login");
//url: public/admin/tasks/delete/id -> sua ban ghi - GET
Route::get("admin/tasks/delete/{id}",[TasksController::class,"delete"])->name("delete_task")->middleware("check_login");

Route::get("logout",[LoginController::class,"logout"]);

Route::get("registers",[RegisterController::class,"index"]);//->middleware("check_login");
Route::post("registers",[RegisterController::class,"postregister"]);//->middleware("check_login");

