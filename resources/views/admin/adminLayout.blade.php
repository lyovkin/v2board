<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - @yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="/pub_admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/pub_admin/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/pub_admin/css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/pub_admin/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/pub_admin/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/pub_admin/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="/pub_admin/css/plugins/bootstrap-tagsinput.css"/>

    <link rel="stylesheet" href="/css/upload.css"/>

    <!-- At very end: redefines vendor styles -->
    <link rel="stylesheet" href="/pub_admin/css/board.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">SB Admin v2.0 ХаЛяВа</a>
        </div>
        <!-- /.navbar-header -->

        @include('admin.blocks.topNav')
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a class="" href="{{ route('admin.dashboard.index') }}"><i
                                    class="fa fa-dashboard fa-fw"></i> Главная</a>
                    </li>
                    <li>
                        <a class="" href="{{ route('admin.user.index') }}"><i
                                    class="fa fa-list fa-fw"></i> Пользователи</a>
                    </li>
                    <li>
                        <a class="" href="{{ route('admin.shops.index') }}"><i
                                    class="fa fa-list fa-fw"></i> Магазины</a>
                    </li>
                    <li>
                        <a class="" href="{{ route('admin.catshop.index') }}"><i
                                    class="fa fa-list fa-fw"></i> Категории магазинов</a>
                    </li>
                    <li>
                        <a class="" href="{{ route('admin.advertisement.index') }}"><i
                                    class="fa fa-list fa-fw"></i> Обьявления</a>
                    </li>
                    <li>
                        <a class="" href="{{ route('admin.type.index') }}"><i
                                    class="fa fa-list fa-fw"></i> Типы обьявлений</a>
                    </li>
                    <li>
                        <a class="" href="{{ route('admin.navigation.index') }}"><i
                                    class="fa fa-list fa-fw"></i> Навигация</a>
                    </li>
                    <li>
                        <a class="" href="{{ route('admin.banner.index') }}"><i
                                    class="fa fa-list fa-fw"></i> Баннеры</a>
                    </li>
                    <li>
                        <a class="" href="{{ route('admin.services.index') }}"><i
                                    class="fa fa-list fa-fw"></i> Услуги</a>
                    </li>
                    <li>
                        <a class=""
                           href="{{ route('admin.categories.index') }}"><i
                                    class="fa fa-list fa-fw"></i> Категории</a>
                    </li>
                    <li>
                        <a class="" href="{{ route('admin.pagename.index') }}"><i
                                    class="fa fa-list fa-fw"></i> Заголовки страниц</a>
                    </li>
                    <li>
                        <a class="" href="{{route('admin.tags.index')}}"><i
                                    class="fa fa-list fa-fw"></i> Теги</a>
                    </li>
                    <li>
                        <a class="" href="{{route('admin.city.index')}}"><i
                                    class="fa fa-list fa-fw"></i> Города</a>
                    </li>
                    <li>
                        <a class="" href="{{route('admin.questions.index')}}"><i
                                    class="fa fa-list fa-fw"></i> Вопросы</a>
                    </li>
                    <li>
                        <a class="" href="{{ route('admin.useful-link.index') }}"><i
                                    class="fa fa-list fa-fw"></i> Полезные ссылки</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.page.index') }}">
                            <i class="fa fa-list fa-fw"></i> Статические страницы</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.gallery.index') }}">
                            <i class="fa fa-list fa-fw"></i> Галлереи</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.special.index') }}">
                            <i class="fa fa-list fa-fw"></i> Супер предложения</a>
                    </li>
                    <li>
                        <a class="" href="{{ route('admin.transactions.index') }}"><i
                                    class="fa fa-list fa-fw"></i> Транзакции</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        @if (Session::has('message'))
            <br/>
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{ Session::get('message') }}
            </div>
        @endif
        @yield('content')
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="/pub_admin/js/jquery.js"></script>

<!-- angular -->
<script src="/pub_admin/js/angular.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/pub_admin/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/pub_admin/js/plugins/metisMenu/metisMenu.min.js"></script>

<script src="/pub_admin/js/plugins/bootstrap-tagsinput.js"></script>
<script src="/pub_admin/js/plugins/autogrow.js"></script>

<script src="/js/handlebars.min.js"></script>

<script src="/upload/js/jquery.knob.js"></script>
<script src="/upload/js/jquery.ui.widget.js"></script>
<script src="/upload/js/jquery.iframe-transport.js"></script>
<script src="/upload/js/jquery.fileupload.js"></script>
<script src="/upload/js/script.js"></script>

<script src="/pub_admin/js/board.js"></script>

@yield('js')
<!-- Custom Theme JavaScript -->
<script src="/pub_admin/js/sb-admin-2.js"></script>

<script src="/js/bootbox.min.js"></script>


<script>
    $(document).ready(function () {
        $("[data-toggle='tooltip']").tooltip();

        // $('#dataTables-example').dataTable();

        bootbox.setDefaults({
            locale: "ru"
        });


        $('.confirm-btn').on('click', function (e) {
            e.preventDefault();
            var currentForm = this;
            bootbox.confirm("Вы уверены что хотите удалить?", function (result) {
                if (result) {
                    $(currentForm).parent().submit();
                }
            });
        });

        $('.confirm-block').on('click', function (e) {
            e.preventDefault();
            var currentForm = this;
            bootbox.confirm("Вы уверены что хотите заблокировать?", function (result) {
                if (result) {
                    $(currentForm).parent().submit();
                }
            });
        });

        $('.confirm-unblock').on('click', function (e) {
            e.preventDefault();
            var currentForm = this;
            bootbox.confirm("Вы уверены что хотите разблокировать?", function (result) {
                if (result) {
                    $(currentForm).parent().submit();
                }
            });
        });


    });
</script>
</body>

</html>
