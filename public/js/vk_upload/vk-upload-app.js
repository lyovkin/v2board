/**
 * Created by anatoliy on 15.06.16.
 */
'use strict';

var app = angular.module('vk-upload-app', []);

app.config(function($interpolateProvider, $locationProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    });
});

app.controller('vkUploadCtrl', function($scope, $http, $location) {

    var url_vk = 'https://api.vk.com';
    var url = $location.absUrl(), access_token = url.match(/\#(?:access_token)\=([\S\s]*?)\&/)[1];
    var u_id = $location.absUrl(), user_id = u_id.match(/user_id=([^&]+)/)[1];

    //var user_id = 12965861;
    //var access_token = '08de01813a19a13981a242afe061977a76239e52db257d2d204e9137770268fc537ac8870e6e425ae905732ac2874';

    $scope.selectedAlbum = '';
    $scope.selectedShop = '';

    $http.get('/get_user_shops')
        .then(function (response) {
           $scope.shops = response.data;
           //console.log($scope.shops);
        });

    // Get user info
    $http.jsonp(url_vk+'/method/users.get?users_ids='+user_id+'&fields=photo_50,city'+'&access_token='+access_token+'&callback=JSON_CALLBACK')
        .then(function (response){
            var data = response.data;
            $scope.user = data.response;
            //console.log($scope.user);
        });

    // Get photo albums
    $http.jsonp(url_vk+'/method/photos.getAlbums?owner_id='+user_id+'&access_token='+access_token+'&callback=JSON_CALLBACK')
        .then(function (response) {
            var data = response.data;
            $scope.albums = data.response;
            //console.log($scope.albums);
        });

    // Set value (album ID) in session
    $scope.$watchGroup(['selectedAlbum', 'selectedShop'], function () {
        if($scope.selectedAlbum != null) {
            $http.post('/upload_vk_items', {'album_id': $scope.selectedAlbum, 'shop_id': $scope.selectedShop,
                'user_id': user_id, 'access_token': access_token})
                .then(function () {
                    console.log('Done');
                });
        }
    });

    $scope.upload_photos = function() {
        $http.jsonp(url_vk+'/method/photos.get?owner_id='+user_id+'&album_id='+$scope.selectedAlbum+'&access_token='+access_token+'&callback=JSON_CALLBACK')
            .then(function (response) {
                var photos = response.data;
                $http.post('/uploading_data', {'photos': photos, 'shop_id': $scope.selectedShop})
                    .then(function () {
                        console.log('Done');
                    });
                //console.log(photos.response);
            })

    }

});