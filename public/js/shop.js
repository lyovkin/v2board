$(function(){
    $(".shop__add-cart").popover({
        html: true
    })
})
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
angular.module('shop').controller('OrderCtrl', function(ngCart) {

})

angular.module('shop').directive('addCart', [
    function() {
        return {
            restrict: 'A',
            link: function($scope, element, attrs) {
                element.bind('click', function() {
                    var cart = $scope.cart;
                    if(cart.getItemById(attrs.addCart)) {
                        var currentQuantity = cart.getItemById(attrs.addCart).getQuantity();
                        cart.getItemById(attrs.addCart).setQuantity(currentQuantity + $scope.quantity);
                    }
                    else {
                        cart.addItem(
                            attrs.addCart, attrs.itemName,
                            attrs.itemPrice, $scope.quantity,
                            {
                                'partner': attrs.itemPartner,
                                'data': {
                                    'image': attrs.itemImage,
                                    'partner_name': attrs.itemPartnerName
                                }
                            }
                        );
                    }
                    $scope.quantity = 1;
                    $scope.$apply();
                })
            }
        }
}])
angular.module('shop').directive('removeCart', [
    function() {
        return {
            restrict: 'A',
            link: function($scope, element, attrs) {
                element.bind('click', function() {
                    var cart = $scope.cart;
                    if(cart.getItemById(attrs.removeCart)) {
                        cart.removeItemById(attrs.removeCart);
                        $(".item-"+attrs.removeCart).fadeOut('slow');
                    }
                    $scope.$apply();
                })
            }
        }
    }
])
angular.module('shop').directive('clearCart', [
    function() {
        return {
            restrict: 'A',
            link: function($scope, element, attrs) {
                element.bind('click', function() {
                   $scope.cart.empty(1);
                   $(".shop__in-cart").html('');
                   $scope.quantity = 1;
                   $scope.$apply();
                })
            }
        }
    }])
angular.module('shop').directive('inCart', [
    function() {
        return {
            restrict: 'A',

            link: function($scope, element, attrs) {
                if($scope.cart.getItemById(attrs.inCart)) {
                    element.html('В корзине')
                }

                $scope.$on('ngCart:itemAdded', function() {
                    if($scope.cart.getItemById(attrs.inCart)) {
                        element.html('В корзине')
                    }
                });

            }
        }
    }])
//# sourceMappingURL=shop.js.map