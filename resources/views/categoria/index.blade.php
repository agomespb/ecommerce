<h2>Categorias</h2>
<hr>

<ul>
    @foreach($Categorias as $Categoria)
        <li><strong>{{ $Categoria->name }}</strong><p><em>{{ $Categoria->description }}</em></p></li>
    @endforeach
</ul>