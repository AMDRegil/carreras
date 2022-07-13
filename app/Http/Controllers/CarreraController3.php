<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
//use App\Http\Controllers\HTTP;
use Illuminate\Http\Request;
//use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

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
        //API REST Carreras
        $carrera=Http::get('http://localhost:8000/api/carreras');
        $carreraArray=$carrera->json();
        return view('carrera.index', compact('carreraArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $carrera=new Carrera();
        return view('carrera.create', compact('carrera'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Llamar al controlador del WebService Rest de Categoria
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:8000/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('POST', 'carreras', [
            'form_params' => [
                'nombre' => $request->nombre,
                'area' => $request->area,
            ]
        ]);
        return redirect()->route('carreras.index')
            ->with('success', 'Carrera created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        //Llamar al controlador del WebService Rest de Categoria
        $carrera=HTTP::get('http://localhost:8000/api/carreras/'.$id);
        $carreraArray=$carrera->json();
        return view('carrera.show', compact('carreraArray'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        $carrera = Carrera::find($id);

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
        //Llamar al controlador del WebService Rest de Categoria
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:8000/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('PUT', 'carreras/'.$carrera->id, [
            'form_params' => [
                'nombre' => $request->nombre,
                'area' => $request->area,
            ]
        ]);
        return redirect()->route('carreras.index')
            ->with('success', 'Carrera updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        //Llamar al controlador del WebService Rest de Categoria
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:8000/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('DELETE', 'carreras/'.$id);
        return redirect()->route('carreras.index')
            ->with('success', 'Carrera deleted successfully.');
    }
}
