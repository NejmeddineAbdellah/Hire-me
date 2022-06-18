<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Annoncerecruteur;
use App\Http\Requests\StoreAnnoncerecruteurRequest;
use App\Http\Requests\UpdateAnnoncerecruteurRequest;
use App\Models\Annonce;

class AnnoncerecruteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Annoncerecruteur::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAnnoncerecruteurRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnnoncerecruteurRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Annoncerecruteur  $annoncerecruteur
     * @return \Illuminate\Http\Response
     */
    public function show($annoncerecruteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annoncerecruteur  $annoncerecruteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Annoncerecruteur $annoncerecruteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnnoncerecruteurRequest  $request
     * @param  \App\Models\Annoncerecruteur  $annoncerecruteur
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnnoncerecruteurRequest $request, Annoncerecruteur $annoncerecruteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annoncerecruteur  $annoncerecruteur
     * @return \Illuminate\Http\Response
     */
    public function destroy($annoncerecruteur)
    {
        //
    }
}
