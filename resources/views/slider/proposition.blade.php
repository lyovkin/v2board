@if($special)
<div class="flex-caption">
    <strong class="title">{{ $special->text }}</strong>
    @if ($special->price)
        <div class="price"><strong><i class="fa fa-rub"></i></strong><span>{{ $special->price }}</span></div>
    @endif
    <a href="{{ $special->link }}" class="btn btn-primary btn-block">Смотреть</a>
    <div class="hero-agent">
        @if($special->attachment)
            {!! HTML::image(url('img',
                ['specials', $special->attachment->name]).'?w=85&h=80&fit=crop', 'a picture',
                ['class' => 'hero-agent-pic',
                'data-toggle'=>"tooltip",
            ]) !!}
        @else
            <img src="/img/halyava.jpg" alt="" class="hero-agent-pic" style="width: 85px; height: 80px">
        @endif
        <a href="{{ $special->link }}" class="hero-agent-contact" data-placement="left"  data-toggle="tooltip" title="" data-original-title="Смотреть">
            <i class="fa fa-envelope"></i></a>
    </div>
</div>
@endif