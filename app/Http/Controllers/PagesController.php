<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;


class PagesController extends Controller
{

	public function __construct(){
		$this->middleware('seguridad', ['only' => ['home']]);
	}


    public function home(){
    	return view('home');
    } 


    /*public function contact(){
    	return view('contacto');
    }*/

    /*public function mesaje(CreateMessageRequest $request){


    	$data = $request->all();

    	return back()->with('info','Tu mensaje ha sido enviado con exito :D');
    }*/

    public function salud($nombre = "Invitado"){

	$html = "<h2>Contenido html</h2>";
	$script = "<script> alert('Problema XSS - Cross Site Scripting!')</script>";

	$consolas =[
		"play station 4",
		"xbox one",
		"wii u"
	];

	return view('saludo', compact('nombre','html','script','consolas'));


    }




}
