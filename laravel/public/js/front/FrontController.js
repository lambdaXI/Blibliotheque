
app.controller('FrontController', function FrontController($scope, $http, $interval, $window, $q) {



  //recup données des livres--------------------
  $scope.livres = [];
  $http.get('/livre-data')
  .then(function(response) {
    $scope.livres = response.data; // recup dans une scope mes livres pr les retransmettre a ma vue
  });
  //----------------------------
  //recup données des auteurs--------------------
  $scope.auteurs = [];
  $http.get('/auteur-data')
  .then(function(response) {
    $scope.auteurs = response.data; // recup dans une scope mes livres pr les retransmettre a ma vue
    for (auteur of $scope.auteurs) { // en parcourant l'objet je formate les dates dans le bon format
      auteur.date_naissance = moment(auteur.date_naissance,"YYYY-MM-DD HH:mm:ss").format("DD/MM/YYYY");
    }
  });
  //----------------------------

  //Partie session likes--------------------

  $scope.likes = [];
  $interval(function(){// chaque x secondes la function sera executer
  $http.get('/recup-like/')//recup la session like
      .then(function(response) {
        $scope.likes = response.data; //assigne dans une scope
      });
  }, 1000);

  $scope.liker = function(id){//Function du button like
    $http.post('/liker/' + id) //apelle a la route (/liker/id) pour changer la valeur du like
    .then(function(response) {
    });
  }
//----------------------------



//button voir detail livre avec modal-------------------
$scope.livreDetail = {};
$scope.voir = function(livre){//pour voir en detail le livre (en paramettre je renvoi l'objet du livre en question)
$scope.livreDetail = livre;// recup dans une scope mon objet livre
//avec ajax get on permet grace qu controller php d incrementer la vue en BD et recuperer la valeur vue (ce qui ns fait gagner du temp au lieux de faire une requete ajax en interval)
  $http.get('/vue-plus/' + livre.id, // pour rajouter des vues a chaque fois qu un user regarde un livre
      {
        //on envoi rien
      })
      .then(function(response) { // si lajax a bien envoyer le formulaire
        $scope.livreDetail.nombre_vue = response.data;//
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





//Gestion du panier-------------------------

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


//pour actualiser le panier d achat de l user*
$scope.panier = [];
$interval(function(){// chaque x secondes la function sera executer
  $http.get('/recup-panier') //recup les données du panier par la route
    .then(function(response) {
        if($scope.panier !== response.data){
          $scope.panier = response.data;  //recup des données du panier
        }
        //response.data sont les données renvoyées du serveur
  });
}, 1000);


//--------------------------------


});
