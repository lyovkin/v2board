'use strict';

var app = angular.module('ng-flow-app', ['flow']);

app.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

app.controller('ngFlowCtrl', function($scope, $http, $attrs) {

    $scope.isUpl = false;

    $scope.uploading = function() {
        $http.post('/shops/get_photos', {'s_id': $attrs.shop})
            .then(function callback() {
                $scope.$flow.upload();
                $scope.isUpl = true;
            });
    };

});