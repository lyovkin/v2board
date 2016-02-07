<div class="site-showcase">
    <!-- Start Page Header -->
    <div class="parallax page-header"
         style="background-image:url(/img/title.jpg); height: 95px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $pageName->title or '' }}</h1>

                    <p class="fadein scaleInv anim_4">
                        {{ $pageName->description or '' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
