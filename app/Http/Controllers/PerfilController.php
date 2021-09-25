<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\VideoGame;
use App\Policies\PerfilPolicy;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        $usuarioGames=$perfil->user_id;
        $userJuegos=VideoGame::where('user_id',$usuarioGames)->paginate(2);
        
        return view('perfiles.show')->with('perfil', $perfil)
                                    ->with('userJuegos',$userJuegos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        return view('perfiles.edit')->with('perfil', $perfil);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        
        //policy
        $this->authorize('update',$perfil);
      
        $data = $request -> validate([
            'nombre'=> 'required',
            'Fecha_nacimiento'=> 'required',
            'address' => 'required',
            'telefono' => 'required',
            'Description' => 'required',

        ]);

        if($request['imagen']){
            
            $ruta_imagen=$request['imagen']->store('upload-perfil','public');
            //$ruta_imagen->save();

            $array_imagen = ['imagen'=>$ruta_imagen];
         }

            auth()->user()->name=$data['nombre'];
            auth()->user()->address=$data['address'];
            auth()->user()->save();

        //eliminar url y name de data
            unset($data['nombre']);
            unset($data['address']);
    
        // guardar información
            auth()->user()->userPerfil()->update(array_merge( 
                $data,
                $array_imagen ?? [] 
            )             
            );
        
        //Redireccionar    

        return redirect()->action([VideoGamesController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
