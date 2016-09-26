@extends('layout')

@section('content')
  <h2 class="col-sm-offset-4">Ajouter Auteur</h2>

<div ng-controller="auteurFormulaireController">

  <form class="form-horizontal" name="form" ng-submit="addAuteur()" method="post">
    {{ csrf_field() }}
    <div class="form-group" id="formNom" ng-class="{'has-success': isInputValid(form.nom),'has-error': isInputInvalid(form.nom)}">
      <label for="nom" class="col-sm-2 control-label">Nom:</label>
      <div class="col-sm-10">
        <input type="text" required pattern="^[A-Za-z]{3,}$" class="form-control" id="nom" placeholder="Nom" name="nom" ng-model="auteur.nom">
        <span class="text-danger" ng-show="form.nom.$error.required && form.nom.$touched">Le champs est obligatoire</span>
        <span  class="text-warning" ng-show="form.nom.$error.pattern && form.nom.$touched">Le champs est invalide</span>
      </div>
    </div>
    <div class="form-group" id="formPrenom" ng-class="{'has-success': isInputValid(form.prenom),'has-error': isInputInvalid(form.prenom)}">
      <label for="prenom" class="col-sm-2 control-label">Prenom:</label>
      <div class="col-sm-10">
        <input type="text" required pattern="^[A-Za-z]{3,}$" class="form-control" id="prenom" placeholder="Prenom" name="prenom" ng-model="auteur.prenom">
        <span class="text-danger" ng-show="form.prenom.$error.required && form.prenom.$touched">Le champs est obligatoire</span>
        <span  class="text-warning" ng-show="form.prenom.$error.pattern && form.prenom.$touched">Le champs est invalide</span>
      </div>
    </div>
    <div class="form-group" id="formAge" ng-class="{'has-success': isInputValid(form.age),'has-error': isInputInvalid(form.age)}">
      <label for="age" class="col-sm-2 control-label">Age:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" required pattern="^[0-9]{2}$" id="age" placeholder="Age" name="age" ng-model="auteur.age">
        <span class="text-danger" ng-show="form.age.$error.required && form.age.$touched">Le champs est obligatoire</span>
        <span  class="text-warning" ng-show="form.age.$error.pattern && form.age.$touched">Le champs est invalide</span>
      </div>
    </div>
    <div class="form-group" id="formImage" ng-class="{'has-success': isInputValid(form.image),'has-error': isInputInvalid(form.image)}">
      <label for="image" class="col-sm-2 control-label">Image:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" required pattern="^https?:\/\/(www\.)?.+\.(jpg|png|jpeg|bmp|gif)$" id="image" placeholder="image" name="image" ng-model="auteur.image">
        <span class="text-danger" ng-show="form.image.$error.required && form.image.$touched">Le champs est obligatoire</span>
        <span  class="text-warning" ng-show="form.image.$error.pattern && form.image.$touched">Le champs est invalide</span>
      </div>
    </div>
    <div class="form-group" id="formVille" ng-class="{'has-success': isInputValid(form.ville),'has-error': isInputInvalid(form.ville)}">
      <label for="ville" class="col-sm-2 control-label">Ville:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="ville" required pattern="^[A-Za-z]{3,}$" placeholder="Ville" name="ville" ng-model="auteur.ville">
        <span class="text-danger" ng-show="form.ville.$error.required && form.ville.$touched">Le champs est obligatoire</span>
        <span  class="text-warning" ng-show="form.ville.$error.pattern && form.ville.$touched">Le champs est invalide</span>
      </div>
    </div>
    <div class="form-group" id="formSexe">
      <div class="radio">
        <label>
          <input type="radio" name="optionsRadios" id="optionsRadios1" ng-model="auteur.sexe" value="homme" checked>
          Homme
        </label>
        <label>
          <input type="radio" name="optionsRadios" id="optionsRadios2" ng-model="auteur.sexe" value="femme">
          Femme
        </label>
      </div>
    </div>
    <div class="form-group" id="formLiteraire" ng-class="{'has-success': isInputValid(form.courant_literaire),'has-error': isInputInvalid(form.courant_literaire)}">
      <label for="courant_literaire" class="col-sm-2 control-label">Courant Litéraire:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="courant_literaire" required pattern="^[A-Za-z]{3,30}$" placeholder="Courant Literaire" name="courant_literaire" ng-model="auteur.courant_literaire">
        <span class="text-danger" ng-show="form.courant_literaire.$error.required && form.courant_literaire.$touched">Le champs est obligatoire</span>
        <span  class="text-warning" ng-show="form.courant_literaire.$error.pattern && form.courant_literaire.$touched">Le champs est invalide</span>
      </div>
    </div>
    <div class="form-group" id="formNaissance" ng-class="{'has-success': isInputValid(form.date_naissance),'has-error': isInputInvalid(form.date_naissance)}">
      <label for="date_naissance" class="col-sm-2 control-label">Date De Naissance:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="date_naissance" required pattern="^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="dd/mm/aaaa" name="date_naissance" ng-model="auteur.date_naissance">
        <span class="text-danger" ng-show="form.date_naissance.$error.required && form.date_naissance.$touched">Le champs est obligatoire</span>
        <span  class="text-warning" ng-show="form.date_naissance.$error.pattern && form.date_naissance.$touched">Le champs est invalide</span>
      </div>
    </div>
    <div class="form-group" id="formMort" ng-class="{'has-success': isInputValid(form.date_mort),'has-error': isInputInvalid(form.date_mort)}">
      <label for="date_mort" class="col-sm-2 control-label">Date de mort:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="date_mort" required pattern="^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="dd/mm/aaaa" name="date_mort" ng-model="auteur.date_mort">
        <span class="text-danger" ng-show="form.date_mort.$error.required && form.date_mort.$touched">Le champs est obligatoire</span>
        <span  class="text-warning" ng-show="form.date_mort.$error.pattern && form.date_mort.$touched">Le champs est invalide</span>
      </div>
    </div>
    <div class="form-group" id="formBiographie" ng-class="{'has-success': isInputValid(form.biographie),'has-error': isInputInvalid(form.biographie)}">
      <label for="biographie" class="col-sm-2 control-label">Biographie:</label>
      <div class="col-sm-offset-2">
        <textarea class="form-control" rows="3" name="biographie" required ng-minlength="10" ng-maxlength="550" id="biographie" ng-model="auteur.biographie"></textarea>
        <span class="text-danger" ng-show="form.biographie.$error.required && form.biographie.$touched">Le champs est obligatoire</span>
        <span  class="text-warning" ng-show="form.biographie.$error.minlength && form.biographie.$touched">Vous n'avez pas inseré assez de mot</span>
        <span  class="text-warning" ng-show="form.biographie.$error.maxlength && form.biographie.$touched">Vous avez inseré trop de mot</span>
      </div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg active col-sm-offset-2" id="send">Envoyer</button>
  </form>

</div>
@endsection
