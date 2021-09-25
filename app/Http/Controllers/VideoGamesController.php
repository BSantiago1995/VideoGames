<?php

namespace App\Http\Controllers;

use App\Models\VideoGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VideoGamesController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except'=>'Show']);
    }
    public function index()
    {
        //$videogames= VideoGame::all();
        $videogames=Auth::user()->userVideo;
        $usu_auten=Auth::user()->id;
        $userGames=VideoGame::where('user_id',$usu_auten)->paginate(3);
        $like_usuario=Auth::user()->ilike;
        return view('VideoGames.Index')->with('videogames',$videogames)
                                       ->with('userGames',$userGames)
                                       ->with('likeusu',$like_usuario);
    }
    public function create()
    {
        $categorias= DB::table('categoria_juegos')->get()->pluck('nombre','id');
        return view('VideoGames.CreatePlay')->with('categorias',$categorias);
    }

    public function store(Request $request)
    {
        
        /// la variable es cualquiera //validacion para campos vacios
        $data = $request -> validate([
            'nombre'=> 'required|min:10',
            'price'=> 'required|numeric',
            'categorias' => 'required',
            'quantity' => 'required|numeric',
        ]);
        // generar la ruta de la imagen para su almacenamiento
        $ruta_imagen=$request['imagen']->store('Upload-image','public');
        
        //insertar la informacion del formulario a la base de datos
        Auth::user()->userVideo()->create([
            'name' => $data['nombre'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'photo' => $ruta_imagen, 
            'categoria_id'=> $data['categorias'],  
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ]);
        
        // se redirecciona a la vista
        return redirect()-> action([VideoGamesController::class, 'index']);
        //dd($request->all());//para visualizar todo lo que enviamos en el metodo Post
    }
    public function show(VideoGame $videogames){
        $like=(Auth::user())?Auth::user()->iLike->contains($videogames->id):false;
        $likes=$videogames->likes()->count();
        return view('videogames.Show')->with('videogames',$videogames)
                                      ->with('like',$like)
                                      ->with('likes',$likes);
    }
    public function edit(VideoGame $videogames){
        $this->authorize('update',$videogames);
        $categorias= DB::table('categoria_juegos')->get()->pluck('nombre','id');
        return view('VideoGames.EditPlay')->with('categorias',$categorias)
                                          ->with('videogames',$videogames);
    }
    public function update(Request $request,VideoGame $videogames){
        $this->authorize('update',$videogames);
        $data = $request -> validate([
            'nombre'=> 'required|min:10',
            'price'=> 'required|numeric',
            'categorias' => 'required',
            'quantity' => 'required|numeric',
        ]);
       
        
        //asiganacion de valores

        $videogames->name= $data['nombre'];
        $videogames->price =$data['price'];
        $videogames->quantity = $data['quantity'];
        $videogames->updated_at = date('Y-m-d H:i:s');
        $videogames->categoria_id= $data['categorias']; 

          // verificar imagen
          if($request['imagen']){
            //guardar la nueva imagen
            $ruta_imagen=$request['imagen']->store('upload-image','public');
            //estilo
            //$img= Image::make(public_path("storage/{$ruta_imagen}"))-> fit(1100,550);
            //$img->save();
            $videogames->photo=$ruta_imagen;
            }
        $videogames->save();
        return redirect()-> action([VideoGamesController::class, 'index']);
    }
    public function destroy(VideoGame $videogames){
        $this->authorize('delete',$videogames);
        return "archivo eliminado";
    }
}

