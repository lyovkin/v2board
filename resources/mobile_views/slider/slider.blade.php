<!-- Site Showcase -->
<div class="site-showcase">
    <div class="slider-mask overlay-transparent"></div>
    <!-- Start Hero Slider -->
    {{--<div class="hero-slider flexslider clearfix" data-autoplay="false" data-pagination="no" data-arrows="yes"
         data-style="fade" data-pause="yes">
        <ul class="slides">
            @include('slider.slide')
        </ul>
    </div>--}}
    <!-- End Hero Slider -->
    <!-- Site Search Module-->
    <div class="site-search-module">
        <div class="container">
            <div class="site-search-module-inside">
                {!! Form::open(['route'=>['welcome'] ,'method' => 'GET']) !!}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <select name="type_id" class="form-control input-lg selectpicker" >
                                <option value="null">Все типы</option>
                                @foreach($types as $type)
                                    @if(!empty($input['type_id']))
                                        <option value="{{ $type->id }}" @if(($input['type_id']) == $type->id) selected="selected" @endif>{{ $type->name }}</option>
                                    @else
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="category_id" class="form-control input-lg selectpicker">
                                <option value="null">Все категории</option>
                                @foreach($categories as $cat)
                                    @if(!empty($input['category_id']))
                                        <option value="{{ $cat->id }}" @if(($input['category_id']) == $cat->id) selected="selected" @endif>{{ $cat->title }}</option>
                                    @else
                                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="city_id" class="form-control input-lg selectpicker">
                                <option value="null">Все города</option>
                                @foreach($cities as $city)
                                    @if(!empty($input['city_id']))
                                        <option value="{{ $city->id }}" @if(($input['city_id']) == $city->id) selected="selected" @endif>{{ $city->city_name }}</option>
                                    @else
                                        <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">
                                <i class="fa fa-search"></i> Искать
                            </button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
