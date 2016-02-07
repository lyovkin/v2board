@extends('m_layouts.app')
@section('title')
    Правила
@stop
@section('css')
    <style>

        .content {
            padding-top: 30px;
        }

        /* Testimonials */
        .testimonials blockquote {
            background: #f8f8f8 none repeat scroll 0 0;
            border: medium none;
            color: #666;
            display: block;
            font-size: 10px;
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
            font-size: 16px;
            font-weight: 300;
            margin: 23px 0 7px;
        }
        .testimonials span.testimonials-post {
            color: #656565;
            font-size: 12px;
        }
        blockquote p{
            font-size: 14px;
        }
    </style>

@stop
@section('content')

    <div class="col-md-7">
        <div class="testimonials">
            <p class="h4" style="text-align: center"><em>Правила</em></p>
            <div class="active item">
                <blockquote>
                    <p class="h4" style="color: green"> Общие положения</p><br />
                    <p>Ресурс представляет собой сайт бесплатных объявлений.</p><br />
                    <p>Разместить объявление на сайте бесплатных объявлений может каждый желающий.</p><br />
                    <p>Добавляемые материалы пользователями не соответствующие тематике сайта и требованиям данных правил будут удаляться.</p><br />
                    <p>Объявления будут проверяться, в определенных случаях исправляться, повторяющиеся будут удаляться. Администрация доски объявлений оставляет за собой право переместить Ваше объявление в другой раздел доски, который, по ее мнению, максимально подходит по тематике.</p><br />
                    <p>Ответственность за содержимое объявления лежит на его авторе. Администрация сайта не несёт ответственности за содержимое объявлений и оставляет за собой право удалить любое объявление без объяснения причин (в случае не соответствования настоящим правилам).</p><br />
                    <p>Администрация сайта вправе изменять в любой момент настоящие правила доски объявлений без уведомления пользователей.</p><br />
                    <p>Администрация сайта не несет ответственности за ущерб, убытки или расходы, возникшие в связи с настоящим сайтом, его использованием или невозможностью использования.</p><br />
                    <p>При использовании предоставленных сайтом ресурсов (к этому также относиться размещение объявлений на сайте и использование предоставленной информации), Вы автоматически соглашаетесь с настоящими Условиями и принимаете на себя указанные в них права и обязанности, связанные с использованием сайта.</p><br />
                    <p class="h4" style="color: red"> Запрещается</p><br />
                    <p>Не допускаются к публикации объявления, содержание которых нарушает общепринятые нормы морали и нравственности.</p><br />
                    <p>Не допускаются к публикации объявления, содержание которых нарушает законодательство Российской Федерации которое (содержат пропаганду наркотиков и/или насилия, расовой ненависти, порнографию и пр.).</p><br/>
                    <p>Запрещается размещение объявлений не соответствующих тематике сайта.</p><br/>
                    <p>Запрещается размещать одно и тоже объявление дважды в один или несколько разделов доски.</p><br />
                    <p>Запрещается вставлять в объявление HTML код, BB-код и непонятные символы.</p><br/>
                    <p>Запрещается размещать объявления, содержащие набор ключевых фраз.</p><br/>
                    <p>Запрещается писать заголовок и текст ЗАГЛАВНЫМИ БУКВАМИ, в*ы*д*е*л*я*т*ь о_б_ъ_я_в_л_е_н_и_я спецсимволами.</p><br/>
                </blockquote>
                <div class="carousel-info">
                    <img alt="" src="/img/halyava.jpg" class="pull-left" style="width: 12%">
                    <div class="pull-left">
                        <span class="testimonials-name">С Ув. Администратор</span>
                        <span class="testimonials-post">Халява - hlv24.ru</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
