<h2>Produtos</h2>
<hr>

<ul>
    @foreach($Produtos as $Produto)
        <li>
            <strong>{{ $Produto->name }}</strong> R$ {{ number_format($Produto->price, 2, ',', '.') }}
            <p><em>{{ $Produto->description }}</em></p>
        </li>
    @endforeach
</ul>