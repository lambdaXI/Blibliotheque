<?php

/* vuecontroller gere l'edition des auteurs, livres; la suppression des auteurs et livres ;
 la vue de backoffice du livre (/backoffice/livre);la vue de backoffice des auteurs (/backoffice/auteur); */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Livre;
use App\Auteur;
use Validator;

class VueController extends Controller
{
  public function livreVue(){//return la liste des livres (/Livre)
    $livres = Livre::all();
    // retourne la vue
    return view('livre/vue',[
    "livres" => $livres,
  ]);
  }
  public function auteurVue(){//return la liste des auteurs (/auteur)
    $auteurs = Auteur::all();
    // retourne la vue
    return view('auteur/vue',[
    "auteurs" => $auteurs,
  ]);
  }

  public function DelLivre(Livre $id){// Delete livre de la database (backoffice/del-livre/{id})
    $id->delete();

    //Redirection avec message de succès
      return redirect()->route('Livre')
      ->with('success', "Le livre '{$id->titre}' a bien ete supprimer");
  }
  public function DelAuteur(Auteur $id){// Delete auteur de la database (backoffice/del-auteur/{id})
    $id->delete();

    //Redirection avec message de succès
      return redirect()->route('auteur')
      ->with('success', "L auteur a bien ete supprimer");
  }

  public function EditLivreForm(Livre $id){// Editer livre de la database (backoffice/edit-livreForm/{id})
  $dateParution = \DateTime::createFromFormat('Y-m-d', $id->date_parution);
  $date = $dateParution->format('d/m/Y');
  return view('livre/edit',[
    "livre" => $id,
    "dateParution" => $date,
  ]);
  }
  public function EditAuteurForm(Auteur $id){// Vue du formulaire edition auteur (backoffice//edit-AuteurForm/{id})
  //formatage de la date de naissance
  $datebirth = \DateTime::createFromFormat('Y-m-d H:i:s', $id->date_naissance);
  $datebirth2 = $datebirth->format('d/m/Y');
  //formatage de la date de mort
  $datedead = \DateTime::createFromFormat('Y-m-d H:i:s', $id->date_mort);
  $datedead2 = $datedead->format('d/m/Y');
  //return vu avec les infos des champs
  return view('auteur/edit',[
    "auteur" => $id,
    "datebirth" => $datebirth2,
    "datedead" => $datedead2,
  ]);
  }

  public function EditLivre(Livre $id,Request $request){// Vue du formulaire edition Livre (backoffice/edit-livre/{id})
  $validator = Validator::make($request->all(), [ //phase de verification
    'titre' => 'required|regex:/^[\w\d]+([\s\-]+[\w\d]+)*$/i',
    'prix' => 'required|regex:/^[0-9]{1,2}(\.[0-9]+)?/',
    'numero_isbn' => 'required|regex:/^[0-9]{9,}$/',
    'image' => 'required|min:5',
    'numero_ean' => 'required|min:14',
    'id_auteur' => 'required|exists:auteur,id',
    'maison_edition' => 'required|regex:/^\w{3,}([\s\-]+\w+)*$/i',
    'date_parution' => 'required|regex:/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/',
    'magasin' => 'required|min:2|max:550',
    'version_numerique' => 'in:on',
  ]);

  if (!$validator->fails()){ //phase de sauvegarde
    $dateParution = \DateTime::createFromFormat('d/m/Y', $request->date_parution);
    $id->titre = $request->titre;
    $id->prix = $request->prix;
    $id->numero_isbn = $request->numero_isbn;
    $id->image = $request->image;
    $id->numero_ean = $request->numero_ean;
    $id->id_auteur = $request->id_auteur;
    $id->maison_edition  = $request->maison_edition;
    $id->date_parution = $dateParution->format('Y-m-d'); //parser YYYY-MM-DD
    $id->magasin = $request->magasin;
    if ($request->version_numerique) { //si la check box est coché ou pas
      $id->version_numerique = 1;
    }else {
      $id->version_numerique = 0;
    }

    $id->save();
    return redirect()->route('Livre')->with('success',"Votre livre '{$request->titre}' a bien été modifié");// redirige vers ma liste des livres avec message success
    }elseif ($validator->fails()){ //si phase de verification a des erreurs
        return redirect()->route('EditLivreForm', ['id' => $id->id]) //redirige vers fomrulaire avec les erreurs
               ->withErrors($validator);
    }
  }

  public function EditAuteur(Auteur $id,Request $request){// Editer auteur de la database (backoffice/edit-livre/{id})
  $validator = Validator::make($request->all(), [// phase de verification
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

  if (!$validator->fails()){// si aucune erreur alors sauvegarde des info
    $dateBirth = \DateTime::createFromFormat('d/m/Y', $request->date_naissance);
    $dateDead = \DateTime::createFromFormat('d/m/Y', $request->date_mort);
    $id->prenom = $request->prenom;
    $id->nom = $request->nom;
    $id->age = $request->age;
    $id->image = $request->image;
    $id->sexe = $request->sexe;
    $id->ville = $request->ville;
    $id->courant_literaire  = $request->courant_literaire;
    $id->date_naissance = $dateBirth->format('Y-m-d'); //parser YYYY-MM-DD
    $id->date_mort = $dateDead->format('Y-m-d'); //parser YYYY-MM-DD
    $id->biographie = $request->biographie;
    $id->save();

    return redirect()->route('auteur')->with('success',"Votre Auteur '{$request->nom} {$request->prenom}' a bien été modifié"); // redirection avec message success
  }elseif ($validator->fails()){ // champ ayant des erreurs

      return redirect()->route('auteur') //redirige vers nom de la route "auteur"  avec message error
             ->withErrors($validator);

    }

  }

}
