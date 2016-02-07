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