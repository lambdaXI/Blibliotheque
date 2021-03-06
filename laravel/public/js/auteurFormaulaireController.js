/*
auteurFormulaireController gere la mise en forme du formulaire d ajout d auteur (couleur de validation rouge et vert)
vidage des champs du formulaire et modal en cas de validation
*/
app.controller('auteurFormulaireController', function auteurFormulaireController($scope, $http, $interval, $window) {

    $scope.auteur = {};// les champs du formulaire


    //verif de l etat du bouton envoyer du formulaire-----------------------
    $interval(function(){
      if($('div.form-group.has-success').length == 9){//si tt les div form group ont success
        $('button#send').prop('disabled',false); //alors la propriete disable devient false
      }else {//dans le cas contraire disabled est a true
        $('button#send').prop('disabled',true);
      }
    }, 1000);
    //-------------------------------------------------------------------



    //DEBUT function pr verif l etat de validation du formulaire-------------------
    $scope.isInputValid = function(input){
      return input.$valid;//return les conditions de l'input d'angular sont valid (pattern,required...)
    }

    $scope.isInputInvalid = function(input){
      return input.$invalid;//return les conditions de l'input d'angular sont invalid (pattern,required...)
    }
    //FIN function pr verif l etat de validation du formulaire--------------------



    $scope.addAuteur = function(){
            // $http post me permet de faire une REQUETE en POST
            $http.post('/backoffice/add-auteur/', // equivalent a un $post mais en javascript
                {
                  'nom': $scope.auteur.nom,
                  'prenom': $scope.auteur.prenom,
                  'age': $scope.auteur.age,
                  'image': $scope.auteur.image,
                  'ville': $scope.auteur.ville,
                  'sexe': $scope.auteur.sexe,
                  'courant_literaire': $scope.auteur.courant_literaire,
                  'date_naissance': $scope.auteur.date_naissance,
                  'date_mort': $scope.auteur.date_mort,
                  'biographie': $scope.auteur.biographie,
                })
                .then(function(response) { // si lajax a bien envoyer le formulaire
                  $scope.auteur = {};//vidage des champs
                  $('#myModal').modal('show'); // ouvre modal avec message success
                  setTimeout(function(){ $('#myModal').modal('hide'); }, 1000); // ferme automatiquement le modal au bout de 1 sec
                });

      }




});
