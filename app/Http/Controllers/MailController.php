<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use Mail;
class MailController extends Controller
{
    //
    //
    public function contact()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $data = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mensaje' => $request->input('mensaje')
            
        );
        // dd($request);
        // dd($data);
        Mail::send('emails.contact', $data, function($message){
            $message->from('serviciodeemailssa@gmail.com', 'NombreApp.Com');
            $message->subject('Envio de Emails - App Laravel');
            $message->to('bolivar014@gmail.com');
        });

        // Session::flash('message', 'Mensaje enviado Correctamente');
        // return Redirect::to('/contact');

        // Mail::send('emails.contact', $request->all(), function($message){
        //     $message->subject('Correo de Contacto');
        //     $message->to('bolivar014@gmail.com');
        // });

        // Session::flash('message','Mensaje enviado Correctamente');
        // return Redirect::to('/contact');
    }
}
