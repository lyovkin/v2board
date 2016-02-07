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