@include('app')

@if (count($errors)>0);

	<div class="container">
		<div class="alert alert-danger" role="alert">
			<u>
				@foreach ($errors->all() as $error)
				<li>
					{{$error}}
				</li>
				@endforeach
			</u>
		</div>
	</div>
	


@endif


<br>
<br>
<div class="container">
	<h1>Crear Usuario</h1>
	<form action="{{url('/usuarios')}}" method="post" enctype="multipart/from-data">
		@csrf
		<label for="nombre">Nombre: </label>
		<input type="text" class="form-control" name="nombre" id="nombre">

		<label for="apellido">Apellido: </label>
		<input type="text" class="form-control" name="apellido" id="apellido">

		<label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento">

		<label for="email">Email:</label>
		<input type="email" class="form-control" name="email" id="email">

        <label for="username">Username:</label>
		<input type="text" class="form-control" name="username" id="username">

        <label for="password">Password: </label>
		<input type="password" class="form-control" name="password" id="password">

		<label for="rol">Rol: </label>
		<select class="form-select" aria-label=".form-select-sm example" name="rol" id="rol">
			<option aria-placeholder="seleccione una opcion"></option>
			<option value="Admin"> Admin</option>
			<option value="Usuario">Usuario</option>
		</select>
		
        <br>
        <br>
        <div class="d-flex justify-content-between">
            <input type="submit" class="btn btn-primary" value="Guardar">

            <a href="{{ route('usuarios.index') }}">
                <button type="button" class="btn btn-danger">Cancelar</button>
            </a>
        </div>

    </form>
</div>
		