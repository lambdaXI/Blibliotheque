app.service('SessionLike', function($q, $http, $timeout){ // recup du service du tableau objet stardustXp

  this.getSessionLike = function(){
    $http.get('/recup-like').success(function(data, status){
      return data;
    }).error(function(data, status){
      var msg = "error service sessionlike";
      return msg;
    })
  }

});
