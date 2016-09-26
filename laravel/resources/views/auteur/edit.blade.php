@extends('layoutBack')


@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Edit Les informations</div>
        <div class="panel-body">
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form class="form-horizontal" name="form" method="post" action="{{route('EditAuteur', ['id' => $auteur->id])}}">
            {{ csrf_field() }}
            <div class="form-group" id="formNom" ng-class="{'has-success': isInputValid(form.nom),'has-error': isInputInvalid(form.nom)}">
              <label for="nom" class="col-sm-2 control-label">Nom:</label>
              <div class="col-sm-10">
                <input type="text" required pattern="^[A-Za-z]{3,}$" class="form-control" id="nom" placeholder="Nom" name="nom" value="{{$auteur->nom}}">
              </div>
            </div>
            <div class="form-group" id="formPrenom" ng-class="{'has-success': isInputValid(form.prenom),'has-error': isInputInvalid(form.prenom)}">
              <label for="prenom" class="col-sm-2 control-label">Prenom:</label>
              <div class="col-sm-10">
                <input type="text" required pattern="^[A-Za-z]{3,}$" class="form-control" id="prenom" placeholder="Prenom" name="prenom" value="{{$auteur->prenom}}">
                <span class="text-danger" ng-show="form.prenom.$error.required && form.prenom.$touched">Le champs est obligatoire</span>
                <span  class="text-warning" ng-show="form.prenom.$error.pattern && form.prenom.$touched">Le champs est invalide</span>
              </div>
            </div>
            <div class="form-group" id="formAge" ng-class="{'has-success': isInputValid(form.age),'has-error': isInputInvalid(form.age)}">
              <label for="prenom" class="col-sm-2 control-label">Age:</label>
              <div class="col-sm-10">
                <input type="text" required pattern="^[0-9]{2}$" class="form-control" id="age" placeholder="age" name="age" value="{{$auteur->age}}">
                <span class="text-danger" ng-show="form.age.$error.required && form.age.$touched">Le champs est obligatoire</span>
                <span  class="text-warning" ng-show="form.age.$error.pattern && form.age.$touched">Le champs est invalide</span>
              </div>
            </div>

            <div class="form-group" id="formImage" ng-class="{'has-success': isInputValid(form.image),'has-error': isInputInvalid(form.image)}">
              <label for="image" class="col-sm-2 control-label">Image:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" required pattern="^https?:\/\/(www\.)?.+\.(jpg|png|jpeg|bmp|gif)$" id="image" placeholder="image" name="image" value="{{$auteur->image}}">
                <span class="text-danger" ng-show="form.image.$error.required && form.image.$touched">Le champs est obligatoire</span>
                <span  class="text-warning" ng-show="form.image.$error.pattern && form.image.$touched">Le champs est invalide</span>
              </div>
            </div>
            <div class="form-group" id="formVille" ng-class="{'has-success': isInputValid(form.ville),'has-error': isInputInvalid(form.ville)}">
              <label for="ville" class="col-sm-2 control-label">Ville:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="ville" required pattern="^[A-Za-z]{3,}$" placeholder="Ville" name="ville" value="{{$auteur->ville}}">
                <span class="text-danger" ng-show="form.ville.$error.required && form.ville.$touched">Le champs est obligatoire</span>
                <span  class="text-warning" ng-show="form.ville.$error.pattern && form.ville.$touched">Le champs est invalide</span>
              </div>
            </div>
            <div class="form-group" id="formSexe">
              <div class="col-sm-2"></div>
              <div class="radio col-sm-10">
                <label>
                  <input type="radio" name="sexe" id="optionsRadios1"  value="homme" checked>
                  Homme
                </label>
                <label>
                  <input type="radio" name="sexe" id="optionsRadios2"value="femme">
                  Femme
                </label>
              </div>
            </div>
            <div class="form-group" id="formLiteraire" ng-class="{'has-success': isInputValid(form.courant_literaire),'has-error': isInputInvalid(form.courant_literaire)}">
              <label for="courant_literaire" class="col-sm-2 control-label">Courant Litéraire:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="courant_literaire" required pattern="^[A-Za-z]{3,30}$" placeholder="Courant Literaire" name="courant_literaire" value="{{$auteur->courant_literaire}}">
                <span class="text-danger" ng-show="form.courant_literaire.$error.required && form.courant_literaire.$touched">Le champs est obligatoire</span>
                <span  class="text-warning" ng-show="form.courant_literaire.$error.pattern && form.courant_literaire.$touched">Le champs est invalide</span>
              </div>
            </div>
            <div class="form-group" id="formNaissance" ng-class="{'has-success': isInputValid(form.date_naissance),'has-error': isInputInvalid(form.date_naissance)}">
              <label for="date_naissance" class="col-sm-2 control-label">Date De Naissance:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control date" id="date_naissance" required pattern="^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="dd/mm/aaaa" name="date_naissance" value="{{$datebirth}}">
                <span class="text-danger" ng-show="form.date_naissance.$error.required && form.date_naissance.$touched">Le champs est obligatoire</span>
                <span  class="text-warning" ng-show="form.date_naissance.$error.pattern && form.date_naissance.$touched">Le champs est invalide</span>
              </div>
            </div>
            <div class="form-group" id="formMort" ng-class="{'has-success': isInputValid(form.date_mort),'has-error': isInputInvalid(form.date_mort)}">
              <label for="date_mort" class="col-sm-2 control-label">Date de mort:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control date" id="date_mort" required pattern="^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="dd/mm/aaaa" name="date_mort" value="{{$datedead}}">
                <span class="text-danger" ng-show="form.date_mort.$error.required && form.date_mort.$touched">Le champs est obligatoire</span>
                <span  class="text-warning" ng-show="form.date_mort.$error.pattern && form.date_mort.$touched">Le champs est invalide</span>
              </div>
            </div>
            <div class="form-group" id="formBiographie" ng-class="{'has-success': isInputValid(form.biographie),'has-error': isInputInvalid(form.biographie)}">
              <label for="biographie" class="col-sm-2 control-label">Biographie:</label>
              <div class="col-sm-offset-2">
                <textarea class="form-control" rows="3" name="biographie" required ng-minlength="10" ng-maxlength="550" id="biographie" ></textarea>
                <span class="text-danger" ng-show="form.biographie.$error.required && form.biographie.$touched">Le champs est obligatoire</span>
                <span  class="text-warning" ng-show="form.biographie.$error.minlength && form.biographie.$touched">Vous n'avez pas inseré assez de mot</span>
                <span  class="text-warning" ng-show="form.biographie.$error.maxlength && form.biographie.$touched">Vous avez inseré trop de mot</span>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg active col-sm-offset-2" id="send">Envoyer</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
