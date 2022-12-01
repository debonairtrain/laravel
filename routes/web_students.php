<?php

    use App\Http\Controllers\DocumentController;
    use App\Http\Controllers\StudentController;
    use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index'])
    ->name('student.index');
Route::post('/login', [StudentController::class, 'store'])->name('student.store');

Route::group(['prefix' => 'student', 'as' => 'student.', 'middleware' => ['auth.regular']], function() {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
    Route::get('/resources', [StudentController::class, 'resources'])->name('resources');

    Route::get('/resources/document/{document}', [StudentController::class, 'showDocument'])->name('document.show');
    Route::get('/resources/document/media/{media}/download', [StudentController::class, 'downloadMedia'])->name('document.media.download');

    Route::post('/profile', [StudentController::class, 'profileStore'])->name('profile.store');
    Route::get('/logout', [StudentController::class, 'logout'])->name('logout');
});
