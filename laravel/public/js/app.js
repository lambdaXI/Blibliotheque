var app = angular.module('app', []); // une app initialisée

// configure l'affichage de nos données de la scope
app.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('#{').endSymbol('}#');
});
