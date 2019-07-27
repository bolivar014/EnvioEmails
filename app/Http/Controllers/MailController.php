<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use Redirect;
class MailController extends Controller
{
    //
    public function store(Request $request)
    {
        Mail::send('emails.contact', $request->all(), function($message){
            $message->subject('Correo de Contacto');
            $message->to('bolivar014@gmail.com');
        });

        Session::flash('message','Mensaje enviado Correctamente');
        return Redirect::to('/contact');
    }
}
