@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app')
@section('title')
    Корзина
@stop

@section('content')

    <div class="col-md-7" ng-app="shop"  ng-controller="CartCtrl" >
            <div class="block-heading" ng-init="getUserData()">
                <h4><span class="heading-icon"><i class="fa fa-th-list"></i></span>Ваша корзина</h4>


            </div>
            <div class="property-grid">
                <span style="float:right"><strong><a data-clear-cart="" href="">Очистить</a></strong></span>

                <ul class="grid-holder col-3">
                    <li class="grid-item type-rent item-[[ item.getId() ]]" ng-repeat="item in cart.getItems()">
                        <div class="property-block"> <a href="#" class="property-featured-image"> <img ng-src="[[ item.getData().data.image ]]?w=600&h=400&fit=crop" alt=""> </a>
                            <div class="property-info">
                                <h4><a href="#">[[ item.getName() ]]</a></h4>
                                <div class="price"><strong><i class="fa fa-rub"></i></strong><span> [[ item.getPrice() * item.getQuantity() ]]</span></div>
                                <div class="cart-action"><a data-remove-cart="[[ item.getId() ]]" href="#"><strong>Удалить</strong></a></div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        <button class="btn btn-primary" onclick="$('.order').appendTo('body').modal()">Оформить заказ</button>
        <button type="button" ng-click="sendOrder()" ng-disabled="form.name.$error.required || form.phone.$error.required || form.address.$error.required" class="btn btn-primary">Отправить</button>

        <div class="modal fade order" id="order_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Заказ</h4>
                    </div>
                    <div class="modal-body">
                            <form name="form">
                                <div class="form-group">
                                    <input type="text" name="name"  ng-model="user.name" class="form-control" placeholder="Ваше имя" ng-required="true">
                                    <span ng-show="form.name.$error.required" style="color:red">Введите имя</span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone"   ng-model="user.phone" class="form-control" placeholder="Ваш телефон" ng-required="true">
                                    <span ng-show="form.phone.$error.required" style="color:red">Введите ваш телефон</span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="address"  ng-model="user.address" class="form-control" placeholder="Ваш адрес" ng-required="true">
                                    <span ng-show="form.address.$error.required" style="color:red">Введите адресс</span>
                                </div>
                                <div class="form-group">
                                    <textarea name="extra" ng-model="user.extra" class="form-control" placeholder="Дополнительная информация" cols="30" rows="10"></textarea>
                                </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <button type="button" ng-click="sendOrder($('#order_form').serialize())" ng-disabled="form.name.$error.required || form.phone.$error.required || form.address.$error.required" class="btn btn-primary">Отправить</button>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
@stop
