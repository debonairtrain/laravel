<?php

    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\DocumentController;
    use App\Http\Controllers\VideoController;
    use Illuminate\Support\Facades\Route;

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth.admin']], function() {
        Route::get('/', [AdminController::class, 'index'])
            ->name('index')
            ->withoutMiddleware(['auth.admin']);
        Route::post('/login', [AdminController::class, 'store'])
            ->name('store')
            ->withoutMiddleware(['auth.admin']);

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::get('/students', [AdminController::class, 'manageStudents'])->name('manage-students');
        Route::get('/student/create', [AdminController::class, 'createStudent'])->name('student.create');
        Route::get('/student/{student}', [AdminController::class, 'destroyStudent'])->name('student.destroy');
        Route::get('/student/{student}/edit', [AdminController::class, 'editStudent'])->name('student.edit');

        Route::get('/resources/documents', [DocumentController::class, 'index'])->name('manage-documents');
        Route::get('/resources/document/create', [DocumentController::class, 'create'])->name('document.create');
        Route::get('/resources/document/{document}', [DocumentController::class, 'show'])->name('document.show');
        Route::get('/resources/document/media/{media}/delete', [DocumentController::class, 'destroyMedia'])->name('document.media.destroy');
        Route::get('/resources/document/media/{media}/download', [DocumentController::class, 'downloadMedia'])->name('document.media.download');
        Route::get('/resources/document/{document}/delete', [DocumentController::class, 'destroy'])->name('document.destroy');
        Route::get('/resources/document/{document}/edit', [DocumentController::class, 'edit'])->name('document.edit');

        Route::get('/resources/videos', [VideoController::class, 'index'])->name('manage-videos');
        Route::get('/resources/video/create', [VideoController::class, 'create'])->name('video.create');
        Route::get('/resources/video/{video}/delete', [VideoController::class, 'destroy'])->name('video.destroy');
        Route::get('/resources/video/{video}/edit', [VideoController::class, 'edit'])->name('video.edit');

        Route::post('/student/create', [AdminController::class, 'storeStudent'])->name('student.store');
        Route::post('/student/{student}/edit', [AdminController::class, 'updateStudent'])->name('student.patch');

        Route::post('/resources/document/create', [DocumentController::class, 'store'])->name('document.store');
        Route::post('/resources/document/{document}/edit', [DocumentController::class, 'update'])->name('document.update');

        Route::post('/resources/video/create', [VideoController::class, 'store'])->name('video.store');
        Route::post('/resources/video/{video}/edit', [VideoController::class, 'update'])->name('video.update');

        Route::post('/profile', [AdminController::class, 'profileStore'])->name('profile.store');
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    });
