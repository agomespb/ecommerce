@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Atualizar</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

                    <h1 CLASS="text-center">AGUARDANDO ORIENTAÇÕES</h1>

                        {!! Form::open(['route'=>['update_user', $usuario->id], 'class'=>'form-horizontal', 'method'=>'put']) !!}

						<div class="form-group">
							<label class="col-md-4 control-label">Nome</label>
							<div class="col-md-6">
                                {!! Form::text('name', $usuario->name,['class'=>'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Endereço de E-Mail</label>
							<div class="col-md-6">
                                {!! Form::email('email', $usuario->email,['class'=>'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Senha</label>
							<div class="col-md-6">
                                {!! Form::password('password', ['class'=>'form-control'], null) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirme a Senha</label>
							<div class="col-md-6">
                                {!! Form::password('password_confirmation', ['class'=>'form-control'], null) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{{--<button type="submit" class="btn btn-primary">Salvar</button>--}}
                                <a href="{{ route('users') }}" class="btn btn-primary form-control">AGUARDANDO ORIENTAÇÕES: Voltar</a>
							</div>
						</div>
                        {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
