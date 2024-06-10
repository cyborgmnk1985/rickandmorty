<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class CharacterController extends Controller
{

    public function index(Request $request)
    {
        // Obtener parámetros de filtro
        $status = $request->input('status');
        $species = $request->input('species');
        $currentPage = $request->input('page', 1);

        // Hacer la solicitud a la API de Rick and Morty con filtros
        $query['page'] = $currentPage;

        if ($status) {
            $query['status'] = $status;
        }
        if ($species) {
            $query['species'] = $species;
        }

        $response = Http::get('https://rickandmortyapi.com/api/character', $query);
        $results = $response->json();

        if (isset($results['results'])) {

            $characters = $results['results'];
            // Ordenar los personajes por nombre y género
            usort($characters, function($a, $b) {
                return $a['gender'] <=> $b['gender'] ?: $a['name'] <=> $b['name'];
            });

            // Crear un paginador con los datos de la API
            $characters_paginator = new LengthAwarePaginator(
                $characters,
                $results['info']['count'],
                20,
                $currentPage,
                ['path' => url('/')]
            );

            return view('characters.index', [
                'characters' => $characters_paginator,
                'status' => $status,
                'species' => $species,
                'page' => $currentPage
            ]);
        } else {
            // Manejar el caso en que no se encuentren resultados
            $characters = collect([]);
            return view('characters.index', [
                'characters' => $characters,
                'status' => $status,
                'species' => $species,
                'page' => $currentPage
            ]);
        }
    }

    public function show($id, Request $request)
    {

        $status = $request->input('status');
        $species = $request->input('species');
        $page = $request->input('page');

        $response = Http::get("https://rickandmortyapi.com/api/character/{$id}");
        $character = $response->json();

        return view('characters.show', [
            'character' => $character,
            'status' => $status,
            'species' => $species,
            'page' => $page
        ]);
    }
}
