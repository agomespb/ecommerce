

<div class="table-responsive cart_info">
    <table class="table table-condensed">

        <thead>
            <tr class="cart_menu">
                <th class="text-center">Código</th>
                <th class="">Data</th>
                <th class="price">Total</th>
                <th class="description">Status</th>
            </tr>
        </thead>

        <tbody>

        @forelse($orders as $order)
            <tr>
                <td class="text-center">
                    {{ $order->id }}
                </td>

                <td class="cart_price">
                    {{ date('d/m/Y \à\s H:i', strtotime($order->created_at )) }}
                </td>

                <td class="cart_total">
                    <p class="cart_total_price">
                        R$ {{ number_format($order->total, 2, ',', '.') }}
                    </p>
                </td>
                <td class="cart_description">
                    <p class="cart_total_price">
                        <strong>{{ ($order->status)? 'Finalizado' : 'Em processo' }}</strong>
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

        </tbody>
    </table>
</div>