
app.controller('livreFormulaireController', function livreFormulaireController(
  $scope, $http, $interval, $window) {

    $scope.livre = {};//scope correspond au champs formulaire livre

    //DEBUT function pr verif l etat de validation du formulaire-------------------
    $scope.isInputValid = function(input){
      return input.$valid;//return les conditions de l'input d'angular sont valid (pattern,required...)
    }

    $scope.isInputInvalid = function(input){
      return input.$invalid;//return les conditions de l'input d'angular sont invalid (pattern,required...)
    }
    //FIN function pr verif l etat de validation du formulaire--------------------

/*
* Différence entre 2 tableaux d'objets par leur IDs
* Passer de 90° à 45° sur le CPU
*/
function areDifferentByIds(a, b) {
    var idsA = a.map( function(x){ return x.id; } ).sort();
    var idsB = b.map( function(x){ return x.id; } ).sort();
    return (idsA.join(',') !== idsB.join(',') );
}


$scope.select = [];// Correspond au tableau de recup des mes auteurs

//Pour completer automatiquement le champs select par les nom des auteur inscrit dans la DB------------------------------
$interval(function(){ //dynamiquement on rafraichi la liste des auteurs avec un interval
  $http.get('/auteur-data')
    .then(function(response) {
        if(areDifferentByIds($scope.select,response.data)){
          $scope.select = response.data;  //recup des données des auteurs
        }
        //response.data sont les données renvoyées du serveur
  });
}, 1000);
//-----------------------------------------------------------------------------------------------------------------------

$scope.idlivre= 0;
$scope.editLivre = function(index){
  $scope.idlivre = index;
}

$scope.addLivre = function(){// Envoi du formulaire Livre
  console.log($scope.livre);
        // $http post me permet de faire une REQUETE en POST
        $http.post('/backoffice/add-livre/', // equivalent a un $post mais en javascript
            {
              'titre': $scope.livre.titre,
              'prix': $scope.livre.prix,
              'numero_isbn': $scope.livre.numero_isbn,
              'image': $scope.livre.image,
              'numero_ean': $scope.livre.numero_ean,
              'id_auteur': $scope.livre.id_auteur,
              'maison_edition': $scope.livre.maison_edition,
              'date_parution': $scope.livre.date_parution,
              'magasin': $scope.livre.magasin,
              'version_numerique': $scope.livre.version_numerique,
            })
            .then(function(response) {// si l ajax a bien envoyer le formulaire
                $scope.livre = {};//vidage des champs
                $('#myModal').modal('show'); // ouvre modal avec message success
                setTimeout(function(){ $('#myModal').modal('hide'); }, 1000); // ferme automatiquement le modal au bout de 1 sec


            });

  }

});
