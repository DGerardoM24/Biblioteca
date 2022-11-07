<?php

namespace App\Http\Controllers;

use App\Models\libros;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['libros']=libros::paginate(20);
        return view('libros.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre_libro'=>'required|string|max:120',
            'codigo'=>'required|string|max:50',
            'id_clasificacion'=>'required|int|max:11',
            'id_editorial'=>'required|int|max:11',
            'anio_publicacion'=>'required|int|max:11',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request,$campos,$mensaje);

        $datosLibro=request()->except('_token');

        libros::insert($datosLibro);

        // return response()->json($datosLibro);
        return redirect('libros')->with('mensaje','Registro Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function show(libros $libros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function edit($id_libro)
    {
        $libro=libros::findOrFail($id_libro);

        return view('libros.edit',compact('libros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_libro)
    {
        $campos=[
            'nombre_libro'=>'required|string|max:120',
            'codigo'=>'required|string|max:50',
            'id_clasificacion'=>'required|int|max:11',
            'id_editorial'=>'required|int|max:11',
            'anio_publicacion'=>'required|int|max:11',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request,$campos,$mensaje);

        $datosLibro=request()->except(['_token','method']);
        libros::where('id_libro','=',$id_libro)->update($datosLibro);

        $libro=libros::findOrFail($id_libro);
        //return view('libros.edit',compact('libro'));
        return redirect('libros')->with('mensaje','Registro Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_libro)
    {

        libros::destroy($id_libro);
        return redirect('libros')->with('mensaje','Registro Borrado');
    }
}
