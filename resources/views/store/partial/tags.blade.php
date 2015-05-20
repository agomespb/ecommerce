<h4>Tags (Produtos relacionados)</h4>

<ul class="list-group">
    @foreach($produto->tags as $tag)

        <li class="list-group-item">
            <a href="{{ route('tag_products', ['id'=>$tag->id] ) }}">
                <span class="">{{ $tag->name }}</span>
            </a>
        </li>

    @endforeach
</ul>

