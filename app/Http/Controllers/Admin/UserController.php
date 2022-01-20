<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::users()->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function show(){}

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|min:6',
            'direccion' => 'required|string',
            'ciudad' => 'required|string',
            'cuit' => 'required|string',
            'razon_social' => 'required|string',
            'cargo' => 'required|string',
            'user_role' => 'required|string',
        ]);

        $fields = $request->all();
        $fields['password'] = bcrypt($fields['password']);

        $user = User::createDataWithMedia($fields);
        if ($user)
        {
            Session::flash('flash_message', 'Se ha creado un nuevo usuario');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Hubo un error al crear el usuario');
            Session::flash('flash_message_type', 'success');
        }
        return redirect('admin/users');
        //return response()->json($user);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required',
            'password' => 'string|min:6',
            'direccion' => 'required|string',
            'ciudad' => 'required|string',
            'cuit' => 'required|string',
            'razon_social' => 'required|string',
            'cargo' => 'required|string',
            'user_role' => 'required|string',
        ]);

        $user = User::find($id);
        $fields = $request->all();
        if(isset($fields['password']) and strlen($fields['password'])>1 ){
            $fields['password'] = bcrypt($fields['password']);
        }else{
            $fields['password'] = $user->password;
        }

        User::updateDataWithMedia($id,$fields);

        Session::flash('flash_message', 'Se ha actualizado el usuario');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/users');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            deleteImage($user->dni_mano,'user_images');
            deleteImage($user->dni_frente,'user_images');
            deleteImage($user->dni_dorso,'user_images');
            $user->delete();

            Session::flash('flash_message', '¡Usuario Eliminado!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'Usuario no pudo ser eliminado.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/users');
    }
}
