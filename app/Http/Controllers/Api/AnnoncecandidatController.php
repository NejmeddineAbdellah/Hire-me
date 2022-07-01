<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Annoncecandidat;
use App\Http\Requests\StoreAnnoncecandidatRequest;
use App\Http\Requests\UpdateAnnoncecandidatRequest;
use App\Models\Annonce;

class AnnoncecandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Annoncecandidat::all();
        
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
     * @param  \App\Http\Requests\StoreAnnoncecandidatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnnoncecandidatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Annoncecandidat  $annoncecandidat
     * @return \Illuminate\Http\Response
     */
    public function show($annoncecandidat)
    {        $an= Annonce::find($annoncecandidat);
        $annonce = Annonce::leftJoin('annoncecandidats','annonces.id',"annoncecandidats.annonce_id")->where('annonces.id', $an->id)->first();
        return $annonce;
       // Annonce::find($annoncecandidat)->ancandidats
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annoncecandidat  $annoncecandidat
     * @return \Illuminate\Http\Response
     */
    public function edit(Annoncecandidat $annoncecandidat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnnoncecandidatRequest  $request
     * @param  \App\Models\Annoncecandidat  $annoncecandidat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnnoncecandidatRequest $request, Annoncecandidat $annoncecandidat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annoncecandidat  $annoncecandidat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annoncecandidat $annoncecandidat)
    {
        //
    }
}
