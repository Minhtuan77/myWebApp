use App\Http\Controllers\BookController;

Route::get('/books', [BookController::class, 'index'])->name('books.index');   // Read
Route::get('/books/create', [BookController::class, 'create'])->name('books.create'); // Create Form
Route::post('/books', [BookController::class, 'store'])->name('books.store'); // Save new
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit'); // Edit Form
Route::post('/books/{id}', [BookController::class, 'update'])->name('books.update'); // Update
Route::get('/books/{id}/delete', [BookController::class, 'destroy'])->name('books.destroy'); // Delete
