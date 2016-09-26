<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Auteur;
use App\Livre;
use App\Test;
use Validator;
use DB;

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
      $validator = Validator::make($request->all(), [
        'nom' => 'required|regex:/^[a-z]{3,}$/i',
        'prenom' => 'required|regex:/^[a-z]{3,}$/i',
        'age' => 'required|regex:/^[0-9]{2}$/i',
        'image' => 'required|min:5',
        'ville' => 'required|regex:/^[a-z]{3,}$/i',
        'courant_literaire' => 'required|regex:/^[a-z]{3,}$/i',
        'date_naissance' => 'required|regex:/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/i',
        'date_mort' => 'required|regex:/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/i',
        'biographie' => 'required|min:10|max:550',
        'sexe' => 'required|in:homme,femme',
      ]);

      if (!$validator->fails()){
        // créer un nouveau auteur en bdd
        $auteur = new Auteur();
        $dateBirth = \DateTime::createFromFormat('d/m/Y', $request->date_naissance);
        $dateDead = \DateTime::createFromFormat('d/m/Y', $request->date_mort);
        $auteur->prenom = $request->prenom;
        $auteur->nom = $request->nom;
        $auteur->age = $request->age;
        $auteur->image = $request->image;
        $auteur->sexe = $request->sexe;
        $auteur->ville = $request->ville;
        $auteur->courant_literaire  = $request->courant_literaire;
        $auteur->date_naissance = $dateBirth->format('Y-m-d'); //parser YYYY-MM-DD
        $auteur->date_mort = $dateDead->format('Y-m-d'); //parser YYYY-MM-DD
        $auteur->biographie = $request->biographie;
        $auteur->save();
      }
    }

    public function AddLivre(Request $request){//ajoute a la database des livres avec la route (ajouter/add-livre) utiliser avec http.post
      $validator = Validator::make($request->all(), [
        'titre' => 'required|regex:/^[\w\d]+([\s\-]+[\w\d]+)*$/i',
        'prix' => 'required|regex:/^[0-9]{1,2}(\.[0-9]+)?/',
        'numero_isbn' => 'required|regex:/^[0-9]{9,}$/|unique:livre,numero_isbn',
        'image' => 'required|min:5',
        'numero_ean' => 'required|min:14|unique:livre,numero_ean',
        'id_auteur' => 'required|exists:auteur,id',
        'maison_edition' => 'required|regex:/^\w{3,}([\s\-]+\w+)*$/i',
        'date_parution' => 'required|regex:/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/',
        'magasin' => 'required|min:2|max:550',
        'version_numerique' => 'boolean',
      ]);

      if (!$validator->fails()){
        // créer un nouveau auteur en bdd
        $livre = new Livre();
        $dateParution = \DateTime::createFromFormat('d/m/Y', $request->date_parution);
        $livre->titre = $request->titre;
        $livre->prix = $request->prix;
        $livre->numero_isbn = $request->numero_isbn;
        $livre->image = $request->image;
        $livre->numero_ean = $request->numero_ean;
        $livre->id_auteur = $request->id_auteur;
        $livre->maison_edition  = $request->maison_edition;
        $livre->date_parution = $dateParution->format('Y-m-d'); //parser YYYY-MM-DD
        $livre->magasin = $request->magasin;
        $livre->version_numerique = $request->version_numerique;

        $livre->save();
      }
    }

    public function AuteurLiteraireData(){ //recup la DataBase auteur avec la route (/auteur-data)
      $variable = Auteur::select(DB::raw('COUNT(*) as value'), 'courant_literaire as label')
                  ->groupBy('courant_literaire')
                  ->get();
      return $variable;
    }
    public function AuteurData(){ //recup la DataBase auteur avec la route (/auteur-data)
      return Auteur::all();
    }
    public function AuteurTotalData(){ //recup la DataBase auteurtotal avec la route (/auteurtotal-data)
      return Auteur::all()->count();
    }
    public function LivreTotalData(){ //recup la DataBase livretotal avec la route (/livretotal-data)
      return Livre::all()->count();
    }
    public function LivreRandomData(){ //recup la DataBase livretotal avec la route (/livretotal-data)
      return Livre::all()->random();
    }
    public function LivreGroupYear(){ //recup la DataBase livretotal avec la route (/livretotal-data)
      $variable = Livre::select(DB::raw('YEAR(date_parution) as year'), 'titre')
                  ->orderBy('year', 'desc')
                  ->get();
      return $variable;
    }

    public function AuteurIdData(Auteur $id){ //recup la DataBase livretotal avec la route (/livretotal-data)
      return $id;
    }
}
