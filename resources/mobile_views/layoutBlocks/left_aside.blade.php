<div class="col-md-2 sidebar">
    <div class="widget sidebar-widget">
        <h3 class=" title-color" >В ХаЛяВе</h3>
        <ul class="left-aside-menujt">
            @if(Auth::user())
                <li  class="border-bottom" ><a href="{{ url('profile') }}">Мой профиль</a></li>
                <li><a href="{{ url('shops')}}">Интернет - магазины</a></li>
                <li><a href="{{ route('shops.my') }}">Мои магазины</a></li>
                <li class="aside-li"><a href=" {{ url('ads/create') }}">Подать объявление</a></li>
                <li class="aside-li"><a href="{{ route('ads.my') }}">Мои объявления</a></li>
                <li class="border-bottom"><a href="{{ route('favorites.index') }}">Избранные объявления</a></li>

                <li class="aside-li">
                    <a href="{{ url('nottifications') }}"><i style="margin-right: 1px" class="fa fa-envelope"></i>
                        Входящие
                        @if($nottifactions_count > 0)
                            <span class="badge" id="nottifications">{{$nottifactions_count}}</span>
                        @endif
                    </a>
                </li>
                <li class="aside-li"><a href="{{ url('questions/create') }}">Задать вопрос</a></li>
                <li class="aside-li"><a href="{{ url('questions') }}">Ответы на вопросы</a></li>
                {{-- <span>По платным услугам обращайтесь к администрации</span>--}}
                <li class="border-bottom"><a href="{{ url('paidservices') }}">Платные услуги</a></li>

                <li class="aside-li">
                    <a href="{{ route('welcome') }}"> Назад к объявлениям </a>
                </li>


                <li class="aside-li"><a href="http://hlv24.ru:8282">Чат - Знакомства</a></li>


            @else
                <li  class="border-bottom" ><a href="{{ url('auth/register') }}">Регистрация</a></li>
                <li  class="border-bottom" ><a href="{{ url('auth/login') }}">Войти</a></li>
            @endif

        </ul>
    </div>
    <!--<div class="widget sidebar-widget">
        <div class="sidebar-widget-title">
            <h3 class="widgettitle">Категории</h3>
        </div>
        <ul>
            @foreach($categories as $category)
                <li><a href="{{ url('category', $category->alias) }}">{{$category->title}}</a> ({{$category->adsCount()}})</li>
            @endforeach
            </ul>
        </div>-->
    <!--<div class="widget sidebar-widget">
        <div class="sidebar-widget-title">
            <h3 class="widgettitle">Теги</h3>
        </div>

        {!! TagService::viewTagsCloud($tags) !!}
    </div>-->

    <!--<div class="widget sidebar-widget">
        <h3 class="widgettitle">Поиск</h3>

        <div class="full-search-form">
            <form action="#">
                <select name="propery type" class="form-control input-lg selectpicker">
                    <option selected="">Тип</option>
                    <option>Villa</option>
                    <option>Family House</option>
                    <option>Single Home</option>
                    <option>Cottage</option>
                    <option>Apartment</option>
                </select>
                <select name="propery contract type" class="form-control input-lg selectpicker">
                    <option selected="">Категория</option>
                    <option>Rent</option>
                    <option>Buy</option>
                </select>
                <select name="propery location" class="form-control input-lg selectpicker">
                    <option selected="">Город</option>
                    <option>New York</option>
                </select>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Поиск</button>
            </form>
        </div>
    </div>-->
</div>

