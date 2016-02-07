<div class="tag-cloud">
    @foreach($data as $tag)
        <a href="#">{{ $tag->tag_name }}</a>
@endforeach
</div>
