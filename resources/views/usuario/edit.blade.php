@include('app')


<br>
<br>
<div class="container">
	<h1>Editar Usuario</h1>
	<form action="{{url('/usuarios/'.$usuarios->id)}}" method="post" enctype="multipart/from-data">
        @csrf
		{{method_field('PATCH')}}
		<label for="nombre">Nombre: </label>
		<input type="text" class="form-control" name="nombre" id="nombre" value="{{$usuarios->nombre}}">

		<label for="apellido">Apellido: </label>
		<input type="text" class="form-control" name="apellido" id="apellido" value="{{$usuarios->apellido}}">

		<label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{$usuarios->fecha_nacimiento}}">

		<label for="email">Email:</label>
		<input type="email" class="form-control" name="email" id="email" value="{{$usuarios->email}}">

        <label for="username">Username:</label>
		<input type="text" class="form-control" name="username" id="username" value="{{$usuarios->username}}">

        <label for="password">Password: </label>
		<input type="password" class="form-control" name="password" id="password" value="{{$usuarios->password}}" disabled>

		<label for="rol">Rol: </label>
		<select class="form-select" aria-label=".form-select-sm example" name="rol" id="rol" value="{{$usuarios->rol}}">
			<option aria-placeholder="seleccione una opcion"></option>
			<option value="Admin" {{$usuarios->rol == 'Admin'?'selected' : ''}}> Admin</option>
			<option value="Usuario" {{$usuarios->rol == 'Usuario'?'selected' : ''}}>Usuario</option>
		</select>
		
        <br>
        <br>
		<br>
		<div class="d-flex justify-content-between">
			<input type="submit" class="btn btn-primary" value="Guardar">

	    	<a href="{{route('usuarios.index')}}">
	    		<button type="button" class="btn btn-danger">Cancelar</button></a>
		</div>
	    
	</form>
</div>