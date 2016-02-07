<li class="grid-item type-buy">
    <div class="property-block">
        <a href="#" class="property-featured-image">
            @if(!empty($data->ads_attachment[0]->name))
                <img src="/uploads/ads_attachments/{{ $data->ads_attachment[0]->name }}" alt="">
            @else
                <img src="http://loremflickr.com/600/400" alt="">
            @endif
            <span class="images-count"><i class="fa fa-picture-o"></i>{{ count($data->ads_attachment) }}</span>
            <span class="badges">Buy</span> </a>
        <div class="property-info">
            <h4><a href="{{ url('ads', ['id'=>$data->id]) }}">{{ $data->title }}</a></h4>
            <span class="location">{{$data->city->city_name or 'Город не выбран'}}</span>

            <div class="price"><strong><i class="fa fa-rub"></i></strong><span>{{$data->price}}</span></div>
        </div>
        <div class="property-amenities clearfix">
            <span class="user"><strong><i class="fa fa-user"></i></strong>
                <a href="{{ url('profile', ['name'=>$data->user->user_name]) }}">{{$data->user->user_name}}</a>
            </span>
            <span class=""><strong>3</strong>Baths</span>
            <span class=""><strong>3</strong>Beds</span>
            <span class=""><strong>1</strong>Parking</span>
        </div>
    </div>
</li>
