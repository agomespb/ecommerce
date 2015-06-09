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

        @forelse($items as $item)
            <tr>
                <td class="car_product">
                    <img src="{{ url('uploads/' . $item->product->images->first()->imageFileName) }}"
                         alt="" height="100"/>
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
                    <h3 style="margin-right: 45px"><strong>Total: </strong> R$ {{ number_format($orders->first()->total, 2, ',', '.') }}</h3>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>