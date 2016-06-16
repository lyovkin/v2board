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
    var user_id = $location.search().user_id;
    var access_token = $location.search().access_token;

    console.log(user_id);
    console.log(access_token);
    //var user_id = 12965861;
    //var access_token = '08de01813a19a13981a242afe061977a76239e52db257d2d204e9137770268fc537ac8870e6e425ae905732ac2874';

    $scope.selectedAlbum = '';

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
    $scope.$watch('selectedAlbum', function () {
        if($scope.selectedAlbum != null) {
            $http.post('/upload_vk_items', {'album_id': $scope.selectedAlbum, 'user_id': user_id, 'access_token': access_token})
                .then(function () {
                    console.log('Done');
                });
        }
    });

});