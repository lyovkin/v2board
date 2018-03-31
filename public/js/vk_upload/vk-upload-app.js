'use strict';

var app = angular.module('vk-upload-app', ['ngFlash']);

app.config(function($interpolateProvider, $locationProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    });
});


app.controller('vkUploadCtrl', function($scope, $http, $location, Flash, $timeout) {

    // Flash message
    $scope.successAlert = function () {
        var message = '<strong> Загрузка товаров завершена!</strong>';
        var id = Flash.create('success', message, 0, {class: 'custom-class', id: 'custom-id'}, true);
    };

    var url_vk = 'https://api.vk.com';
    var version = 5.73;
    // var url = $location.absUrl(), access_token = url.match(/\#(?:access_token)\=([\S\s]*?)\&/)[1];
    // var u_id = $location.absUrl(), user_id = u_id.match(/user_id=([^&]+)/)[1];

    var user_id = 12965861;
    var access_token = '4893043e9cb09c98e0c6b4cd617a06f762f237694f98b3a63ae4212e8b4d5b3ca5be26e4de1779d817cf1';

    $scope.selectedGroup = '';
    $scope.selectedGroupAlbum = '';

    $scope.selectedAlbum = '';

    $scope.selectedCategory = '';

    $scope.photos_albums = '';

    /**
     * Get user shops
     */
    $http.get('/get_user_shops')
        .then(function (response) {
           $scope.shop = response.data;
        });

    /**
     * Get shops categories
     */
    $http.get('/get_user_categories')
        .then(function (response) {
            $scope.shops_categories = response.data;
        });

    /**
     * Get information about user
     */
    $http.jsonp(url_vk+'/method/users.get?users_ids='+user_id+'&fields=photo_50,city'+'&access_token='+access_token+'&v='+version+'&callback=JSON_CALLBACK')
        .then(function (response){
            var data = response.data;
            $scope.user = data.response;
        });

    /**
     * Get user groups, where user role admin
     */
    $http.jsonp(url_vk+'/method/groups.get?user_id='+user_id+'&extended=1&filter=admin&access_token='+access_token+'&v='+version+'&callback=JSON_CALLBACK')
        .then(function (response) {
            var data = response.data;
            $scope.user_groups = data.response.items;
        });

    /**
     * Get albums in group, where user role admin
     * If group was choice, run request
     */
    $scope.$watch('selectedGroup', function () {
        if($scope.selectedGroup == undefined) {
            $scope.selectedGroup = '';
        }
            $http.jsonp(url_vk+'/method/photos.getAlbums?owner_id=-'+$scope.selectedGroup+'&access_token='+access_token+'&v='+version+'&callback=JSON_CALLBACK')
            .then(function (response) {
                var data = response.data;
                $scope.group_albums = data.response;
            });
    });

    /**
     * Get photos in album, in group where user role is admin
     * If album was choice, run request
     */
    $scope.$watch('selectedGroupAlbum', function (){
        if($scope.selectedGroupAlbum == undefined) {
            $scope.selectedGroupAlbum = '';
        }
        if($scope.selectedGroupAlbum != '') {
            var selectedAlbum = JSON.parse($scope.selectedGroupAlbum);
            var albumId = selectedAlbum.id;
            $http.jsonp(url_vk+'/method/photos.get?owner_id='+selectedAlbum.owner_id+'&album_id='+albumId+'&access_token='+access_token+'&v='+version+'&callback=JSON_CALLBACK')
                .then(function (response) {
                    var data = response.data;
                    $scope.photos_albums = data.response;
                    console.log($scope.photos_albums);
                });
        }

    });

    /**
     * Get user albums, in him page
     */
    $http.jsonp(url_vk+'/method/photos.getAlbums?owner_id='+user_id+'&access_token='+access_token+'&v='+version+'&callback=JSON_CALLBACK')
        .then(function (response) {
            var data = response.data;
            $scope.albums = data.response.items;
        });

    /**
     * If selected user album and user shop, run request to backend, and store data in session
     */
    $scope.$watch('selectedAlbum', function () {
        if($scope.selectedAlbum == undefined) {
            $scope.selectedAlbum = '';
        }
        if($scope.selectedAlbum != null) {
            console.log($scope.selectedAlbum);
            $http.post('/upload_vk_items', {'album_id': $scope.selectedAlbum, 'shop_id': $scope.shop,
                'user_id': user_id, 'access_token': access_token})
                .then(function () {

                });
            /**
             * Get photos from user album in him page
             */
            $http.jsonp(url_vk+'/method/photos.get?owner_id='+user_id+'&album_id='+$scope.selectedAlbum+'&access_token='+access_token+'&v='+version+'&callback=JSON_CALLBACK')
                .then(function (response) {
                    var data = response.data;
                    $scope.photos_albums = data.response;
                })
        }
    });

    /**
     * Function sent data to backend and store in DB
     * Show flash message 6 sec.
     */
    $scope.upload_photos = function() {
        $http.jsonp(url_vk+'/method/photos.get?owner_id='+user_id+'&album_id='+$scope.selectedAlbum+'&access_token='+access_token+'&v='+version+'&callback=JSON_CALLBACK')
            .then(function (response) {
                var photos = response.data;
                $http.post('/uploading_data', {'photos': photos, 'shop_id': $scope.shop, 'category_id': $scope.selectedCategory})
                    .then(function () {
                        $timeout( function() {
                            Flash.clear();
                        }, 6000);
                    });
            });
    };

    /**
     * Function sent data to backend and store in DB
     * Show flash message 6 sec.
     */
    $scope.upload_photos_group = function() {
        var selectedAlbum = JSON.parse($scope.selectedGroupAlbum);
        $http.jsonp(url_vk+'/method/photos.get?owner_id='+selectedAlbum.owner_id+'&album_id='+selectedAlbum.id+'&access_token='+access_token+'&v='+version+'&callback=JSON_CALLBACK')
            .then(function (response) {
                var photos = response.data;
                $http.post('/uploading_data', {'photos': photos, 'shop_id': $scope.shop, 'category_id': $scope.selectedCategory})
                    .then(function () {
                        $timeout( function() {
                            Flash.clear();
                        }, 6000);
                    });
            });
    }

});

