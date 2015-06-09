<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
    <META http-equiv=Content-Type content="text/html; charset=utf-8">
    <META content="MSHTML 6.00.2900.3020" name=GENERATOR>
</HEAD>
<BODY bgColor=#ffffff>

<DIV style="text-align:justify">

    <p>Olá <strong>{{ $auth->name }}!</strong></p>

    <p>
        O seu pedido de número <strong>{{ $order->last()->id }}</strong> foi registrado em nossa base de dados.
    </p>

    <p>Status: <strong>{{ ($order->last()->status) ? 'Entregue' : 'Processo' }}</strong></p>
    <p>Data do registro: {{ date('d/m/Y \á\s H:i', strtotime($order->last()->created_at)) }}</p>

</DIV>

<h3>Itens do Pedido:</h3>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <thead>

    <tr style="background-color:#f6f3e4;">
        <td valign="middle" style="text-align: left">Item</td>
        <td valign="middle">Preço</td>
        <td valign="middle" style="text-align: center">Qtde</td>
        <td valign="middle">Total</td>
    </tr>

    </thead>

    <tbody>

    @forelse($order->last()->items as $item)
        <tr>

            <td valign="middle" style="text-align: left">
                <h4>
                    {{ $item->product->name }}<br/>
                    <small>Código: {{ $item->product_id }}</small>
                </h4>
            </td>

            <td valign="middle">
                R$ {{ number_format($item->price, 2, ',', '.') }}
            </td>

            <td valign="middle" style="text-align: center">
                {{ $item->qtde }}
            </td>

            <td valign="middle">
                R$ {{ number_format($item->price * $item->qtde, 2, ',', '.') }}
            </td>

        </tr>
    @empty
        <tr>
            <td valign="middle" colspan="4">
                <p>Vazio.</p>
            </td>
        </tr>
    @endforelse
    <tr>
        <td valign="middle" colspan="4">
            <div style="text-align: right">
                <span style="margin-right: 90px"><strong>TOTAL: R$</strong> {{ number_format($order->last()->total, 2, ',', '.') }}</span>
            </div>
        </td>
    </tr>
    </tbody>
</table>

<p>Você pode visualizar o histórico de seus pedidos a qualquer momento fazendo o login em sua área de cliente.</p>

<p>Clique <a href="{{ url('/user')  }}">aqui</a> para acessar sua área.</p>

</BODY>
</HTML>