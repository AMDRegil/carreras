<?php

namespace App\Repositories;
use GuzzleHttp\Client;

class Carrerasapi extends GuzzleHttpRequest
{

	public function all()
	{
        return $this->get('carreras');
	}

	public function find($id)
	{
        return $this->get('carreras/'.$id);
	}

}

?>