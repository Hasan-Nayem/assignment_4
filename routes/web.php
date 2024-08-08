<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('contact.index');
});
Route::group(['prefix' => '/contacts'], function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/{id}', [ContactController::class, 'show'])->name('contact.show');
    Route::get('/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
    //Searching route
    Route::post('/search', [ContactController::class, 'search'])->name('contact.search');
    Route::post('/sort', [ContactController::class, 'sort'])->name('contact.sort');
});

/*

GET /contacts: List all contacts - done

GET /contacts/create: Show the form to create a new contact - done

POST /contacts: Store a new contact - done

GET /contacts/{id}: Show a specific contact - done

GET /contacts/{id}/edit: Show the form to edit a contact - done

PUT /contacts/{id}: Update a contact

DELETE /contacts/{id}: Delete a contact


*/
