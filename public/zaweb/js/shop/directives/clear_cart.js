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