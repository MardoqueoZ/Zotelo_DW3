<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::paginate(2);
        //$cursos = Curso::all();
        return view('usuario.index', compact('usuarios'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|string',
            'apellido' => 'required|alpha',
            'fecha_nacimiento' => 'required',
            'email' => 'required|unique:usuarios,email',
            'username' => 'required|string|unique:usuarios,username',
            'password' => 'required|string',
            'rol' => 'required|string',
            
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'nombre.required' => 'El nombre es requerido',
            'apellido.required' => 'El apellido es requerido',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es requerida',
            'email.required' => 'El email es requerido',
            'username.required' => 'El username es requerido',
            'password.required' => 'El password es requerido',
            'rol.required' => 'Seleccione un rol',
            
        ];
        $this->validate($request, $rules, $mensaje);

        $usuarios = request()->except('_token');
        Usuario::insert($usuarios);
        Flash::success('Creado correctamente');
        return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = Usuario::findorFail($id);
        return view('usuario.edit', compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuarios = request()->except(['_token', '_method']);
        Usuario::where('id', '=', $id)->update($usuarios);
        Flash::success('Editado correctamente');
        return redirect('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usuario::destroy($id);
        Flash::success('Eliminado correctamente');
        return redirect('usuarios');
    }
}
