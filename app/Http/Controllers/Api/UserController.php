<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Candidat;
use App\Models\Recruteur;
use Intervention\Image\Facades\Image as Image;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }


    public function getAnnonceByuserId($id){
        $an = User::find($id)->annonces;
        return $an;
    }


    public function getusercandidat($usre){

        return User::find($usre)->candidats;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    { 
       
        $us = User::create($request->all());

        if ($request->role == 'candidat') {

            $candidat = new Candidat();
            $currentPhoto = $candidat->image_candidat;
            $currentCv = $candidat->cv_candidat;
            
            if($request->image_candidat != $currentPhoto){
                $name = time().'.' . explode('/', explode(':', substr($request->image_candidat, 0, strpos($request->image_candidat, ';')))[1])[1];
                Image::make($request->image_candidat)->save(public_path('img/users/avatar/').$name);
                $candidat->image_candidat = $name;
            
                }

          
            if($request->cv_candidat != $currentCv){
                $name = time().'.' . explode('/', explode(':', substr($request->cv_candidat, 0, strpos($request->cv_candidat, ';')))[1])[1];
                Image::make($request->cv_candidat)->save(public_path('img/users/cv/').$name);
                $candidat->cv_candidat = $name;
                    
                }

                $candidat->nom_candidat = $request->nom_candidat;
                $candidat->prenom_candidat = $request->prenom_candidat;
                $candidat->niveau_etude = $request->niveau_etude;
                $candidat->user_id = $us->id;
                $candidat->save();
            
            } 
        elseif ($request->role == 'recruteur') {
            $recruteur = new Recruteur();
            $currentPhoto = $recruteur->logo;

            if($request->logo != $currentPhoto){
                $name = time().'.' . explode('/', explode(':', substr($request->logo, 0, strpos($request->logo, ';')))[1])[1];
                Image::make($request->logo)->save(public_path('img/users/Logo/').$name);
                $recruteur->logo = $name;
            }
            
                     
            $recruteur->logo = $name;
            $recruteur->name = $request->name;
            $recruteur->user_id = $us->id;
            $recruteur->save();
            
        }

        return response()->json([
            'message'=>'Utilisateur a été Ajouté',
        ]);
        
    }

    public function login(Request $request){

        $user = User::whereEmail($request->email)->first();
        

        if($user->role == 'candidat')
        {
           $userlogged=User::rightJoin('candidats','users.id',"candidats.user_id")->whereEmail($request->email)->first();

        }elseif($user->role == 'recruteur'){

            $userlogged=User::rightJoin('recruteurs','users.id',"recruteurs.user_id")->whereEmail($request->email)->first();
        }else{
            $userlogged=$user;
        }
        

        if (isset($user->id)) {
            if (Hash::check($request->password,$user->password)) {
                $token = $user->createToken('auth_token')->plainTextToken;
                
                return response()->json([
                    'message' => 'bienvenue',
                    $userlogged,
                    'Token' => $token
                ]);
            } else {
                return response()->json([
                    'message'=>'password iuncorrect !',
                ]);
            }
        }else {
            return response()->json([
                'message'=>"ce email n'exist pas "
            ]);
        }
    }

    public function logout(Request $request){
   
       if ($request->user()) { 
        $request->user()->tokens()->delete();
            }
        return response()->json([
            'message'=>'Bien deconnecter'
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
       
    }


    public function getUserByRole($role){
        $users = User::where('role','=',$role)->get(); 
        return $users;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $us = User::find($id);

        $us->update($request->all());

        if ($us->role == 'candidat') {
          
           $candidat = new Candidat();
        $candidat->nom_candidat = $request->nom_candidat;
        $candidat->prenom_candidat = $request->prenom_candidat;
        $candidat->image_candidat = $request->image_candidat;
        $candidat->niveau_etude = $request->niveau_etude;
        $candidat->cv_candidat = $request->cv_candidat;
        $candidat->user_id = $us->id;

        $candidat->save();
          
        } 
        elseif ($request->role == 'recruteur') {
          
            $recruteur = new Recruteur();
        $recruteur->name = $request->name;
        $recruteur->logo = $request->logo;
        $recruteur->user_id = $us->id;
        
        $recruteur->save();
          
        }

        return response()->json([
            'message'=>'Utilisateur a été Modifié'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $us = User::find($id);

        if ($us->role == 'candidat') {
            $cand = Candidat::where('user_id','=',$us->id);
            $cand->delete();
          
        } 
        elseif ($us->role == 'recruteur') {
          
            $rec = Recruteur::where('user_id','=',$us->id);
            $rec->delete();    
        
        }
        $us->delete();

        return response()->json([
            'message'=>'Utilisateur a été Supprimer'
        ]);
    }
}
