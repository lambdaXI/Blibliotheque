app.config(function($routeProvider){
  $routeProvider
        .when('/',{
          controller: 'FrontController',
          templateUrl: '../js/views/livres.php'
        })

})
