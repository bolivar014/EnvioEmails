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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/contact', 'RouteController@contact');


Route::post('/contact', 'MailController@store');

Route::get('/sendmail', function(){
    $data = array(
        'name' => "Curso Laravel - Envio Correos",
    );
    // dd($data);
    Mail::send('emails.welcome', $data, function($message){
        $message->from('serviciodeemailssa@gmail.com', 'Curso Laravel - Envio Correos'); // Asunto de origen
        $message->to('bolivar014@gmail.com')->subject('Envio de Emails - App Laravel');  // Asunto de destino
    });

    return "Mensaje enviado Exitosamente!!";
});