angular.module('shop').controller('CartCtrl',  function($scope, $http, ngCart) {



    /**
     *
     * @returns {*}
     */
    $scope.getUserData = function() {
        return $http.get('/cart/get_user').success(function(data) {
            $scope.user = data;
        })
    }

    /**
     * Instance of ngCart
     */
    $scope.cart = ngCart;

    /**
     * Item quantity
     *
     * @type {number}
     */
    $scope.quantity = 1;

    /**
     * Check whether there is an item in the basket
     *
     * @param id
     * @returns {*}
     */
    $scope.inCart = function(id) {
        return $scope.cart.getItemById(id);
    }

    $scope.sendOrder = function() {
        var cart = $scope.cart.getItems();

        $http.post('/cart/send_order', {
            cart: cart,
            user: $scope.user
        }).success(function(data, status) {
            alert('Ваш заказ успешно отправлен!');
            ngCart.empty(1);
        }).error(function(data, status) {
            alert('Error');
        })
    }


})