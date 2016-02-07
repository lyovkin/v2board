@extends('layouts.app')
@section('title')
    О проекте
@stop
@section('css')

    <style>
        /***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/

        /* Content */
        .content {
            padding-top: 30px;
        }

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
            font-size: 16px;
            font-weight: 300;
            margin: 23px 0 7px;
        }
        .testimonials span.testimonials-post {
            color: #656565;
            font-size: 12px;
        }
    </style>

@stop
@section('content')

                <div class="col-md-7">
                    <div class="testimonials">
                        <p class="h4" style="text-align: center"><em>О проекте</em></p>
                        <div class="active item">
                            <blockquote><p>Проект "ХаЛяВа" ( В ХаЛяВе ) предоставляет   эффективное   решение    сложностей,   которые   сопровождают процесс продажи, покупки, торговли самыми популярными  товарами и услугами.</p><br />
                                    <p>С нами все очень просто: зашел, разместил объявления и купил или продал все что пожелаешь!</p><br />
                                   <p> Наши пользователи   — это люди, которые ценят свое время и  деньги, предпочитая покупать  товар дешевле, получая при этом сервис, высокое качество товаров и услуг.</p><br />
                                   <p> Доска объявлений  "Халява" заполнена  товарами  разной  ценовой категории –  от дешевых  до  дорогих  брендовых товаров, при этом они будут стоить в несколько раз дешевле, чем в магазине или в торговом центре.</p></blockquote>
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
