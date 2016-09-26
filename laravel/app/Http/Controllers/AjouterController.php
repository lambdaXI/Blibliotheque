<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Auteur;
use App\Livre;
use App\Test;
use Validator;

class AjouterController extends Controller
{
    public function livre(){//return la vue du formulaire pr inserer ds livres avec la route (ajouter/livre)
      // retourne la vue
      return view('livre/ajouter');
    }

    public function auteur(){//return la vue du formulaire pr inserer ds auteurs avec la route (ajouter/auteur)
      // retourne la vue
      return view('auteur/ajouter');
    }

    public function AddAuteur(Request $request){//ajoute a la database des auteurs avec la route (ajouter/add-auteur) utiliser avec http.post
      $test = new Test();
      $test->prenom = "max";
      $test->nom = "test";
      $test->age = 18;
      $test->save();

      // $validator = Validator::make($request->all(), [
      //   'nom' => 'required|regex:/^[a-z]{3,}$/i',
      //   'prenom' => 'required|regex:/^[a-z]{3,}$/i',
      //   'age' => 'required|regex:/^[0-9]{2}$/i',
      //   'image' => 'required|regex:/^https?:\/\/(www\.)?.+\.(jpg|png|jpeg|bmp|gif)$/i',
      //   'ville' => 'required|regex:/^[a-z]{3,}$/i',
      //   'courant_literaire' => 'required|regex:/^[a-z]{3,}$/i',
      //   'date_naissance' => 'required|regex:/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/i',
      //   'date_mort' => 'required|regex:/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/i',
      //   'biographie' => 'required|min:10|max:550',
      //   'sexe' => 'required|in:homme,femme',
      // ]);
      //
      // if (!$validator->fails()){
      //   // créer un nouveau auteur en bdd
      //   $auteur = new Auteur();
      //   $dateBirth = \DateTime::createFromFormat('d/m/Y', $request->date_naissance);
      //   $dateDead = \DateTime::createFromFormat('d/m/Y', $request->date_mort);
      //   $auteur->prenom = $request->prenom;
      //   $auteur->nom = $request->nom;
      //   $auteur->age = $request->age;
      //   $auteur->sexe = $request->sexe;
      //   $auteur->ville = $request->ville;
      //   $auteur->courant_literaire  = $request->courant_literaire;
      //   $auteur->date_naissance = $dateBirth->format('Y-m-d'); //parser YYYY-MM-DD
      //   $auteur->date_mort = $dateDead->format('Y-m-d'); //parser YYYY-MM-DD
      //   $auteur->biographie = $request->biographie;
      //   $auteur->save();
      // }
    }

    public function AuteurData(){ //recup la DataBase auteur avec la route (/auteur-data)
      $auteur_data = Auteur::all();
      return $auteur_data;
    }
}
