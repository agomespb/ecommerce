<div class="table-responsive cart_info">

    <table class="table table-condensed">

        <thead>
        <tr>
            <th>ID</th>
            <th>
                <small>CEP</small>
            </th>
            <th>
                <small>Logradouro</small>
            </th>
            <th>
                <small>Número</small>
            </th>
            <th>
                <small>Complemento</small>
            </th>
            <th>
                <small>Cidade / UF</small>
            </th>
            <th>
            </th>

        </tr>
        </thead>
        <tbody>
        @forelse($auth->enderecos()->get() as $endereco)

            <tr>
                <td>{{ $endereco->id }}</td>
                <td>
                    <small>{{ $endereco->cep }}</small>
                </td>
                <td>
                    <small>{{ $endereco->logradouro }}</small>
                </td>

                <td>
                    <small>{{ $endereco->numero }}</small>
                </td>

                <td>
                    <small>{{ $endereco->complemento }}</small>
                </td>

                <td>
                    <small>{{ $endereco->cidade . ' / ' . $endereco->uf }}</small>
                </td>

                <td>
                    <a href="{{ route('user_address_destroy',['id'=>$endereco->id ] ) }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>

        @empty
            <tr>
                <td class="" colspan="7">
                    <p class="text-info">Ainda não há endereço registrado!</p>
                </td>
            </tr>
        @endforelse
        </tbody>

    </table>

</div>

@section('scripts')
    @parent
    <script>
        ;
        (function ($) {
            'use strict';
            $(document).ready(function () {
                $(function () {
                    var url_deletar = "{{ route('user_address_destroy', ['id'=>null]) }}" + '/';
                    $("a[href*='" + url_deletar + "']").click(function (event) {
                        var endereco_id = $(this).attr('href').split(url_deletar).pop();
                        var mensagem = "Deseja realmente remover o Endereço com ID " + endereco_id + " da sua conta?";
                        var confirmacao = confirm(mensagem);
                        if (!confirmacao)
                            event.preventDefault();
                    });
                });
            });
        })(window.jQuery);
    </script>
@stop