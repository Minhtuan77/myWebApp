use App\Http\Controllers\BookController;

Route::get('/books', [BookController::class, 'displayBook']);
Route::get('/books/edit/{id}', [BookController::class, 'editBook']);
Route::post('/books/save', [BookController::class, 'saveBook']);
