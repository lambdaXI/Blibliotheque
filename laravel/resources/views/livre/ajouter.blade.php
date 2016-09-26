@extends('layout')

@section('content')
  <h2 class="col-sm-offset-4">Ajouter Vos Livres</h2>

<div ng-controller="livreFormulaireController">

  <form class="form-horizontal">
    <div class="form-group">
      <label for="titre" class="col-sm-2 control-label">titre:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="titre" placeholder="titre">
      </div>
    </div>
    <div class="form-group">
      <label for="prix" class="col-sm-2 control-label">prix:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prix" placeholder="prix">
      </div>
    </div>
    <div class="form-group">
      <label for="numero_isbn" class="col-sm-2 control-label">Numero ISBN:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="numero_isbn" placeholder="Numero ISBN">
      </div>
    </div>
    <div class="form-group">
      <label for="image" class="col-sm-2 control-label">Image:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="image" placeholder="image">
      </div>
    </div>
    <div class="form-group">
      <label for="numero_ean" class="col-sm-2 control-label">Numero EAN:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="numero_ean" placeholder="Numero EAN">
      </div>
    </div>
    <div class="form-group">
      <label for="id_auteur" class="col-sm-2 control-label">Auteur:</label>
      <div class="col-sm-10">
        <select class="form-control" name="id_auteur" id="id_auteur">
          <option disabled selected>Choisissez votre auteur</option>
          <option ng-repeat="auteur in select" value="#{auteur.id}#">#{auteur.nom}# #{auteur.prenom}#</option>
          <option disabled ng-if="select.length == 0" style="color:red">Pas d'auteur inscrit dans la DataBase</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="maison_edition" class="col-sm-2 control-label">Maison edition:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="maison_edition" placeholder="Maison edition">
      </div>
    </div>
    <div class="form-group">
      <label for="date_parution" class="col-sm-2 control-label">Date de parution:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="date_parution" placeholder="Date de parution">
      </div>
    </div>
    <div class="form-group">
      <label for="magasin" class="col-sm-2 control-label">Magasin:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="magasin" placeholder="Magasin">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label>
            <input type="checkbox" name="version_numerique"> Version numerique
          </label>
        </div>
      </div>
    </div>
    <button type="button" class="btn btn-primary btn-lg active col-sm-offset-2">Envoyer</button>
  </form>

</div>
@endsection
