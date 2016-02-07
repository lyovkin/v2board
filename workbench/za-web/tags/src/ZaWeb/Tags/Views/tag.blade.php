<article class="blog-item">
    @if(!empty($data->attachment->path))
	<div class="blog-thumbnail">
    <img src="{{ $data->attachment->path }}" alt="mukam">
    <div class="blog-date"><p class="day">29</p><p class="monthyear">FEB 2014</p></div>
    <div class="blog-type-logo"><div class="half-round"><i class="mukam-image"></i></div></div>
	</div>
	@endif
	<div class="blog-content">
	<h4 class="blog-title"><a href="#">{{ $data->title }}</a></h4>
    <p class="blog-meta">By: <a href="#">{{ $data->user->name }}</a> | Tags: <a href="#">Graphic</a>, <a href="#">illustration</a>, <a href="#">Logo</a></p>
    <p>{{ $data->text }}</p>
    <span class="buton b_inherit buton-2 buton-mini"><a href="blog-single.html">READ MORE</a></span>
	</div>
</article>