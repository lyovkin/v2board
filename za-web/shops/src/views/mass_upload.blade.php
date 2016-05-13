@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app2')
@section('title')
    {{ $shops->profile->name }}
@endsection

@section('css')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"/>
    <style>
        .list-group-horizontal .list-group-item {
            display: inline-block;
        }
        .list-group-horizontal .list-group-item {
            margin-bottom: 0;
            margin-left:-4px;
            margin-right: 0;
        }
        .list-group-horizontal .list-group-item:first-child {
            border-top-right-radius:0;
            border-bottom-left-radius:4px;
        }
        .list-group-horizontal .list-group-item:last-child {
            border-top-right-radius:4px;
            border-bottom-left-radius:0;
        }
        .blacked-text {
            color: #000;
        }
        .features {
            float: right;
            width: 300px;
            padding-left: 20px;
        }
        .features .heading {
            font-size: 14px;
            font-weight: bold;
        }

        .drop {
            padding: 15px;
            border: 2px #f1f1f1 dashed;
            border-radius: 5px;
            line-height: 34px;
        }
        .drop.drag-over {
            background: #5CB85C;
            color: #fff
        }
        .transfer-box {
            margin-bottom: 5px;
        }
        .transfer-box .progress {
            margin-bottom: 0;
        }

        .thumbnail {
            line-height: 20px;
            margin-bottom: 5px;
            overflow: hidden;
            word-break: normal;
        }
        .thumbnail img {
            max-width: 200px;
            max-height: 150px;
        }

        .gallery-box {
            width: 200px;
            padding: 5px;
            margin: 7px;
            float: left;
            min-height: 200px;
            border: 1px solid #ddd;
            overflow: hidden;
        }
        .gallery-box .progress {
            margin-bottom: 0;
        }
        .gallery-box .thumbnail {
            height: 188px;
            width: 188px;
        }
        .gallery-box .title {
            height: 22px;
            overflow: hidden;
            display: block;
        }

    </style>
@endsection


@section('content')
    <div class="col-md-10" ng-app="ng-flow-app">
        <div class="single-agent">

            <h2 class="page-title text-center">{{ $shops->profile->name }}</h2>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    @if($shops->attachment)
                        <img src="{{ $shops->attachment->url }}?w=375" alt="{{ $shops->profile->name }}" class="img-thumbnail">
                    @endif
                </div>
                <div class="col-md-6 col-sm-6">
                    <div>
                        <p class="h4 blacked-text">Информация о магазине</p>
                        <ul class="list-group blacked-text">
                            <li class="list-group-item">
                                <i class="fa fa-calculator"></i> Всего товаров в магазине
                                <span style="float:right;">{{ count($shops->items) }}</span>
                            </li>
                            <li class="list-group-item">
                                @if($shops->profile->phone )
                                    <span style="float:right">{{ $shops->profile->phone }}</span>
                                @else
                                    <span style="float:right">Не указано</span>
                                @endif
                                <i class="fa fa-mobile"></i> Телефон
                            </li>
                            <li class="list-group-item">
                                @if($shops->profile->email )
                                    <span style="float:right">{{ $shops->profile->email }}</span>
                                @else
                                    <span style="float:right">Не указано</span>
                                @endif
                                <i class="fa fa-envelope-o"></i> Email
                            </li>
                            <li class="list-group-item">
                                @if($shops->city->city_name)
                                    <span style="float:right">{{ $shops->city->city_name }}</span>
                                @else
                                    <span style="float:right">Не указано</span>
                                @endif
                                <i class="fa fa-building-o"></i> Город
                            </li>
                            <li class="list-group-item">
                                <p><i class="fa fa-book"></i> Описание</p>
                                @if($shops->profile->description)
                                    <span>{{ $shops->profile->description }}</span>
                                @else
                                    <span style="float:right; position: absolute;top: 10px;right: 12px;">Не указано</span>
                                @endif

                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <span class="h4 blacked-text" style="vertical-align: 10px;">Категории магазина</span>
                    <div class="list-group list-group-horizontal blacked-text">
                        @foreach($categories as $cat)
                            <p href="#" class="list-group-item active">{{ $cat->name }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <span class="h4 blacked-text" style="vertical-align: 10px;">Фильтр товаров по категориямю</span>
                    <form action="#" method="post"
                          name="category" style="padding-bottom: 10px;">
                        <select name="cat_id" class="form-control blacked-text" id="selectElementId" disabled>
                            <option>Выберете категорию...</option>
                            <option value="0">Все товары</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
            <div flow-init="{target: '/shops/get_photos', testChunks:false}"
                 flow-name="obj.flow"
                 flow-file-added="!!{png:1,gif:1,jpg:1,jpeg:1}[$file.getExtension()]">

                <div class="drop" flow-drop ng-class="dropClass" ng-controller="ngFlowCtrl" data-shop="{{$shops->id}}">
                    <span class="btn btn-default" flow-btn flow-directory ng-show="$flow.supportDirectory">
                        Загрузите папку с изображениями <i class="fa fa-folder-open"></i> </span>
                    <b>или</b>
                    перетащите изображение сюда
                    <span ng-show="$flow.files.length > 0">
                        <a class="btn btn-small btn-danger" ng-click="$flow.cancel()" style="float: right;">Сбросить</a>
                        <a class="btn btn-medium btn-danger" ng-click="uploading()"
                           style="float: right; margin-right: 10px" data-toggle="modal" data-target="#myModal">Загрузить</a>
                         {{--<a class="btn btn-medium btn-danger" ng-click="$flow.upload()" style="float: right;">Отправить</a>--}}
                    </span>
                    <!-- Modal -->

                </div>
                <hr class="soften" />
                <div>
                    <div ng-repeat="file in $flow.files" class="gallery-box">
                        <span class="title">[[file.name]]</span>
                        <div class="thumbnail" ng-show="$flow.files.length">
                            <img flow-img="file" />
                        </div>
                        <div class="progress progress-striped" ng-class="{active: file.isUploading()}">
                            <div class="progress-bar" role="progressbar"
                                 aria-valuenow="[[file.progress() * 100]]"
                                 aria-valuemin="0"
                                 aria-valuemax="100"
                                 ng-style="{width: (file.progress() * 100) + '%'}">
                                <span class="sr-only">[[file.progress()]]% Complete</span>
                            </div>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-xs btn-danger" ng-click="file.cancel()">
                                Удалить
                            </a>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="/js/ng-flow/ng-flow-standalone.min.js"></script>
    <script src="/js/ng-flow/ng-flow-app.js"></script>
@endsection

