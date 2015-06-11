@extends('app')

@section('content')
    <div class="container">

        <h2>Pedidos</h2>
        <hr>

        @if(Session::has('flash_message'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <strong>Ops!</strong> {{ Session::get('flash_message') }}
            </div>
        @endif

        <div id="error"></div>

        <table class="table">
            <tr>
                <th>ID</th>
                <th><small>Usuário</small></th>
                <th><small>Data</small></th>
                <th><small>Total</small></th>
                <th><small>Status</small></th>
                <th><small></small></th>
            </tr>

            @foreach($orders as $order)

                <tr>
                    <td>
                        {{ $order->id }}
                    </td>
                    <td width="20%">
                        @foreach($order->user()->get() as $user)
                            <small>{{ $user->name }}</small>
                        @endforeach
                    </td>
                    <td>
                        <small>{{ date('d/m/Y \à\s H:i', strtotime($order->created_at )) }}</small>
                    </td>
                    <td>
                        <small>R$ {{ number_format($order->total, 2, ',', '.') }}</small>
                    </td>
                    <td width="15%">

                        <form id="form{{$order->id}}" method="POST" action="{{ route('order_update', ['id'=>$order->id]) }}"
                              accept-charset="UTF-8">
                            <input name="_method" type="hidden" value="PUT">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <select name="status" id="{{$order->id}}">
                                <option value="0" {{ (!$order->status)? 'selected' : '' }}>Em processo</option>
                                <option value="1" {{ ($order->status)? 'selected' : '' }}>Finalizado</option>
                            </select>
                        </form>

                    </td>
                    <td width="10%">
                        {{--<a href="" class="btn btn-default">--}}
                            {{--<span class="glyphicon glyphicon-camera"></span>--}}
                        {{--</a>--}}
                        <span id="status_{{ $order->id }}" style="display:none"><i class="fa fa-refresh fa-spin"></i></span>
                    </td>
                </tr>

            @endforeach

        </table>

        {!! $orders->render() !!}

    </div>
@endsection

@section('scripts')
    @parent
    <script>
        ;
        (function ($) {
            'use strict';
            $(document).ready(function () {

                $(function () {

                    $("select[name*='status']").change(function () {

                        var id_order   = $(this).attr('id');

                        $.ajax({

                            type: "PUT",
                            data: $( '#form'+id_order ).serialize(),
                            url: "{{ route('order_update', ['id'=>null]) }}" + '/' + id_order,
                            dataType: "html",
                            success: function(result){

                                var html =  '<div class="alert alert-success alert-dismissible" role="alert">' +
                                            '<button type="button" class="close" data-dismiss="alert">' +
                                            '<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>' +
                                            '</button>' +
                                            '<strong>Sucesso!</strong> ' + result +
                                            '</div>';

                                $("#error").val('').html( html );
                            },
                            beforeSend: function(){
                                $('#status_'+id_order).css({display:"block"});
                            },
                            complete: function(msg){
                                $("#status_"+id_order).css({display:"none"});
                            },
                            error: function(erro){

                                var html =  '<div class="alert alert-danger alert-dismissible" role="alert">' +
                                            '<button type="button" class="close" data-dismiss="alert">' +
                                            '<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>' +
                                            '</button>' +
                                            '<strong>Error!</strong> ' + erro +
                                            '</div>';

                                $("#error").val('').html( html );
                                $("#status_"+id_order).css({display:"none"});
                            }
                        });

                        return false;
                    });
                });
            });
        })(window.jQuery);
    </script>
@stop
