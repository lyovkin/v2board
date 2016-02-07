<script id="question-template" type="text/x-handlebars-template">
    {{#each updates}}
    <article class="post">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <a href="http://loremflickr.com/600/400?random=4"
                    rel="prettyPhoto" title="This is the description">
                    <img src="http://loremflickr.com/600/400?random=4" alt="" class="img-thumbnail">
                </a>
                <a href="http://loremflickr.com/600/400?random=2"
                   rel="prettyPhoto" title="This is the description">
                    <img src="http://loremflickr.com/600/400?random=4" alt="" class="img-thumbnail">
                </a>
                <a href="http://loremflickr.com/600/400?random=4"
                   rel="prettyPhoto" title="This is the description">
                    <img src="http://loremflickr.com/600/400?random=4" alt="" class="img-thumbnail">
                </a>
            </div>
            <div class="col-md-8 col-sm-8">
                <h3><a href="">{{name}}</a></h3>
                    <span class="post-meta meta-data"> <span><i class="fa fa-calendar"></i> {{{update}}}</span>
                        <span><i class="fa fa-archive"></i> <a href="#">{{from}}</a></span>
                        <span><a href="#"><i class="fa fa-comment"></i> 12</a></span></span>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Nulla convallis egestas rhoncus. Donec facilisis fermentum sem,
                    ac viverra ante luctus vel. Donec vel mauris quam.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante
                    luctus vel. Donec vel mauris quam.</p>
                {{#if location}}
                - In: {{location}}</span>
                {{/if}}
                </span>
                <p><a href="#" class="btn btn-primary">Смотреть
                        <i class="fa fa-long-arrow-right"></i></a></p>
            </div>
        </div>
    </article>
    {{/each}}
</script>