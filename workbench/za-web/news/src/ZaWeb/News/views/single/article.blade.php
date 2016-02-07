<article class="blog-item" style="width:100% !important;">

<div class="blog-content">
    <h4 class="blog-title"><a href="{{ url('news', ['id'=>$data->id]) }}">{{ $data->title }}</a></h4>
    <p class="blog-meta">By: {{ $data->user->name }} <a href="#"></a> | Categorie: <a href="#">{{ $data->category }}</a>
    <p></p>
</div>
</article>