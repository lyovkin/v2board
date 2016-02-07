angular.module('shop', ['ngCart', 'ngResource']);


/** Замена {{ }} на [[ ]] */
angular.module('shop').config(function ($interpolateProvider,$locationProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    }); // enable pushState

});

