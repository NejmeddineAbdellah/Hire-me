<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Demande;
use App\Http\Requests\StoreDemandeRequest;
use App\Http\Requests\UpdateDemandeRequest;
use App\Http\Resources\DemandeResource;
use App\Models\Annonce;
use App\Models\User;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DemandeResource::collection(Demande::all());
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
     * @param  \App\Http\Requests\StoreDemandeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDemandeRequest $request)
    {
        Demande::create($request->all());
        
        return response()->json([
            'message'=>'Votre Demande a été envoyer'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return Demande::where('user_id','=',$id)->get();
    }


    public function getDemandesByAnnonceRecruteur($user_id){

        $demandes = Demande::leftJoin('annonces','demandes.id_annonce','annonces.id')->leftJoin('users','annonces.user_id','users.id')->where('annonces.user_id',$user_id)->get();

        return $demandes;
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDemandeRequest  $request
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDemandeRequest $request, $id)
    {
        $demande = Demande::find($id);
        $demande->update($request->all());

    

        return response()->json([
            'message'=> 'Demande a été Modifié'
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        $demande->delete();

        return response()->json([
            'message' => 'Demande a été Supprimer !'
        ]);
    }
}
