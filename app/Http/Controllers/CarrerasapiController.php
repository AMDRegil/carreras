<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use App\Http\Controllers\HTTP;
use App\Repositories\Carrerasapi;
use Illuminate\Http\Request;

class CarrerasapiController extends Controller
{
    protected $carrerasapi;

    public function __construct(Carrerasapi $carreras) {
        $this->carreras = $carreras;
    }

    public function index() {

        //Utilizar instancia de Carreras (API)
        $carreras = $this->carreras->all();

        return view('carrerasapi.index', compact('carreras'));
    }

    public function show($id) {

        $carrera = $this->carreras->find($id);

        return view('carrerasapi.show', compact('carrera'));
    }
}