<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    $images = Image::where('id','>',0)->cursorPaginate(5);

    return view('dashboard')->with('images', $images);
})->name('index')->middleware(['auth']);




Route::get('test', function () {

echo 'test';

    /*$path = 'user_' . $user()->id . 'cod' . time() . $nameFile;
    Storage::disk('images')->put($path, File::get($fileSeeder));*/
});



Route::get('/dashboard', function () {
    $images = Image::where('id','>',0)->cursorPaginate(5);

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
