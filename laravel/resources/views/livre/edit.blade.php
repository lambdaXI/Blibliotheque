@extends('layoutBack')


@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Edit Les informations</div>
        <div class="panel-body" ng-controller="livreEditController">
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form class="form-horizontal" name="form" action="{{route('EditLivre', ['id' => $livre->id])}}">
            {{ csrf_field() }}
            <div class="form-group" ng-class="{'has-success': isInputValid(form.titre),'has-error': isInputInvalid(form.titre)}">
              <label for="titre" class="col-sm-2 control-label">titre:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="titre" value="{{$livre->titre}}" required pattern="^[\w\d]{3,}([\s\-]+[\w\d]+)*$" placeholder="titre" name="titre" >
              </div>
            </div>
            <div class="form-group" ng-class="{'has-success': isInputValid(form.prix),'has-error': isInputInvalid(form.prix)}">
              <label for="prix" class="col-sm-2 control-label">prix:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control money" required pattern="^[0-9]{1,2}(\.[0-9]+)?$" id="prix" placeholder="XX.XX" name="prix" value="{{number_format($livre->prix,2)}}">
              </div>
            </div>
            <div class="form-group"  ng-class="{'has-success': isInputValid(form.numero_isbn),'has-error': isInputInvalid(form.numero_isbn)}">
              <label for="numero_isbn" class="col-sm-2 control-label">Numero ISBN:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control isbn" id="numero_isbn" required pattern="^[0-9]{9,}$" placeholder="Numero ISBN" name="numero_isbn" value="{{$livre->numero_isbn}}">
              </div>
            </div>
            <div class="form-group" ng-class="{'has-success': isInputValid(form.image),'has-error': isInputInvalid(form.image)}">
              <label for="image" class="col-sm-2 control-label">Image:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="image" required pattern="^https?:\/\/(www\.)?.+\.(jpg|png|jpeg|bmp|gif)$" placeholder="image" name="image" value="{{$livre->image}}">
              </div>
            </div>
            <div class="form-group" ng-class="{'has-success': isInputValid(form.numero_ean),'has-error': isInputInvalid(form.numero_ean)}">
              <label for="numero_ean" class="col-sm-2 control-label">Numero EAN:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control ean" id="numero_ean" required ng-minlength="14" placeholder="Numero EAN" name="numero_ean" value="{{$livre->numero_ean}}">
              </div>
            </div>
            <div class="form-group" ng-class="{'has-success': isInputValid(form.id_auteur),'has-error': isInputInvalid(form.id_auteur)}">
              <label for="id_auteur" class="col-sm-2 control-label">Auteur:</label>
              <div class="col-sm-10">
                <select class="form-control" name="id_auteur" id="id_auteur" required name="id_auteur" value="{{$livre->id_auteur}}">
                  <option ng-repeat="auteur in select" value="#{auteur.id}#" ng-selected="{{$livre->id_auteur}} == #{auteur.id}#">#{auteur.nom}# #{auteur.prenom}#</option>
                  <option disabled ng-if="select.length == 0" style="color:red">Pas d'auteur inscrit dans la DataBase</option>
                </select>
              </div>
            </div>
            <div class="form-group" ng-class="{'has-success': isInputValid(form.maison_edition),'has-error': isInputInvalid(form.maison_edition)}">
              <label for="maison_edition" class="col-sm-2 control-label">Maison edition:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="maison_edition" required ng-minlength="3" placeholder="Maison edition" name="maison_edition" value="{{$livre->maison_edition}}">
              </div>
            </div>
            <div class="form-group" ng-class="{'has-success': isInputValid(form.date_parution),'has-error': isInputInvalid(form.date_parution)}">
              <label for="date_parution" class="col-sm-2 control-label">Date de parution:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control date" id="date_parution" required pattern="^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Date de parution" name="date_parution" value="{{$dateParution}}">
              </div>
            </div>
            <div class="form-group" ng-class="{'has-success': isInputValid(form.magasin),'has-error': isInputInvalid(form.magasin)}">
              <label for="magasin" class="col-sm-2 control-label">Magasin:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="magasin" required ng-minlength="3" placeholder="Magasin" name="magasin" value="{{$livre->magasin}}">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    @if ($livre->version_numerique === 1)
                      <input type="checkbox" name="version_numerique" checked> Version numerique
                    @else
                      <input type="checkbox" name="version_numerique"> Version numerique
                    @endif

                  </label>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg active col-sm-offset-2">Envoyer</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
