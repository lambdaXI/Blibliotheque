@extends('layoutBack')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Ajouter Livre</div>
        <div class="panel-body" ng-controller="livreFormulaireController">

          <!-- Small modal -->
          <div  id="myModal"class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Message</h4>
                </div>
                <div class="modal-body">
                  Livre bien Ajouter!
                </div>
              </div>
            </div>
          </div>
          {{-- fin modal --}}

          <form class="form-horizontal" name="form" ng-submit="addLivre()">
            {{ csrf_field() }}
            <div class="form-group" ng-class="{'has-success': isInputValid(form.titre),'has-error': isInputInvalid(form.titre)}">
              <label for="titre" class="col-sm-2 control-label">titre:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="titre" required pattern="^[\w\d]{3,}([\s\-]+[\w\d]+)*$" placeholder="titre" name="titre" ng-model="livre.titre">
              </div>
            </div>
            <div class="form-group" ng-class="{'has-success': isInputValid(form.prix),'has-error': isInputInvalid(form.prix)}">
              <label for="prix" class="col-sm-2 control-label">prix:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control money" required pattern="^[0-9]{1,2}(\.[0-9]+)?$" id="prix" placeholder="XX.XX" name="prix" ng-model="livre.prix">
              </div>
            </div>
            <div class="form-group"  ng-class="{'has-success': isInputValid(form.numero_isbn),'has-error': isInputInvalid(form.numero_isbn)}">
              <label for="numero_isbn" class="col-sm-2 control-label">Numero ISBN:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control isbn" id="numero_isbn" required pattern="^[0-9]{9,}$" placeholder="Numero ISBN" name="numero_isbn" ng-model="livre.numero_isbn">
              </div>
            </div>
            <div class="form-group" ng-class="{'has-success': isInputValid(form.image),'has-error': isInputInvalid(form.image)}">
              <label for="image" class="col-sm-2 control-label">Image:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="image" required pattern="^https?:\/\/(www\.)?.+\.(jpg|png|jpeg|bmp|gif)$" placeholder="image" name="image" ng-model="livre.image">
              </div>
            </div>
            <div class="form-group" ng-class="{'has-success': isInputValid(form.numero_ean),'has-error': isInputInvalid(form.numero_ean)}">
              <label for="numero_ean" class="col-sm-2 control-label">Numero EAN:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control ean" id="numero_ean" required ng-minlength="14" placeholder="Numero EAN" name="numero_ean" ng-model="livre.numero_ean">
              </div>
            </div>
            <div class="form-group" ng-class="{'has-success': isInputValid(form.id_auteur),'has-error': isInputInvalid(form.id_auteur)}">
              <label for="id_auteur" class="col-sm-2 control-label">Auteur:</label>
              <div class="col-sm-10">
                <select class="form-control" name="id_auteur" id="id_auteur" required name="id_auteur" ng-model="livre.id_auteur">
                  <option selected value="" disabled>Choisissez votre auteur</option>
                  <option ng-repeat="auteur in select" value="#{auteur.id}#">#{auteur.nom}# #{auteur.prenom}#</option>
                  <option disabled ng-if="select.length == 0" style="color:red">Pas d'auteur inscrit dans la DataBase</option>
                </select>
              </div>
            </div>
            <div class="form-group" ng-class="{'has-success': isInputValid(form.maison_edition),'has-error': isInputInvalid(form.maison_edition)}">
              <label for="maison_edition" class="col-sm-2 control-label">Maison edition:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="maison_edition" required ng-minlength="3" placeholder="Maison edition" name="maison_edition" ng-model="livre.maison_edition">
              </div>
            </div>
            <div class="form-group" ng-class="{'has-success': isInputValid(form.date_parution),'has-error': isInputInvalid(form.date_parution)}">
              <label for="date_parution" class="col-sm-2 control-label">Date de parution:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control date" id="date_parution" required pattern="^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Date de parution" name="date_parution" ng-model="livre.date_parution">
              </div>
            </div>
            <div class="form-group" ng-class="{'has-success': isInputValid(form.magasin),'has-error': isInputInvalid(form.magasin)}">
              <label for="magasin" class="col-sm-2 control-label">Magasin:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="magasin" required ng-minlength="3" placeholder="Magasin" name="magasin" ng-model="livre.magasin">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="version_numerique" name="version_numerique" ng-model="livre.version_numerique"> Version numerique
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
