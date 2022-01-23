<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use App\Models\Image;
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
    $images = Image::all();

    return view('welcome')->with('images', $images);

})->name('index')->middleware(['auth']);




Route::get('test', function () {
    $images = Image::all();

    return view('test')->with('images', $images);
});



Route::get('/dashboard', function () {
    $images = Image::all();

    return view('dashboard')->with('images', $images);

})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';



Route::post('/perfil', function () {
    return view('notYet');
})->middleware(['auth'])->name('perfil');


Route::resources([
    'user' => UserController::class,
    'image' => ImageController::class,
]);
Route::get('user/avatar/{filename}', [UserController::class, 'getImage'])->name('user.avatar');
Route::get('image/item/{filename}', [ImageController::class, 'getImage'])->name('image.item');


