<div class="col-sm-2 col-md-2 col-lg-2">
  {{-- menu --}}
  <ul class="nav nav-stacked">
    <li role="presentation" class="active"><a href="#/">Home</a></li>
    <li role="presentation"><a href="#/auteur">Auteurs</a></li>
    <li role="presentation"><a href="{{route('main')}}">Dashboard</a></li>
  </ul>
{{-- fin menu --}}
<!-- pannel panier -->
<div class="panel panel-default">
  <div class="panel-heading"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Votre Panier</div>
  <div class="panel-body" ng-controller="FrontController">
    <p ng-repeat="article in panier">
      l'article n°#{article[0]}# est #{article[1]}# fois dans votre panier
    </p>
    <button type="button" name="button" class="btn btn-primary" ng-click="" ng-show="panier.length > 0"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Payer</button>
    <button type="button" name="button" class="btn btn-primary" ng-click="videPanier()" ng-show="panier.length > 0"><i class="fa fa-trash-o" aria-hidden="true"></i> Vider le panier</button>
    <span ng-show="panier.length == 0">Vous n'avez aucun article dans votre panier</span>
  </div>
</div>
<!-- fin pannel panier -->
</div>
