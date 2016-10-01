<?php
/*
DashboardController gere une petit partie de la vue (/dashboard)
gere la vue du catalogue avec les likes(pour la partie front le controller du front gere lui aussi la meme session de like seule difference il n'y a pas de redirection)
gere la vu en pdf*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Auteur;
use App\Livre;
use DB;
use \Session;
use App;

class DashboardController extends Controller
{

  public function main(){
    /*return la vue du DashBoard avec ses info (return juste le nombre total d'auteurs, de livres, et de vues dans les 3 panel rectangulaire avec logo de gauche )
    le reste des des infos pour les doughnut , piechart et tableau sont fourni en js par le controller DashboardController.js en ajax(avec interval permet de rafraichie les données
    sans rafraichir la page)
    */
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

  public function gallery(){//return la vue gallery avec les données de la session likes
    $livres = Livre::all();

    if (Session::has('likes')) {
      $likes =Session::get('likes');
    }else {
      $likes = [];
      Session::put('likes', $likes);
    }
    // retourne la vue
    return view('gallery',[
    "livres" => $livres,
    'likes' => $likes
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

  //PARTIE MODE PDF---------------------------------------------------------------------
  public function pdfLivre(){//return la liste des livres en pdf (/pdfLivre)
    $livres = Livre::all();
    $pdf = App::make('dompdf.wrapper');
    $html = '<table border="2">
      <thead>
        <tr>
          <th>Id</th>
          <th>Titre</th>
          <th>Prix</th>
          <th>ISBN</th>
          <th>EAN</th>
          <th>Image</th>
          <th>Id Auteur</th>
          <th>Editeur</th>
          <th>Date parution</th>
          <th>Magasin</th>
          <th>Version Numerique</th>
          <th>vue</th>
        </tr>
      </thead>
      <tbody>';
    foreach ($livres as $livre) {
      $html.=  '<tr>
                  <td>'.$livre->id.'</td>
                  <td>'.$livre->titre.'</td>
                  <td>'.number_format($livre->prix,2).'</td>
                  <td>'.$livre->numero_isbn.'</td>
                  <td>'.$livre->numero_ean.'</td>
                  <td>'.'<img src="'.$livre->image.'" alt="" width="200" height="200"/></td>
                  <td>'.Auteur::find($livre->id_auteur)->nom.' '.Auteur::find($livre->id_auteur)->prenom.'</td>
                  <td>'.$livre->maison_edition.'</td>
                  <td>'.$livre->date_parution.'</td>
                  <td>'.$livre->magasin.'</td>
                  <td>'.$livre->version_numerique.'</td>
                  <td>'.$livre->nombre_vue.'</td>
                </tr>';
    }
    $html .= '</tbody>
                </table>';
     $pdf->loadHTML($html);
      return $pdf->stream();
  }

  public function pdfAuteur(){//return la liste des auteurs en pdf (/pdfAuteur)
    $auteurs = Auteur::all();
    $pdf = App::make('dompdf.wrapper');
    $html = '<table border="2">
    <thead>
      <tr>
        <th>Id</th>
        <th>Titre</th>
        <th>Prix</th>
        <th>ISBN</th>
        <th>EAN</th>
        <th>Image</th>
        <th>Id Auteur</th>
        <th>Editeur</th>
        <th>Date parution</th>
        <th>Magasin</th>
        <th>Version Numerique</th>
        <th>vue</th>
      </tr>
    </thead>
    <tbody>';

    foreach ($auteurs as $auteur) {
      $html.=  '<tr>
                  <td>'.$auteur->id.'</td>
                  <td>'.$auteur->sexe.'</td>
                  <td>'.$auteur->nom.'</td>
                  <td>'.$auteur->prenom.'</td>
                  <td>'.$auteur->age.'</td>
                  <td>'.'<img src="'.$auteur->image.'" alt="" width="200" height="200"/></td>
                  <td>'.$auteur->ville.'</td>
                  <td>'.$auteur->courant_literaire.'</td>
                  <td>'.$auteur->date_naissance.'</td>
                  <td>'.$auteur->date_mort.'</td>
                  <td>'.$auteur->biographie.'</td>
                </tr>';
    }

    $html .= '</tbody>
                </table>';
     $pdf->loadHTML($html);
      return $pdf->stream();

  }
  //---------------------------------------------------------------------------
}
