
<div class="panel-group" id="accordion">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#order{{ $orders->first()->id }}"
                   class="">
                    <strong>Código do Pedido:</strong> {{ $orders->first()->id }}
                    <strong>Data:</strong> {{ date('d/m/Y \à\s H:i', strtotime($orders->first()->created_at )) }}
                </a>
            </h4>
        </div>
        <div id="order{{ $orders->first()->id }}" class="panel-collapse collapse in">
            <div class="panel-body">

                <p><strong>Status: {{ ($orders->first()->status)? 'Finalizado' : 'Em processo' }}</strong></p>

                @include('user.partial.item')

            </div>
        </div>
    </div>

</div>

<div class="row">
    <p><br/></p>
</div>