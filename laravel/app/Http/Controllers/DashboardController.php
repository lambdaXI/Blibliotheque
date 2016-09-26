<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Auteur;
use App\Livre;
use DB;
use \Session;

class DashboardController extends Controller
{
  public function main(){//return la vue du DashBoard avec ses info (welcome)
    $auteurTotal = Auteur::all()->count();
    $livreTotal = Livre::all()->count();
    $vueTotal = Livre::select(DB::raw('SUM(nombre_vue) as total'))->first();
    // retourne la vue
    return view('welcome',[
    "auteurTotal" => $auteurTotal,
    "livreTotal" => $livreTotal,
    "vueTotal" => $vueTotal,
  ]);
  }

  public function gallery(){//return la vue du DashBoard avec ses info (welcome)
    $livres = Livre::all();

    if (Session::has('like')) {
      $like =Session::get('like');
    }else {
      $like = [];
      Session::put('like', $like);
    }
    // retourne la vue
    return view('gallery',[
    "livres" => $livres,
    'like' => $like
  ]);
  }
  public function like(Livre $id){//return la vue du DashBoard avec ses info (welcome)

    $likes = session('likes', []);

        if (!isset($likes[$id->id])) {
            $likes[$id->id] = $id->titre;
        } else {
            unset($likes[$id->id]);
        }

        session()->put('likes', $likes);

        return back();
  }
}
