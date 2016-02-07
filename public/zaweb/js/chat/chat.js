var chat = angular.module('chat', ['ngResource']);


/** Замена {{ }} на [[ ]] */
chat.config(function ($interpolateProvider,$locationProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    }); // enable pushState

});

