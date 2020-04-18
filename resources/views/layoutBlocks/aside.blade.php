<div class="col-md-3 sidebar">
    {{--<!-- Проверка на наличие банеров -->--}}
    @if(count($blocks) > 0)
        {{--<!-- Выводим блок -->--}}
            @foreach($blocks as $block)

                <div class="widget sidebar-widget featured-properties-widget">
                    <h3 class="widgettitle">Реклама</h3>

                    <ul class="owl-carousel owl-alt-controls1 single-carousel" data-columns="1" data-autoplay="false"
                            data-pause="yes" data-pagination="no" data-arrows="yes" data-single-item="yes">
                        @foreach($block as $b)
                            <li class="item property-block">
                                <a href="{{$b->link}}">
                                    <img src="{{$b->attachment->url}}" alt="">
                                    <!--<span class="images-count"><i class="fa fa-picture-o"></i> some text here </span> -->
                                </a>
                                <div class="property-info">
                                    <h4><a href="{{$b->link}}">{{$b->text}}</a></h4>
                                    <!-- <span class="location"> some text here</span> -->
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
    @endif
</div>
