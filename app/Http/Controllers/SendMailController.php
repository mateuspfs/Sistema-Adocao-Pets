<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
                'nome' => 'required',
                'email' =>'required|mail',
                'telefone' => 'required',
                'animal' =>'required',
                'cpf' => 'required',
                'dt_nasc' => 'required',
            ]);

            $data = array(
                'nome' =>$request->solicitante,
                'email' =>$request->email,
                'telefone' =>$request->cel,
                'animal' =>$request->animal,
                'cpf' =>$request->cpf,
                'dt_nasc' =>$request->nascimento,
            );

            Mail::to( config('mail.from.adress') )
                ->send( new SendMail($data));

            return back()->with('sucess', 'Obrigado por adotar na nossa plataforma!');
    }
}
