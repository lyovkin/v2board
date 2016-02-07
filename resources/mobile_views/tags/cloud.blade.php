<div class="sidebar-widget">
    <h3><span>Popular </span>Tags</h3>
    <div class="mukam-tag-cloud">
        <ul>
            @foreach($data as $tag)
                <li><a href="#">{{ $tag->tag_name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>