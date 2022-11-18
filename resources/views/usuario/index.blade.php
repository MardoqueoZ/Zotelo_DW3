@include('app')

<div class="container">
    <br>
    @include('flash::message')
    <h1>Lista de Usuarios</h1>
    <div class="d-flex justify-content-between">
        <div class="col-auto">
            <a class="d-flex justify-content-end" href="{{ route('usuarios.create') }}">
                <button type="button" class="btn btn-primary">Nuevo</button>
            </a>
        </div>

        <br>
    </div>
    <br>
    <div class="table-responsive-sm">
        <table class="table table-bordered" id="tabla">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Rol</th>
                    <th>Funciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($usuarios as $u)
                    <tr>
                        <td>{{ $u->nombre }}</td>
                        <td>{{ $u->apellido }}</td>
                        <td>{{ $u->fecha_nacimiento }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->username }}</td>
                        <td>{{ $u->password}}</td>
                        <td>{{ $u->rol }}</td>  
                        <td>
                            <div class="btn-group">
                                <div class="me-2">
                                    <a href="{{ url('/usuarios/' . $u->id . '/edit') }}">
                                        <input type="submit" class="btn btn-warning" value="Editar">
                                    </a>
                                </div>

                                <div class="me-2">
                                    <form action="{{ url('/usuarios/' . $u->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" class="btn btn-danger"
                                            onclick="return confirm('Estas seguro')" value="Borrar">
                                    </form>
                                </div>

                                

                            </div>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        <div class="l-flex justify-content-end">
            {{ $usuarios->links() }}
        </div>
    </div>
</div>