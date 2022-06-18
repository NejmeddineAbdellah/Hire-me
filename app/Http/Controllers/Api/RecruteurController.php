<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recruteur;
use App\Http\Requests\StoreRecruteurRequest;
use App\Http\Requests\UpdateRecruteurRequest;
use App\Http\Resources\RecruteurResource;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RecruteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Recruteur::all();
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
     * @param  \App\Http\Requests\StoreRecruteurRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecruteurRequest $request)
    {   
        return Recruteur::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recruteur  $recruteur
     * @return \Illuminate\Http\Response
     */
    public function show($recruteur)
    {
        return User::find($recruteur)->recruteurs;
             
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recruteur  $recruteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Recruteur $recruteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecruteurRequest  $request
     * @param  \App\Models\Recruteur  $recruteur
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecruteurRequest $request, Recruteur $recruteur)
    {
        $recruteur->fill($request->post())->update();

        return response()->json([
            'message' => 'Recruteur Demande a été Modifié'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recruteur  $recruteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recruteur $recruteur)
    {
        $recruteur->delete();

        return response()->json([
            'message' => 'Recruteur Demande a été Supprimer'
        ]);
    }
}
