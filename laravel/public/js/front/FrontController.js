
app.controller('FrontController', function FrontController($scope, $http, $interval, $window, $q) {

  /*
  * Différence entre 2 tableaux d'objets par leur IDs
  * Passer de 90° à 45° sur le CPU
  */
  function areDifferentByIds(a, b) {//function pr gagner juste de la performance
    var idsA = a.map( function(x){ return x.id; } ).sort();
    var idsB = b.map( function(x){ return x.id; } ).sort();
    return (idsA.join(',') !== idsB.join(',') );
  }

  $scope.Multiplication = function(a,b){//function pr calculer le prix et tronquer les decimal
    var resultat = a * b;
    return resultat.toFixed(2);
  }
  
  //recup données des livres--------------------
  $scope.livres = [];
  $http.get('/livre-data')
  .then(function(response) {
    if(areDifferentByIds($scope.livres, response.data)){
      $scope.livres = response.data; // recup dans une scope mes livres pr les retransmettre a ma vue
      for (livre of $scope.livres) { // en parcourant l'objet je formate les dates dans le bon format
        livre.date_parution = moment(livre.date_parution,"YYYY-MM-DD").format("DD/MM/YYYY");
      }
    }
  });
  //----------------------------
  //recup données des auteurs--------------------
  $scope.auteurs = [];
  $http.get('/auteur-data')
  .then(function(response) {
    if(areDifferentByIds($scope.auteurs, response.data)){
      $scope.auteurs = response.data; // recup dans une scope mes livres pr les retransmettre a ma vue
      for (auteur of $scope.auteurs) { // en parcourant l'objet je formate les dates dans le bon format
        auteur.date_naissance = moment(auteur.date_naissance,"YYYY-MM-DD HH:mm:ss").format("DD/MM/YYYY");
      }
    }
  });
  //----------------------------
  //recup données des editeurs--------------------
  $scope.editeurs = [];
  $http.get('/editeurdifferent')
  .then(function(response) {
    if(areDifferentByIds($scope.editeurs, response.data)){
      $scope.editeurs = response.data; // recup dans une scope les editeurs
    }
  });
  //-------------------------------------
  //button voir detail livre avec modal-------------------
  $scope.livreDetail = {};
  $scope.voir = function(livre){//pour voir en detail le livre (en paramettre je renvoi l'objet du livre en question)
  $scope.livreDetail = livre;// recup dans une scope mon objet livre
  //avec ajax get on permet grace qu controller php d incrementer la vue en BD et recuperer la valeur vue (ce qui ns fait gagner du temp au lieux de faire une requete ajax en interval)
    $http.get('/vue-plus/' + livre.id)// pour rajouter des vues a chaque fois qu un user regarde un livre
        .then(function(response) { // si lajax a bien envoyer le formulaire
          if(areDifferentByIds($scope.livreDetail.nombre_vue, response.data)){
              $scope.livreDetail.nombre_vue = response.data;//
          }
        });
    $('#myModal').modal('show');
  }

  //------------------------------------------------------
  //button voir detail auteur avec modal-------------------
  $scope.auteurDetail = {};
  $scope.voirAuteur = function(auteur){//pour voir en detail le livre (en paramettre je renvoi l'objet du livre en question)
    $scope.auteurDetail = auteur;// recup dans une scope mon objet livre
    $('#myModal').modal('show');
  }

  //------------------------------------------------------


  //PARTIE SESSION LIKE------------------------------------------------------------

  //function pr gagner juste de la performance pour la scope.likes, compare les variables de 2tableau et evite les reassigne inutile
  function areDifferentLike(a, b) {
    var idsA = [];
    for (var variable in a) {
      idsA.push(variable);
    }
    var idsB = [];
    for (var variable in b) {
      idsB.push(variable);
    }
    return (idsA.join(',') !== idsB.join(',') );
  }//************

  $scope.likes = [];
  $interval(function(){// chaque x secondes la function sera executer
  $http.get('/recup-like/')//recup la session like
      .then(function(response) {
        if(areDifferentLike($scope.likes, response.data)){
          $scope.likes = response.data; //assigne dans une scope
        }
      });
  }, 1000);

  $scope.liker = function(id){//Function du button like
    $http.post('/liker/' + id) //apelle a la route (/liker/id) pour changer la valeur du like
    .then(function(response) {
    });
  }
//--------------------------------------------------------------------------------------









//PARTIE GESTION DU PANIER-------------------------------------------------------------

/*
* Différence entre 2 tableaux et leur premier valeur (attention ne compare que la 1er valeur, suffisant pr le panier ici)
* Passer de 90° à 45° sur le CPU
*/
function areDifferentByPanier(a, b) { //function pr gagner un peu de perfomence
    var idsA = a.map( function(x){ return x[0]; } );
    var idsB = b.map( function(x){ return x[0]; } );
    return (idsA.join(',') !== idsB.join(',') );
}

//pour actualiser le panier d achat de l user*
$scope.panier = [];
$scope.prixtotal = 0;
$interval(function(){// chaque x secondes la function sera executer
  $http.get('/recup-panier') //recup les données du panier par la route
    .then(function(response) {
        if(areDifferentByPanier($scope.panier, response.data)){
          $scope.prixtotal = 0;// reset a 0 pr recalculer
          $scope.panier = response.data;  //recup des données du panier
          for (livre of $scope.panier) {
            $scope.prixtotal += livre[0] * livre[1]; // calcul total de ts les articles
          }
        }

        //response.data sont les données renvoyées du serveur
  });
}, 1000);


$scope.ajouterpanier = function(index){//function pr le boutton ajouter au panier
  $http.post('/panierplus/' + index, // equivalent a un $post mais en javascript
      {
        //on envoi rien
      })
      .then(function(response) { // si lajax a bien envoyer le formulaire

      });
}

$scope.supprimerpanier = function(index){//function pr le boutton supprimer du panier
  $http.post('/paniermoins/' + index, // equivalent a un $post mais en javascript
      {
        //on envoi rien
      })
      .then(function(response) { // si lajax a bien envoyer le formulaire

      });
}
$scope.videPanier = function(){//function pr le boutton supprimer du panier
  $http.post('/paniervide/', // equivalent a un $post mais en javascript
      {
        //on envoi rien
      })
      .then(function(response) { // si lajax a bien envoyer le formulaire

      });
}




//--------------------------------


});
