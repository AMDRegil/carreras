<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carreras = Carrera::all();
        return view('carrera.list', compact('carreras', 'carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('carrera.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'txtNombre'=>'required',
            'txtArea'=>'required'
        ]);

        $carrera = new Carrera([
            'nombre'=>$request->get('txtNombre'),
            'area'=>$request->get('txtArea')
        ]);

        $carrera->save();
        return redirect('/carrera')->with('success', 'Carrera agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        //
        return view('carrera.view', compact('carrera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        //
        return view('carrera.edit', compact('carrera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {
        //
        $request->validate([
            'txtNombre'=>'required',
            'textArea'=>'required']);

        $carrera=Carrera::find($id);
        $carrera->nombre=$request->get('nombre');
        $carrera->area=$request->get('area');

        $carrera->update();

        return redirect('/carrera')->with('success', 'Carrera actualizada');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        //
        $carrera->delete();
        return redirect('/carrera')->with('success', 'Carrera eliminada');
    }
}
