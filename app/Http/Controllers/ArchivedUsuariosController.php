<?php
namespace App\Http\Controllers;
use App\User;
use Redirect;
use Illuminate\Http\Request;

class ArchivedUsuariosController extends Controller
{
    public function trashed(){
        $usuarios = User::onlyTrashed()->get();

        return view('usuarios.archived', ['usuarios' => $usuarios]);
    }

    public function restore( $id, Request $request ){
        $user = User::find('id', $id );
        
        $user->restore();

        return Redirect::to('/trashed');
    }

    public function forceDelete( $id ){
        $user = User::where( 'id', $id );

        $user->forceDelete();

        return Redirect::to('/trashed');
    }

}
