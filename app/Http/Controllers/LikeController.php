<?php

namespace App\Http\Controllers;

use App\Models\VideoGame;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function update(Request $request, VideoGame $videogames)
    {
        return Auth::user()->iLike()->toggle($videogames);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoGame  $videoGame
     * @return \Illuminate\Http\Response
     */
   
}
