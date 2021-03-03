<?php
namespace App\Http\Controllers;
use App\User;
use App\Usuario;
use Redirect;
use Illuminate\Http\Request;

class ArchivedUsuariosController extends Controller
{
    public function index(){
        $usuarios = Usuario::onlyTrashed()->get();

        return view('usuarios.archived', ['usuarios' => $usuarios]);
    }

    public function update( $id, Request $request ){
        $user = User::find('id', $id );
        
        $user->restore();

        $usuario = Usuario::find('id', $id );

        $usuario->restore();

        return Redirect::to('/archived_users');
    }

    public function delete( $id ){
        $user = User::where( 'id', $id );

        $user->forceDelete();

        $usuario = Usuario::where( 'id', $id );
        
        $usuario->forceDelete();

        return Redirect::to('/archived_users');
    }

}
