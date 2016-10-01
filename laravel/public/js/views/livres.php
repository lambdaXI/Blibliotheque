<div class="row">
  <!-- modal -->
  <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="myModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="gridSystemModalLabel">#{livreDetail.titre}#</h4>
        </div>
        <div class="modal-body">
          <img src="#{livreDetail.image}#" alt="" width="250" /><br>
          Prix: #{livreDetail.prix.toFixed(2)}#<br>
          numero ISBN: #{livreDetail.numero_isbn}#<br>
          numero EAN: #{livreDetail.numero_ean}#<br>
          date de parution: #{livreDetail.date_parution}#<br>
          nomber de vue: #{livreDetail.nombre_vue}#<br>
          <button type="button" name="button" class="btn btn-success" ng-click="ajouterpanier(livreDetail.id)">+<i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
          <button type="button" name="button" class="btn btn-danger" ng-click="supprimerpanier(livreDetail.id)">-<i class="fa fa-shopping-cart" aria-hidden="true"></i></button><br>
          <button type="button" name="button" ng-click="liker(livreDetail.id)" ng-hide="likes[livreDetail.id]"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
          <button type="button" name="button" ng-click="liker(livreDetail.id)" ng-show="likes[livreDetail.id]"><i class="fa fa-heart" aria-hidden="true"></i></button><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- fin modal  -->
  <!-- debut catalogue -->
  <!--*** formulaire de recherche ****** -->
  <div class="row">
    <div class="col-lg-4">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Titre..." ng-model="queryLivre">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">Go!</button>
        </span>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="input-group">
        <label for="repeatSelect"> Par Editeur: </label>
        <select name="repeatSelect" id="repeatSelect" ng-model="queryEditeur">
          <option value="">Tous Afficher</option>
          <option ng-repeat="editeur in editeurs" value="#{editeur.maison_edition}#">#{editeur.maison_edition}#</option>
        </select>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-4" ng-repeat="livre in livres | filter: {titre: queryLivre, maison_edition: queryEditeur}">
    <div class="thumbnail">
      <img src="#{livre.image}#" alt="cover livre" width="250" height="250">
      <div class="caption">
        <h3>#{livre.titre}#</h3>
        <p>prix: #{livre.prix.toFixed(2)}#€</p>
        <a class="btn btn-primary" role="button" ng-click="voir(livre)">voir (incremente la vue)</a><br>
         <button type="button" name="button" class="btn btn-success" ng-click="ajouterpanier(livre.id)">+<i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
         <button type="button" name="button" class="btn btn-danger" ng-click="supprimerpanier(livre.id)">-<i class="fa fa-shopping-cart" aria-hidden="true"></i></button> <br>
         <button type="button" name="button" ng-click="liker(livre.id)" ng-hide="likes[livre.id]"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
         <button type="button" name="button" ng-click="liker(livre.id)" ng-show="likes[livre.id]"><i class="fa fa-heart" aria-hidden="true"></i></button><br>

      </div>
    </div>
  </div>
  <!-- fin catalogue -->
</div>
