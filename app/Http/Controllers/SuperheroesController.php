<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\Superhero;

class SuperheroesController extends Controller
{
    public function superheroes()
    {

        $superheroes = [
            new Superhero('Batman', 35),
            new Superhero('Superman', 30),
            new Superhero('Acquaman', 28),
            new Superhero('Flash', 20), 
        ];

        return  $superheroes;
    }

}
