@extends('layouts.app')

@section('title')
    Загрузка товаров из VK
@endsection
@section('css')
    <style>
        .testimonials blockquote {
            background: #f8f8f8 none repeat scroll 0 0;
            border: medium none;
            color: #666;
            display: block;
            font-size: 14px;
            line-height: 20px;
            padding: 15px;
            position: relative;
        }
        .testimonials blockquote::before {
            width: 0;
            height: 0;
            right: 0;
            bottom: 0;
            content: " ";
            display: block;
            position: absolute;
            border-bottom: 20px solid #fff;
            border-right: 0 solid transparent;
            border-left: 15px solid transparent;
            border-left-style: inset; /*FF fixes*/
            border-bottom-style: inset; /*FF fixes*/
        }
        .testimonials blockquote::after {
            width: 0;
            height: 0;
            right: 0;
            bottom: 0;
            content: " ";
            display: block;
            position: absolute;
            border-style: solid;
            border-width: 20px 20px 0 0;
            border-color: #e63f0c transparent transparent transparent;
        }
        .testimonials .carousel-info img {
            border: 1px solid #f5f5f5;
            border-radius: 150px !important;
            height: 75px;
            padding: 3px;
            width: 75px;
        }
        .testimonials .carousel-info {
            overflow: hidden;
        }
        .testimonials .carousel-info img {
            margin-right: 15px;
        }
        .testimonials .carousel-info span {
            display: block;
        }
        .testimonials span.testimonials-name {
            color: #e6400c;
            font-size: 22px;
            font-weight: 300;
            margin: 28px 0 7px;
        }
        .testimonials span.testimonials-post {
            color: #656565;
            font-size: 12px;
        }
        .error {
            color: red;
        }
    </style>
    <link rel="stylesheet" href="/css/angular-flash.css" />
@endsection

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@section('content')
    <div class="col-md-7" ng-app="vk-upload-app" ng-cloak="">
        <div class="" ng-controller="vkUploadCtrl">
            <div class="row">
                <flash-message duration="5000" show-close="true"></flash-message>
                    <div class="col-md-12" style="border-radius: 10px;border: solid #4288f5;">
                        <div class="testimonials">
                            <div class="active item">
                                <div class="carousel-info">
                                    <img ng-src="[[ user[0].photo_50 ]]" class="pull-left">
                                    <div class="pull-left">
                                        <span class="testimonials-name">Вы вошли как: [[ user[0].first_name ]] [[ user[0].last_name ]]</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <form method="post" name="form" action="/uploading_data" style="margin-left: -15px; margin-right: -15px; margin-top: 30px">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="sel1">Выберете группу:</label>
                        <select class="form-control" id="sel1" name="groups"
                                ng-model="selectedGroup" ng-disabled="selectedAlbum.length != ''" required>
                            <option value="" selected>Выберете группу</option>
                            <option ng-repeat="groups in user_groups" value="[[ groups.id ]]">[[ groups.name ]]</option>
                        </select>
                        <span class="error" ng-show="form.groups.$error.required">Группа не выбрана</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="sel2">Выберете альбом:</label>
                        <select class="form-control" id="sel2" name="group_albums"
                                ng-model="selectedGroupAlbum" ng-disabled="selectedGroup.length == ''" required>
                            <option value="" selected>Выберете альбом</option>
                            <option ng-repeat="group_album in group_albums.items" value="[[ group_album ]]">[[ group_album.title ]]</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="sel3">Выберете альбом с личной страницы:</label>
                        <select class="form-control" id="sel3" name="albums"
                                ng-model="selectedAlbum" ng-disabled="selectedGroup != ''" required>
                            <option value="" selected>Выберете альбом для выгрузки</option>
                            <option ng-repeat="album in albums" value="[[album.id]]">[[ album.title ]]</option>
                        </select>
                        <span class="error" ng-show="form.albums.$error.required">Выберете альбом</span>
                    </div>
                </div>
                {{--<div class="col-md-12">--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="sel4">Выберете магазин для загрузки:</label>--}}
                        {{--<select class="form-control" id="sel4" name="shop_id"--}}
                                {{--ng-model="selectedShop" required>--}}
                            {{--<option value="" selected>Выберете магазин для загрузки</option>--}}
                            {{--<option ng-repeat="shop in shops" value="[[ shop.id ]]">[[ shop.profile.name ]]</option>--}}
                        {{--</select>--}}
                        {{--<span class="error" ng-show="form.shop_id.$error.required">Выберете магазин</span>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="sel5">Выберете категорию товара:</label>
                        <select class="form-control" id="sel5" name="shop_id"
                                ng-model="selectedCategory" required>
                            <option value="" selected>Выберете категорию товара</option>
                            <option ng-repeat="categories in shops_categories" value="[[ categories.id ]]">[[ categories.name ]]</option>
                        </select>
                        <span class="error" ng-show="form.categories.id.$error.required">Категория товара не выбрана</span>
                    </div>
                </div>
                <button type="button" class="btn btn-default" style="margin-left: 15px;"
                        ng-show="selectedAlbum != ''"
                    ng-click="upload_photos(); successAlert(); ">Загрузить</button>
                <button type="button" class="btn btn-default" style="margin-left: 15px;"
                        ng-show="selectedGroupAlbum != ''"
                        ng-click="upload_photos_group(); successAlert(); ">Загрузить</button>
                <div class="row" style="margin-left: 0; margin-top: 25px;">
                        <div class="col-md-4" ng-repeat="photo in photos_albums.items">
                            <img ng-src="[[photo.sizes[2].url]]" ng-hide="photo.error_code == 100" class="thumbnail" style="width:200px;height:200px">
                        </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="/js/vk_upload/vk-upload-app.js"></script>
    <script src="/js/angular-flash.js"></script>
@endsection
