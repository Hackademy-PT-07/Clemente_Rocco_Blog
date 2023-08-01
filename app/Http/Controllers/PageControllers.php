<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageControllers extends Controller
{
    public function home()
    {
        $auth = [
            'name' => 'Rocco Clemente',
            'email' => 'rocco@example.com',
        ];
    
        return view('home', compact('auth'));
    }

    public function aboutUs()
    {

        $title = "Chi siamo";

        $text = 'Ciao, mi chiamo Rocco Clemente Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium doloremque labore quisquam quo expedita distinctio. Culpa, numquam modi. Perspiciatis obcaecati pariatur ad voluptates adipisci minus dicta quae quo saepe labore. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum sequi veritatis pariatur rerum! Corporis, quibusdam est pariatur nesciunt, rerum quo facere corrupti qui ab veniam accusantium amet consectetur exercitationem minus?';

        return view('pages.standard', compact('title', 'text'));
    }
}
