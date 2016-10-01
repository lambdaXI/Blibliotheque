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
          <button type="button" name="button" class="btn btn-success" ng-click="ajouterpanier(livreDetail.id)">+</button> <button type="button" name="button" class="btn btn-danger" ng-click="supprimerpanier(livreDetail.id)">-</button><br>
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
  <!-- pannel panier -->
  <div class="panel panel-default">
    <div class="panel-heading">Votre Panier</div>
    <div class="panel-body">
      <p ng-repeat="article in panier">
        l'article n°#{article[0]}# est #{article[1]}# fois dans votre panier
      </p>
      <button type="button" name="button" class="btn btn-primary" ng-click="" ng-show="panier.length > 0">Payer</button>
      <button type="button" name="button" class="btn btn-primary" ng-click="videPanier()" ng-show="panier.length > 0">Vider le panier</button>
      <span ng-show="panier.length == 0">Vous n'avez aucun article dans votre panier</span>
    </div>
  </div>
  <!-- fin pannel panier -->
  <div class="col-sm-6 col-md-4 col-lg-4" ng-repeat="livre in livres">
    <div class="thumbnail">
      <img src="#{livre.image}#" alt="cover livre" width="150" height="150">
      <div class="caption">
        <h3>#{livre.titre}#</h3>
        <p>prix: #{livre.prix.toFixed(2)}#€</p>
        <a class="btn btn-primary" role="button" ng-click="voir(livre)">voir (incremente la vue)</a><br>
         <button type="button" name="button" class="btn btn-success" ng-click="ajouterpanier(livre.id)">+</button> <button type="button" name="button" class="btn btn-danger" ng-click="supprimerpanier(livre.id)">-</button> <br>
         <button type="button" name="button" ng-click="liker(livre.id)" ng-hide="likes[livre.id]"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
         <button type="button" name="button" ng-click="liker(livre.id)" ng-show="likes[livre.id]"><i class="fa fa-heart" aria-hidden="true"></i></button><br>

      </div>
    </div>
  </div>
</div>
