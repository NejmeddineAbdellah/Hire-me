<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Demande;
use App\Http\Requests\StoreDemandeRequest;
use App\Http\Requests\UpdateDemandeRequest;
use App\Http\Resources\DemandeResource;

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
            'message'=>'Demande a été Ajouter'
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
        //return Demande::find($id);
        return Demande::where('user_id','=',$id)->get();
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
