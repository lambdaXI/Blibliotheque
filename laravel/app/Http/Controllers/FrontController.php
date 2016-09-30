<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Livre;
use \Session;

class FrontController extends Controller
{
  public function main(){//return la vue main de mon front
    $livres = Livre::all();//recup de ts mes livres de ma DB
    // retourne la vue
    return view('front/index'); //renvoi la vue avec les livres en variable
  }
  public function vuePlus(Livre $id){//increment le nombre de vue sur mon livre avec la route(/vue-plus)
    $vue = $id->nombre_vue; //recup de la valeur de la vue
    $id->nombre_vue = $vue + 1; //increment de 1
    $id->save(); //save la vue en DB
    return $id->nombre_vue;//return la valeur de la vue pr gagner du temp,qui ns evite de faire un interval avec de lajax
  }

  public function recupPanier(){ //recup de la session panier (/recup-panier)
    $panier = [];
    foreach (session::get('panier', []) as $key => $value) {// recup de la session panier ou creer un tableau vide si il n existe pas
      $array = [$key, $value]; //recup dans un tableau la key(id de larticle) et la value(nombre de fois acheter)
      array_push($panier,$array);//le push dans un tableau pr plus de simplicite
    }
    return $panier;//return le panier
  }

  //ajouter au panier un article avec la route (/panierplus)
  public function panierplus($id){
    $panier = session::get('panier', []); // recup mon tableau de session panier si inexistant on le creer a vide
    if (isset($panier[$id])) {//si la clef existe dans ma session panier alors
      $panier[$id]++; // j'incremente ma valeur
    }else { // si ma clef est inexistant ds le tableau
      $panier[$id] = 1; //alors je l assigne a 1
    }
    session::put('panier', $panier);//je renvoi tt dans ma session panier
  }

  //enlever du panier un article avec la route (/paniermoins)
  public function paniermoins($id){
    $panier = session::get('panier', []);// recup mon tableau de session panier si inexistant on le creer a vide
    if (array_key_exists($id, session('panier', [])) && $panier[$id] > 1) {//si la clef existe dans ma session panier et est superieur a 1 alors
      $panier[$id]--;//je la decremente de  1
      session::put('panier', $panier); //je sauvegarde le changement de ma session panier
    }elseif (array_key_exists($id, session('panier', [])) && $panier[$id] == 1) {//si elle existe et est equale a 1 alors
      unset($panier[$id]);//je la supprime du tableau
      session::put('panier', $panier); //je sauvegarde le changement de ma session panier
    }else {
      return false;
    }

  }
}
