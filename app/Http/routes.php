<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/preview/{view?}', function ($view = 'preview') {
    return view($view);
});

Route::controller('article', 'ArticleController');

Route::controller('auth', 'Auth\AuthController');

Route::any('/images/browse', function (Request $request) {
    return view('browse', [
        'images' => \App\Image::all(),
        'CKEditorFuncNum' => $request->input('CKEditorFuncNum', '0')
    ]);
});

Route::any('/images/{id}', function ($id) {
    $image = \App\Image::where('id', $id)->firstOrFail();
    if (!file_exists(storage_path("images/$image->hash.$image->type"))) {
        return response("Image not found on our servers!", 404);
    }
    return response()->download(storage_path("images/$image->hash.$image->type"), null, [], '');
});

Route::any('/images/browse', function (Request $request) {
    return view('browse', ['images' => \App\Image::all(),
        'CKEditorFuncNum' => $request->input('CKEditorFuncNum', '0')
    ]);
});
Route::any('/images/upload', function (Request $request) {
    $message = '';
    $url = '';

    if ($request->hasFile('upload')) {
        $file = $request->file('upload');

        $ext = $file->guessExtension();
        $hash = md5_file($file->getPath());

        $file->move(storage_path("images/"), "$hash.$ext");
        \App\Image::create([
            'type' => $ext,
            'hash' => $hash,
            'description' => $request->input('description', "")
        ]);
        $message = "Uploaded successfully! $hash";
    } else {
        $message = "File not uploaded, please try again!";
    }
    $funcNum = $_REQUEST['CKEditorFuncNum'];
//    function base64_encode_file($filename){
//        return 'data:'.mime_content_type($filename) . ';base64,' . base64_encode(file_get_contents($filename));
//    }
    return "<script> window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
});



// Authentication routes...
// Route::get('auth/login', 'Auth\AuthController@getLogin');
// Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');
//
// // Registration routes...
// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
// Route::get('password/email', 'Auth\PasswordController@getEmail');
// Route::post('password/email', 'Auth\PasswordController@postEmail');
//
// // Password reset routes...
// Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
// Route::post('password/reset', 'Auth\PasswordController@postReset');
