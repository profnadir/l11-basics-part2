<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view("users.index");
});

require __DIR__.'/auth.php';
