<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 footer-widget widget">
                <h3 class="widgettitle">Последние новости</h3>
                <style>div {text-align: left;} span.yandex_date {font-size: 85%; margin-right:0.5em;text-align: left;} div.yandex_informer	{font-size: 85%; margin-bottom: 0.3em;} div.yandex_title 	{font-size: 100%; margin-bottom: 0.5em; }	div.yandex_title a	{ }	div.yandex_allnews	{font-size: 80%; margin-top: 0.3em;} div.yandex_allnews	{font-size: 80%; margin-top: 0.3em;}	div.yandex_annotation		{font-size: 85%; margin-bottom: 0.5em;}</style><script src='http://news.yandex.ru/common.js'></script><script>m_index=false;</script><script src='http://news.yandex.ru/ru/computers3.utf8.js' type='text/javascript' charset='utf-8'></script><script> str='<div class=yandex_title><a href=http://news.yandex.ru><b>Яндекс.Новости</b></a></div>'; if ((aObj=eval('m_computers')) && (aObj.length>0)){for (j=0;j<aObj.length;j++) {
                        str+='<div><span class=yandex_date>'+aObj[j].time+'</span> <span class=yandex_news_title><a href='+aObj[j].url+'>'+aObj[j].title+'</a></span></div>';} str+='<div class=yandex_allnews><a href=http://news.yandex.ru>Все новости на ' + ya_format_date(update_time_t) + ' >></a></div>';  document.write(str);}; function ya_format_date(timestamp){var d = (new Date(timestamp*1000)).toLocaleTimeString().split(':'); return [d[0], d[1]].join(':').replace(/d{1,2}:d{1,2}(:d{1,2})/, '');}</script>
            </div>
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
            <div class="col-md-3 col-sm-6 footer-widget widget">
                <h3 class="widgettitle">Twitter Updates</h3>

                    <a class="twitter-timeline" href="https://twitter.com/hashtag/%D0%B2%D0%BE%D1%80%D0%BA%D1%83%D1%82%D0%B0" data-widget-id="622401388509831168">Твиты о #воркута</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 footer-widget widget">
                <h3 class="widgettitle">Подпишись</h3>

                <p>
                    Хотите получать интересные новости? Уведомление о новых возможностях? Тогда подписывайтесь!
                </p>

                <form>
                    <input type="email" name="email" id="email" placeholder="Введите ваш email" class="form-control">
                    <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" value="Подписаться">
                </form>
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
