<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/greeting',function(){
    $groupe = "dev202";
    $module = "m205";
    $prof = "nadir";
   
    //return view("greeting",["groupe"=>$groupe,"module" => $module, "prof" => $prof]);
    return view("greeting",compact("groupe","module","prof"));
});

Route::get('/users',function(){

    $groupe = "<script>alert('hacked')</script>";

    $users = User::all();

    Session::flash("status","user created");

    return view("users.index", compact("users","groupe"));
});

require __DIR__.'/auth.php';
