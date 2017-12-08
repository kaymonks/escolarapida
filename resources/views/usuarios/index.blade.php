@extends('layout.site')

@section('titulo', 'Listar Usuários')

@section('conteudo')
	<section class="content-wrapper">
		<h2 class="center">Lista de Usuários</h2>

		{{--@include('admin._caminho')--}}


		<section class="content">
			<div class="box">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($usuarios as $usuario)
					<tr>
						<td>{{ $usuario->id }}</td>
						<td>{{ $usuario->name }}</td>
						<td>{{ $usuario->email }}</td>
						<td>

							<a title="Papel" class="btn blue" href="{{route('usuarios.papel',$usuario->id)}}"><i class="material-icons">lock_outline</i></a>

						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			</div>
		</section>

	</div>
</section>
@endsection
