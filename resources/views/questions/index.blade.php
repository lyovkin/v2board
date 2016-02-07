@extends('layouts.app')
@section('title')
    Вопросы
@stop
@section('js')

@stop
@section('content')
    <div class="col-md-8">
        <div class="block-heading">
            <a href="" class="btn btn-sm btn-primary pull-right">Задать вопрос <i
                        class="fa fa-long-arrow-right"></i></a>
            <h4><span class="heading-icon"><i class="fa fa-users"></i></span>Вопросы</h4>
        </div>
        <div class="agents-listing">
            <ul>
                <li class="col-md-12">

                    <div class="agent-info">

                        <div class="counts"><strong>18</strong><span>Ответов</span></div>
                        <h3><a href="{{ url('questions', ['id'=>1]) }}">Как проехать в Опу</a></h3>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vehicula dapibus mauris, quis
                            ullamcorper enim aliquet sed. Maecenas quis eget tellus dui. Vivamus condimentum
                            egestas.</p>
                    </div>
                    <!--  <div class="agent-contacts clearfix">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div> -->
                </li>
            </ul>
        </div>
        <ul class="pagination">
            <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
        </ul>
    </div>
@stop
