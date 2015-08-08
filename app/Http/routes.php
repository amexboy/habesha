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
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('index', [
        'images' => \App\Image::all(),
        'services' => "Habesha provides exceptional services"
    ]);
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
    if (!file_exists(storage_path("images/$image->file_name"))) {
        return response("Image not found on our servers!", 404);
    }
    return response()->download(storage_path("images/$image->file_name"), null, [], '');
});

Route::get('/images/upload', function (Request $request) {
    return view('upload', [
        'images' => \App\Image::all()
    ]);
});

Route::post('/images/upload', function (Request $request) {
    $message = '';
    $url = '';

    if ($request->hasFile('upload')) {
        $file = $request->file('upload');

        $ext = $file->guessExtension();
        $hash = md5_file($file->getPath());

        $file->move(storage_path("images/"), "$hash.$ext");
        \App\Image::create([
            'file_name' => "$hash.$ext",
            'description' => $request->input('description', ""),
            'alt' => $request->input('alt', "")
        ]);
        $message = "Uploaded successfully! $hash";
    } else {
        $message = "File not uploaded, please try again!";
    }
    $funcNum = $_REQUEST['CKEditorFuncNum'];
    return "<script> window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
});

Route::post('/images/temp/upload', function (Request $request) {
    $message = '';
    $url = '/images/placeholder.png';

    if ($request->hasFile('upload')) {
        $file = $request->file('upload');
        $ext = $file->guessExtension();
        $hash = md5_file($file);
        $file->move(storage_path("images/temp/"), "$hash.$ext");

        $url = url("/images/temp/$hash.$ext");
        $uploader = $request->input('uploader');
        $task = $request->input('task');
        $callback = $request->input('callback');
        $ajax = $request->input('ajax', false);
        $message = "$hash.$ext";

        return $ajax ? response("${callback}($uploader,$task, '$url', '$message');")
            ->header('Content-Type', 'text/javascript')
            ->header('Access-Control-Allow-Origin', '*')
            : response("<script>${callback}($uploader,$task, '$url', '$message');</script>");
    } else {
        return response("Not Uploaded", 401);
    }
});

Route::get('/images/temp/{image}', function ($image) {
    if (!file_exists(storage_path("images/temp/$image"))) {
        return response("Image not found on our servers!", 404);
    }
    return response()->download(storage_path("images/temp/$image"), null, [], '');
});

Route::post('/images/temp/save', function (Request $request) {

    $url = $request->input('url', '');
    $message = $request->input('message', '');

    if (Storage::exists("images/temp/$message")) {
        if (Storage::exists("images/$message")) {
            //if a file with the same name exists in the main directory, simply delete the temp file
            Storage::delete("images/temp/$message");
        } else {
            Storage::move("images/temp/$message", "images/$message");
        }
        \App\Image::create([
            'file_name' => $message,
            'description' => $request->input('description', ""),
            'alt' => $request->input('alt', "")
        ]);

        return response("Success");
    } else {
        return response("Error", 401);
    }

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
