
app.controller('DashboardController', function DashboardController(
  $scope, $http, $interval, $window) {

    var colorfull = ["#30a5ff","#ffb53e","#1ebfae","#f9243f"];// plage de couleur qui sera definie aleatoirement

//Donut Auteur/Manga Stat--------------------------------
  var parseint;
  var doughnutData;
    $http.get('/auteurtotal-data/')
        .then(function(response) {//recup data auteur
           parseint =response.data;
           parseint = parseInt(parseint);
            //response.data sont les données renvoyées du serveur

    $http.get('/livretotal-data/')
        .then(function(response2) { //recup data livre

          parseint2 =response2.data;
          parseint2 = parseInt(parseint2); //cast en integer

    	doughnutData = [ //data du doughnut pr former le graphisme
    					{
    						value: parseint,
    						color:colorfull[getRandomIntInclusive(0,3)], //couleur au hazard
    						highlight: "#62b9fb",
    						label: "Auteurs"
    					},
    					{
    						value: parseint2,
    						color: colorfull[getRandomIntInclusive(0,3)],//couleur au hazard
    						highlight: "#fac878",
    						label: "Livres"
    					},


    				];

            //permet de tracer le graphisme du doughnut
            var chart3 = document.getElementById("doughnut-chart").getContext("2d");
          	window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {responsive : true	});



});
});
//-----------------------------------------------------------

//piechartjs COURANT LITERAIRE Stat-----------------------------------------------------------

// On renvoie un entier aléatoire entre une valeur min (incluse)
// et une valeur max (incluse).
// Attention : si on utilisait Math.round(), on aurait une distribution
// non uniforme !
function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min +1)) + min;
}
$http.get('/auteurGroupLiteraire-data')//la route recup le nombre total d auteur (alias value) et grouper par courant literaire(alias label)
    .then(function(response6) { //recup data livre
      $scope.database = response6.data;
      /*
      response6.data renvoie en exemple json
      [
      {value: 5, label: courant literaire},
      {value: 6, label: romantisme},
      {value: 3, label: classicisme},
    ]
    il manque juste la couleur pr tracer le graph correctement

      */




      var pieData = []; // corespond aux donnees du graphisme qui sera dessiner
      for (var i = 0; i < $scope.database.length; i++) {
        $scope.database[i].color = colorfull[getRandomIntInclusive(0,3)]; // couleur au hazard
        pieData.push($scope.database[i]); // push dans le talbeau
      }


      //trace le graphisme
    var chart4 = document.getElementById("pie-chart").getContext("2d");
  	window.myPie = new Chart(chart4).Pie(pieData, {responsive : true});
});
//-----------------------------------------------------------

//RANDOM LIVRE & AUTEUR------------------------------------

$scope.randomLivre={};
$scope.randomAuteur={};
//livre random
$http.get('/livrerandom-data')//recup livre au hazard
    .then(function(response3) {
      $scope.randomLivre = response3.data;

      $http.get('/auteurid-data/'+ parseInt($scope.randomLivre.id_auteur)) // recup l auteur du livre
          .then(function(response4) {
            $scope.randomAuteur = response4.data;
      });
});


//LIVRE GROUP BY YEAR--------------------------
$scope.LivreByYear = [];
$http.get('/livreGroupYear-data')//recup les livres classer par annees
    .then(function(response7) {
      $scope.LivreByYear = response7.data;
});


});
