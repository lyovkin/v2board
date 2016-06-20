@extends('layouts.app')

@section('title')
    Загрузка товаров из VK
@endsection
@section('css')
    <style>

        /* Testimonials */
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
            font-size: 23px;
            font-weight: 300;
            margin: 23px 0 7px;
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
    <div class="wrapper" ng-app="vk-upload-app" ng-cloak="">
        <div class="col-md-7" ng-controller="vkUploadCtrl">
            <div class="row">
                <flash-message duration="5000"
                               show-close="true"></flash-message>
                <div class="col-md-6">
                    <div class="testimonials">
                        <div class="active item">
                            <div class="carousel-info">
                                <img ng-src="[[ user[0].photo_50 ]]" class="pull-left">
                                <div class="pull-left">
                                    <span class="testimonials-name">[[ user[0].first_name ]] [[ user[0].last_name ]]</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <form method="post" name="form" action="/uploading_data">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sel1">Выберете альбом для выгрузки:</label>
                    <select class="form-control" id="sel1" name="albums"
                            ng-model="selectedAlbum" required>
                        <option value="" selected>Выберете альбом для выгрузки</option>
                        <option ng-repeat="album in albums" value="[[album.aid]]">[[ album.title ]]</option>
                    </select>
                    <span class="error" ng-show="form.albums.$error.required">Выберете альбом</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sel2">Выберете магазин для загрузки:</label>
                    <select class="form-control" id="sel2" name="shop_id"
                            ng-model="selectedShop" required>
                        <option value="" selected>Выберете магазин для загрузки</option>
                        <option ng-repeat="shop in shops" value="[[ shop.id ]]">[[ shop.profile.name ]]</option>
                    </select>
                    <span class="error" ng-show="form.shop_id.$error.required">Выберете магазин</span>
                </div>
            </div>
            <button
                    ng-show="selectedAlbum != '' && selectedShop != ''" type="button" class="btn btn-default" style="margin-left: 15px;"
                    ng-click="upload_photos(); successAlert(); ">Загрузить</button>

                <div class="row" style="margin-left: 0; margin-top: 25px;">
                        <div class="col-md-4" ng-repeat="photo in photos_albums">
                            <img ng-src="[[photo.src_big]]"
                                 ng-hide="photo.error_code == 100"
                                 class="thumbnail" style="width:200px;height:200px">
                        </div>
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