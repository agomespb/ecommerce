@extends('store.store')

@section('sidebar_left')

    <div class="left-sidebar">

        <h2 class="">
            {{ substr(Auth::user()->name, 0, strpos(Auth::user()->name, " ")) }}
        </h2>

        <img src="{{ url('images/no-img.jpg') }}" alt="" class="img-responsive" style="margin: 0 auto;"/>

        <hr >

        <ul class="list-group">
            <li class="list-group-item">
                <a href="" class="btn btn-primary btn-block"><i class="fa fa-camera"></i> Minha Foto</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('user_address_create') }}" class="btn btn-primary btn-block"><i class="fa fa-envelope"></i> Registrar Endereço</a>
            </li>

        </ul>

        <hr >

    </div>
@stop

@section('content')

    <div class="features_items">

        <h2 class="title text-center">
            Conta do Usuário
        </h2>

        @if(isset($partial))
            <div class="col-md-12">
                @include('user.partial.detalhes')
                <hr>
            </div>

            @include('user.partial.'.$partial)
        @else
            <div class="col-md-12">

                <h4>Detalhes</h4><hr>
                @include('user.partial.detalhes')

                <h4>Endereços Registrados</h4><hr>
                @include('user.partial.show-endereco')

                @if(count($orders))
                    <h4>Última Compra Realizada</h4><hr>
                    @include('user.partial.compras')

                    <h4>Histórico dos seus Pedidos</h4><hr>
                    @include('user.partial.orders')
                @endif
            </div>
        @endif

    </div>

@stop

