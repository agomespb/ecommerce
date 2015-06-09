<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
        <div class="panel-heading">Endereço do Usuário.</div>
        <div class="panel-body" id="vue">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Atenção!</strong> Verifique os erros abaixo:<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ route('user_address_store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-5 control-label">CEP:</label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" name="cep" value="{{ old('cep') }}" v-model="cep"
                               v-on="keyup:buscar"/>
                        <span class="text-danger" style="display: none;" v-show="naoLocalizado"><strong>Não
                                localizado.</strong> Favor forneça manualmente.</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-5 control-label">Logradouro (Rua/Av./Trav.):</label>

                    <div class="col-md-7">
                        <input class="form-control" type="text" name="logradouro" id="logradouro"
                               value="{{ old('logradouro') }}" v-el="logradouro" v-model="endereco.logradouro"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-5 control-label">Número:</label>

                    <div class="col-md-7">
                        <input class="form-control" type="text" name="numero" id="numero" value="{{ old('numero') }}"
                               v-el="numero"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-5 control-label">Complemento:</label>

                    <div class="col-md-7">
                        <input class="form-control" type="text" name="complemento" id="complemento"
                               value="{{ old('complemento') }}" v-el="complemento" v-model="endereco.complemento"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-5 control-label">Bairro:</label>

                    <div class="col-md-7">
                        <input class="form-control" type="text" name="bairro" id="bairro" value="{{ old('bairro') }}"
                               v-el="bairro" v-model="endereco.bairro"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-5 control-label">Cidade:</label>

                    <div class="col-md-7">
                        <input class="form-control" type="text" name="cidade" id="cidade" value="{{ old('cidade') }}"
                               v-el="localidade" v-model="endereco.localidade"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-5 control-label">UF:</label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" name="uf" id="uf" value="{{ old('uf') }}" v-el="uf"
                               v-model="endereco.uf"/>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-7 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">Salvar Endereço</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<p><br/></p>
<p><br/></p>
<p><br/></p>

@section('scripts')
    @parent

    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/appvuejs.js') }}"></script>

@stop