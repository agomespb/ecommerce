@extends('store.store')

@section('cart_content')

    <section id="cart_items">

        <div class="container">

            <div class="table-responsive cart_info">

                <table class="table table-condensed">

                    <thead>

                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Preço</td>
                        <td class="price text-center">Qtde</td>
                        <td class="price">Total</td>
                        <td></td>
                    </tr>

                    </thead>

                    <tbody>

                    @forelse($cart->all() as $id => $item)
                        <tr>
                            <td class="car_product text-center">

                                <a href="{{ route('product_show', ['id'=>$id]) }}">
                                    <img src="{{ url('uploads/' . $item['image']) }}" alt="" height="100"/>
                                </a>

                            </td>

                            <td class="cart_description">
                                <h4><a href="{{ route('product_show', ['id'=>$id]) }}">{{ $item['name'] }}</a></h4>

                                <p>Código: {{$id}}</p>
                            </td>

                            <td class="cart_price">
                                R$ {{ number_format($item['price'], 2, ',', '.') }}
                            </td>

                            <td class="cart_quantity text-center">
                                <a href="{{ route('cart_minus',['id'=>$id] ) }}" class="btn btn-default btn-xs"><i class="fa fa-minus"></i></a>
                                {{ $item['qtde'] }}
                                <a href="{{ route('cart_add',['id'=>$id] ) }}" class="btn btn-default btn-xs"><i class="fa fa-plus"></i></a>
                            </td>

                            <td class="cart_total">
                                <p class="cart_total_price">
                                    R$ {{ number_format($item['price'] * $item['qtde'], 2, ',', '.') }}
                                </p>
                            </td>

                            <td class="">
                                <a class="btn btn-default btn-xs" href="{{ route('cart_destroy', ['id'=>$id]) }}">
                                    <i class="fa fa-times"></i> Remover
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="" colspan="6">
                                <p class="text-info">Ainda não há item em seu Carrinho!</p>
                            </td>
                        </tr>
                    @endforelse
                    <tr class="cart_menu">
                        <td class="" colspan="6">
                            <div class="pull-right">
                                <span style="margin-right: 90px">TOTAL: R$ {{ number_format($cart->getTotal(), 2, ',', '.') }}</span>
                                <a class="btn btn-success" href="{{ route('checkout_place') }}">Fechar a Conta</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>

                </table>

            </div>

        </div>

    </section>

@stop

@section('scripts')
    @parent
    <script>
        ;(function($)
        {
            'use strict';
            $(document).ready(function()
            {
                $(function(){
                    var url_deletar = "{{ route('cart_destroy', ['id'=>null]) }}" + '/';
                    $("a[href*='" + url_deletar + "']").click(function (event) {
                        var contato_id  = $(this).attr('href').split(url_deletar).pop();
                        var mensagem = "Deseja realmente remover o item de Código " + contato_id + " do Carrinho?";
                        var confirmacao = confirm(mensagem);
                        if (!confirmacao)
                            event.preventDefault();
                    });
                });
            });
        })(window.jQuery);
    </script>
@stop