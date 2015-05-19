@extends('app')

@section('content')
    <div class="container">

        <h2>Imagens para <strong>{{ $produto->name }}</strong></h2><hr>

        <a href="{{ URL::route('products_images_create', $produto->id) }}" class="btn btn-default">Adicionar Imagem</a>
        <a href="{{ route('products') }}" class="btn btn-default pull-right">
            <i class="fa fa-chevron-left"></i> Voltar
        </a>
        <br/><br/>

        @if(Session::has('flash_message'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <strong>Ops!</strong> {{ Session::get('flash_message') }}
            </div>
        @endif

        <table class="table">
            <tr>
                <th>ID</th>
                <th>
                    <small>Imagem</small>
                </th>
                <th>
                    <small>Extensão</small>
                </th>

                <th>
                    <small>Ação</small>
                </th>
            </tr>

            @foreach($produto->images as $imagem)

                <tr>
                    <td width="10%">{{ $imagem->id }}</td>
                    <td width="30%">
                        <img src="{{ url('uploads/'.$imagem->id.'.'.$imagem->extension) }}" width="40%" class="img-rounded">
                    </td>
                    <td width="10%">
                        <small>{{ $imagem->extension }}</small>
                    </td>
                    <td>
                        <a href="{{ route('products_images_destroy',['id'=>$imagem->id] ) }}" class="btn btn-default">
                            <span class="glyphicon glyphicon-remove">
                        </a>
                    </td>
                </tr>

            @endforeach

        </table>



</div>
@endsection

@section('libjs')

<script>

$(function(){

    // variável para conter a url deletar
    var url_deletar = "{{ route('products_images_destroy', null ) }}" + '/';

    // qualquer link que tiver a url deletar vai sofrer um evento quando for clicada
    $("a[href*='" + url_deletar + "']").click(function (event) {

    // variável contendo o id referente ao botão clicado
    var contato_id  = $(this).attr('href').split(url_deletar).pop();

    // variável contendo mensagem da janela
    var mensagem = "Deseja realmente continuar com a exclusão?";

    // variável com resposta da mensagem colocada na janela
    var confirmacao = confirm(mensagem);

    // se a confirmação for false o fluxo é interrompido
    if (!confirmacao)
    // elimar o evendo do botão clicado
    event.preventDefault();
    });
});

</script>

@endsection

