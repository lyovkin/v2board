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