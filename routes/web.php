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
// use Validator;

// Route::post("/ttttttt",function(){
// 	$validator = Validator::make(request()->all(), [
//             'img-code-barre' => 'required|image|max:1000',
//         ]);
// 	if ($validator->fails()) {
            
//             return $validator->errors();            
//         }
//     $status = "";
//     if (request()->hasFile('img-code-barre')) {
//             $image = request()->file('img-code-barre');
//             // Rename image
//             $filename = time().'.'.$image->guessExtension();
            
//             $path = request()->file('img-code-barre')->storeAs(
//                  'img-code-barre', $filename
//             );
            
//             $status = "uploaded,".$path;
//             // $status[1] = $path;

//         }
        
//         return response($status,200);





// 		dd(request()->file('img-code-barre'));
// 		// $return null;
// 	})->name('test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/upload-file', 'HomeController@uploadDocument')->name('upload_document');
Route::get('/destroy/{document}', 'HomeController@destroyDocument')->name('destroy_document');

Route::resource('/','AccueilController')->only('index','store');
Route::post('/scan-code','AccueilController@scanCodeBarre')->name('scan_code_barre');

// Route::post('/','AccueilController@show')->name('show_document');
Route::get('/{document}','AccueilController@show_document')->name('show_document');





