<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Livre;
use \Session;

class FrontController extends Controller
{
  public function main(){//return la vue main de mon front
    // retourne la vue
    return view('front/index'); //renvoi la vue avec les livres en variable
  }
  public function vuePlus(Livre $id){//increment le nombre de vue sur mon livre avec la route(/vue-plus)
    $vue = $id->nombre_vue; //recup de la valeur de la vue
    $id->nombre_vue = $vue + 1; //increment de 1
    $id->save(); //save la vue en DB
    return $id->nombre_vue;//return la valeur de la vue pr gagner du temp,qui ns evite de faire un interval avec de lajax
  }

//GESTION DU PANIER-----------------------------------------------------------------------------------------------------------------
  public function recupPanier(){ //recup de la session panier (/recup-panier)
    $panier = [];
    foreach (session::get('panier', []) as $value) {// recup de la session panier ou creer un tableau vide si il n existe pas
      $array = [$value[0], $value[1], $value[2], $value[3]]; //recup dans un tableau le nombre de fois dans le panier[0], le prix[1], le titre [2], l'id du livre[3]
      array_push($panier,$array);//le push dans un tableau pr plus de simplicite
    }
    return $panier;//return le panier
  }

  //ajouter au panier un article avec la route (/panierplus)
  public function panierplus(Livre $id){
    $panier = session::get('panier', []); // recup mon tableau de session panier si inexistant on le creer a vide
    if (isset($panier[$id->id])) {//si la clef existe dans ma session panier alors
      $panier[$id->id][0] = $panier[$id->id][0] + 1 ; // j'incremente ma valeur
    }else { // si ma clef est inexistant ds le tableau
      $panier[$id->id] = [1, $id->prix , $id->titre, $id->id]; //alors je l assigne a 1
    }
    session::put('panier', $panier);//je renvoi tt dans ma session panier
  }

  //enlever du panier un article avec la route (/paniermoins)
  public function paniermoins(Livre $id){
    $panier = session::get('panier', []);// recup mon tableau de session panier si inexistant on le creer a vide
    if (array_key_exists($id->id, session('panier', [])) && $panier[$id->id][0] > 1) {//si la clef existe dans ma session panier et est superieur a 1 alors
      $panier[$id->id][0] = $panier[$id->id][0] - 1;//je la decremente de  1
      session::put('panier', $panier); //je sauvegarde le changement de ma session panier
    }elseif (array_key_exists($id->id, session('panier', [])) && $panier[$id->id][0] == 1) {//si elle existe et est equale a 1 alors
      unset($panier[$id->id]);//je la supprime du tableau
      session::put('panier', $panier); //je sauvegarde le changement de ma session panier
    }else {
      return false;
    }

  }
  //vide le panier avec la route(/paniervide)
  public function panierVide(){
    Session::set('panier', []);// vide le panier session
  }
//FIN GESTION DU PANIER-----------------------------------------------------------------------------------------------------------------



//GESTION DE LA SESSION LIKE-----------------------------------------------------------------------------------------------------------------
  public function recupLike(){ //recup de la session like (/recup-like)
    $likes = [];
    foreach (session::get('likes', []) as $key => $value) {// recup de la session panier ou creer un tableau vide si il n existe pas
      $likes[$key] = $key;
    }
    return $likes;//return le panier
  }
  //function pr les likes()
  public function liker(Livre $id){//return la vue du DashBoard avec ses info (welcome)

    $likes = session::get('likes', []);//recup ma session like si elle existe sinn creer un tableau vide

        if ( array_key_exists($id->id, $likes) ) { //si la clef n'existe pas alors jassigne le une valeur
          unset($likes[$id->id]);
        } else {//si elle existe je la supprime
            $likes[$id->id] = $id->titre;
        }

        session()->put('likes', $likes);//je save la modification de ma session like
  }

//FIN GESTION DE LA SESSION LIKE-----------------------------------------------------------------------------------------------------------------

}
