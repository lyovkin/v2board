
<li class="parallax" style="background-image:url(/images/slide/1.jpg);">
    <?php $special = $specials->pop();?>
    @include('slider.proposition')
    <?php $specials->prepend($special); ?>
</li>
<li class="parallax" style="background-image:url(/images/slide/2.jpg);">
    <?php $special = $specials->pop(); ?>
    @include('slider.proposition')
    <?php $specials->prepend($special); ?>
</li>
<li class="parallax" style="background-image:url(/images/slide/3.jpg);">
    <?php $special = $specials->pop(); ?>
    @include('slider.proposition')
    <?php $specials->prepend($special); ?>
</li>
<li class="parallax" style="background-image:url(/images/slide/4.jpg);">
    <?php $special = $specials->pop(); ?>
    @include('slider.proposition')
    <?php $specials->prepend($special); ?>
</li>
