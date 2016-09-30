

app.controller('FrontController', function FrontController($scope, $http, $interval, $window) {

  //Gestion du pannier-------------------------
  var pannier = [];
  //verif de l'exitance de ma session pannier
  if (localStorage.getItem("pannier") !== null) {// si la session existe alors je recupere mon pannier
    pannier = JSON.parse(localStorage.getItem("pannier")); // traduire une chaine en tableau JS
  }else {//cas contraire je creer un tableau vide de mon pannier
    localStorage.setItem("pannier",JSON.stringify(pannier));  // JSON.stringify != JSON.parse
  }

  $scope.ajouterPannier = function(index){//function pr le boutton ajouter au pannier
    if (pannier[index] !== undefined) {
      pannier[index] += 1;// je l' incremente de 1
    }else { // si elle est undefined alors je la set a 1
      pannier[index] = 1;
    }
  }

  $scope.supprimerPannier = function(index){//function pr le boutton supprimer du pannier
    if (pannier[index] !== undefined && pannier[index] > 1) { // si la valeur de la key index d pannier exisste et est superieur a 1 alors...
      pannier[index]--; // je la decremente de 1
    }else if (pannier[index] == 1) { // si elle est equale a 1 alors je l unset du tableau
      pannier.splice(index);
    }
  }
  //--------------------------------

});
