<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

use function Ramsey\Uuid\v1;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{

    // $animes = Anime::all();
    // return response()->json($animes);
    $perPage = $request->query('perPage', 10); // Default 10 per pagina
    $page = $request->query('page', 1); // Huidige pagina
    $animes = Anime::paginate($perPage, ['*'], 'page', $page);
    return response()->json($animes);

    // return response()->json([
    //     'animes' => $animes->items(),
    //     'currentPage' => $animes->currentPage(),
    //     'totalPages' => $animes->lastPage(),
    //     'perPage' => $animes->perPage(),
    //     'totalItems' => $animes->total(),
    // ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $anime = Anime::findOrFail($id);
        return $anime;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
