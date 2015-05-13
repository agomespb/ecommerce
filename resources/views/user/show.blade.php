
@extends('app')

@section('content')

    <div class="container">

        <h2>Consulta Categoria</h2>
        <hr>
        <a href="{{ URL::route('new_user') . $Page }}" class="btn btn-default">Adicionar Usuário</a> |
        <a href="{{ URL::route('users') . $Page }}" class="btn btn-default">Voltar</a>
        <br /><br />

        @if($Usuario)

            <div class="col-md-2">
                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+" alt="..." class="img-rounded">
            </div>

            <div class="col-md-8">
                <p><strong>ID: </strong> {{ $Usuario->id }} </p>
                <p><strong>Nome:</strong> <br/> {{ $Usuario->name }}</p>
                <p><strong>Email:</strong> <br/><em>{{ $Usuario->email }}</em></p>
            </div>

        @else
            <h2>A Consulta retornou ZERO</h2>
        @endif
    </div>

@endsection