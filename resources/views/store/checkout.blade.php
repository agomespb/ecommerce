@extends('store.store')

@section('cart_content')

    <section id="cart_items">

        <div class="container">

            <h1>Pedido Gerado com Sucesso!</h1>
            <h3>Em {{ date('d/m/Y \à\s H:i', strtotime($orders->last()->created_at)) }}</h3>

            <hr>

            <div class="panel-group" id="accordion">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#order{{ $orders->last()->id }}">
                                    <strong>Código do Pedido:</strong> {{ $orders->last()->id }}
                                </a>
                            </h4>
                        </div>
                        <div id="order{{ $orders->last()->id }}" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <h3><strong>Total: </strong> R$ {{ number_format($orders->last()->total, 2, ',', '.') }}</h3>

                                <p><strong>Situção: {{ ($orders->last()->status)? 'Finalizado' : 'Em processo' }}</strong></p>

                                <div class="table-responsive cart_info">
                                    <table class="table table-condensed">
                                        <thead>

                                        <tr class="cart_menu">
                                            <td class="image">Item</td>
                                            <td class="description"></td>
                                            <td class="price">Preço</td>
                                            <td class="price text-center">Qtde</td>
                                            <td class="price">Total</td>
                                        </tr>

                                        </thead>

                                        <tbody>

                                        @forelse($orders->last()->items as $item)
                                            <tr>
                                                <td class="car_product">
                                                    <img src="{{ url('uploads/' . $item->product->images->first()->imageFileName ) }}" alt="" height="100"/>
                                                </td>


                                                <td class="cart_description">
                                                    <h4>
                                                    {{ $item->product->name }}
                                                    </h4>

                                                    <p>Código: {{ $item->product_id }}</p>
                                                </td>

                                                <td class="cart_price">
                                                    R$ {{ number_format($item->price, 2, ',', '.') }}
                                                </td>

                                                <td class="cart_quantity text-center">
                                                    {{ $item->qtde }}
                                                </td>

                                                <td class="cart_total">
                                                    <p class="cart_total_price">
                                                        R$ {{ number_format($item->price * $item->qtde, 2, ',', '.') }}
                                                    </p>
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="" colspan="5">
                                                    <p class="text-info">Vazio.</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                        <tr class="cart_menu">
                                            <td class="" colspan="5">
                                                <div class="pull-right">
                                                    <span style="margin-right: 90px">TOTAL: R$ {{ number_format($orders->last()->total, 2, ',', '.') }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>

            <div class="row"><hr><p><br/></p></div>
        </div>
    </section>

@stop
