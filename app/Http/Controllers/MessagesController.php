<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Mensaje;

use Illuminate\Http\Request;

class MessagesController extends Controller
{

    function __construct(){

        $this->middleware('auth',['except' => ['create','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $messages  = DB::table('mensajes')->get();

        $messages = Mensaje::all();

        return view('mensajes.index', compact('messages'));

        //return "MENSAJES EN EL INDEX";

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return  view('mensajes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Guadar mensaje
        /*DB::table('mensajes')->insert([

            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),

        ]);*/

       Mensaje::create($request->all());


        // Redireccionar mensaje
        return redirect()->route('mensajes.create')->with('info','Hemos recibido tu mensaje');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //$consulta = DB::table('mensajes')->where('id', $id)->first();
        $consulta = Mensaje::findOrFail($id);
        return view('mensajes.show',compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$editar = DB::table('mensajes')->where('id', $id)->first();
        $editar = Mensaje::findOrFail($id);
        return view('mensajes.editar',compact('editar'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //actualizar el mensaje

     /*   DB::table('mensajes')->where('id', $id)->update([


            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "updated_at" => Carbon::now(),

        ]);*/


        //redireccionar el mensaje
        Mensaje::findOrFail($id)->update($request->all());

        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // return "Eliminando el mensaje " . $id;    }

        //eliminar mensaje
        //DB::table('mensajes')->where('id',$id)->delete();
        Mensaje::findOrFail($id)->delete();

        //redireccionar

        return redirect()->route('mensajes.index');

    }
}
