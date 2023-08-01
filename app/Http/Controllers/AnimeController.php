<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnimeController extends Controller
{

    const BASE_URL = "https://api.jikan.moe/v4/";

    public function index() {

        $title = "Anime";
        $endpoint = self::BASE_URL . "genres/anime";
        $genres = Http::get($endpoint)->json();

        //dd($genres['data']);

        return view('anime-list', ['genres' => $genres['data'], 'title' => $title]);
    }

    public function animeByGenre($id) {

        $title = 'Genere Anime';
        $endpoint = self::BASE_URL . "anime";
        $animeByGenre = Http::get($endpoint, ["genres" => $id])->json();

        //dd($animeByGenre['data']);

        return view('animeByGenre', ['animeByGenre' => $animeByGenre['data'], 'title' => $title]);
    }

    public function saveData() {

        $endpoint = Http::get('https://api.jikan.moe/v4/genres/anime')->json();

        //dd($endpoint['data']);

        foreach ($endpoint['data'] as $animeGenre) {
            $genresObj = new \App\Models\AnimeList();

            $genresObj->mal_id = $animeGenre['mal_id'];
            $genresObj->name = $animeGenre['name'];
    
            $genresObj->save();
        }

    }

}
