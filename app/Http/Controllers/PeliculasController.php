<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Pelicula;
use App\Genero;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::with('genero')
        ->orderBy('titulo', 'asc')
        ->get();

        return view ('peliculas.index', ['peliculas' => $peliculas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = Genero::orderBy('genero', 'asc')->get();
        return view('peliculas.create', ['generos' => $generos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'year' => 'required|size:4',
            'duration' => 'required|digits_between:1,3',
            'director' => 'required|max:255'
        ];
        $this->validate($request, $rules);

        $p = new Pelicula;
        $p->titulo = $request->input('title');
        $p->year = $request->input('year');
        $p->duracion = $request->input('duration');
        $p->director = $request->input('director');
        $p->id_genero = $request->input('genero');
        $p->save();

        $request->session()->flash('status', 'Película creada satisfactoriamente');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelicula = Pelicula::find($id);
        $generos = Genero::orderBy('genero', 'asc')->get();

        return view ('peliculas.edit', ['pelicula' =>  $pelicula, 'generos' => $generos]);
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
        $rules = [
            'title' => 'required|max:255',
            'year' => 'required|size:4',
            'duration' => 'required|digits_between:1,3',
            'director' => 'required|max:255'
        ];
        $this->validate($request, $rules);

        $p = Pelicula::find($id);
        $p->titulo = $request->input('title');
        $p->year = $request->input('year');
        $p->duracion = $request->input('duration');
        $p->director = $request->input('director');
        $p->id_genero = $request->input('genero');
        $p->save();

        return redirect('peliculas/'.$id.'/edit')->with('status', 'Modificación guardada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
