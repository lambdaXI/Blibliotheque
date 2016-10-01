/*livreEditController sert juste a generer les données des auteur dans la balise select*/
app.controller('livreEditController', function livreFormulaireController(
  $scope, $http, $interval, $window) {




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
$interval(function(){
  $http.get('/auteur-data')
    .then(function(response) {
        if(areDifferentByIds($scope.select,response.data)){
          $scope.select = response.data;  //recup des données des auteurs
        }
        //response.data sont les données renvoyées du serveur
  });
}, 1000);
//-----------------------------------------------------------------------------------------------------------------------





});
