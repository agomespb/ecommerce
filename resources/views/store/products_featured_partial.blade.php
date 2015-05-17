
<h2 class="title text-center">Em destaque</h2>

@foreach($produtosEmDestaque as $produto)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">

                    @if( count($produto->images) )
                        <img src="{{ url('uploads/'.$produto->images->first()->id .'.'. $produto->images->first()->extension) }}" alt="" height="250"/>
                    @else
                        <img src="{{ url('images/no-img.jpg') }}" alt="" height="250"/>
                    @endif

                    <h2>R$ {{ number_format($produto->price, 2, ',', '.') }}</h2>
                    <p>{{ str_limit($produto->name, 30) }}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>R$ {{ number_format($produto->price, 2, ',', '.') }}</h2>
                        <p>{{ $produto->name }}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
