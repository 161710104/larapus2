<?php



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

Route::get('/', 'GuestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/verify/{token}', 'Auth\RegisterController@verify');
Route::get('auth/send-verification', 'Auth\RegisterController@sendVerification');

//profile member
Route::get('settings/profile', 'SettingsController@profile');
Route::get('settings/profile/edit', 'SettingsController@editProfile');
Route::post('settings/profile', 'SettingsController@updateProfile');

//password setting member
Route::get('settings/password', 'SettingsController@editPassword');
Route::post('settings/password', 'SettingsController@updatePassword');

Route::group(['prefix'=>'admin', 'middleware'=>['auth','role:admin']], function () {
    Route::resource('authors', 'AuthorsController');
    Route::resource('books', 'BooksController');
    Route::resource('members', 'MembersController');
    Route::get('statistics', [
        'as'=>'statistics.index',
        'uses'=>'StatisticsController@index'
    ]);
    Route::get('export/books', [
        'as' => 'export.books',
        'uses' => 'BooksController@export'
    ]);
    Route::post('export/books', [
        'as' => 'export.books.post',
        'uses' => 'BooksController@exportPost'
    ]);
    Route::get('template/books', [
        'as' => 'template.books',
        'uses' => 'BooksController@generateExcelTemplate'
    ]);
    Route::post('import/books', [
        'as' => 'import.books',
        'uses' => 'BooksController@importExcel'
    ]);
});

//nonadmin
    Route::get('books/{book}/borrow', [
        'middleware' => ['auth', 'role:member'],
        'as'=> 'guest.books.borrow',
        'uses'=> 'BooksController@borrow'
        ]);

        //Pengembalian Buku
    Route::put('books/{book}/return', [
        'middleware' => ['auth', 'role:member'],
        'as'=> 'member.books.return',
        'uses'=> 'BooksController@returnBack'
        ]);