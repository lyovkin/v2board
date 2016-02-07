<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 footer-widget widget">
                <h3 class="widgettitle">Полезные ссылки</h3>
                @if (count($useful_links))
                    <ul>
                        @foreach($useful_links as $link)
                            <li><a href="{{$link->url}}">{{ $link->title }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div>

        </div>
    </div>
</footer>
<footer class="site-footer-bottom">
    <div class="container">
        <div class="row">
            <div class="copyrights-col-left col-md-6 col-sm-6">
                <a href="https://vk.com/za_web" style="text-decoration: none;">&copy; 2014 ZaWeb. All Rights Reserved</a>
            </div>
            <div class="copyrights-col-right col-md-6 col-sm-6">
                <div class="social-icons">
                    <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="http://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a>
                    <a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a>
                    <a href="http://www.youtube.com/" target="_blank"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Site Footer -->
