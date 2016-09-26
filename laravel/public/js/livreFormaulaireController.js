
app.controller('livreFormulaireController', function livreFormulaireController(
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


$scope.select = [];

$interval(function(){
  $http.get('/auteur-data')
    .then(function(response) {
        if(areDifferentByIds($scope.select,response.data)){
          $scope.select = response.data;  //recup des données des auteurs
          console.log($scope.select);
        }
        //response.data sont les données renvoyées du serveur
  });
}, 1000);




});
