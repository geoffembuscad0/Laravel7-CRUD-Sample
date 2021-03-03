<?php

namespace App\Http\Controllers;
use App\User;
use App\UserProfile;
use Redirect;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(){
        $users = UserProfile::get();
        return view('users.list', [ 'users' => $users ]);
    }

    public function new(){

        return view('users.add');

    }

    public function add( Request $request ){
        $UserProfile = new UserProfile;
        $UserProfile = $UserProfile->create( $request->all() );

        $User = new User;
        $User = $User->create( $request->all() );

        return Redirect::to('/users');
    }

    public function edit( $id ){
        $user = UserProfile::findOrFail( $id );

        $suffixes = [ "", "Sr.","Jr.", "I", "II", "III"];

        return view('users.edit', ['user' => $user, 'suffixes' => $suffixes]);
    }

    public function update( $id, Request $request ){
        $UserProfile = UserProfile::findOrFail( $id );
        $UserProfile->update( $request->all() );
        return Redirect::to('/users');
    }

    public function delete( $id ){
        $user = User::findOrFail( $id );
        $user->delete();

        $UserProfile = UserProfile::findOrFail( $id );
        $UserProfile->delete();
        return Redirect::to('/users');
    }

    // Trashed Users - Macro deletes
    public function trashed(){
        $users = UserProfile::onlyTrashed()->get();

        return view('users.archived', ['users' => $users]);
    }

    public function restore( $id, Request $request ){
        $user = User::find('id', $id );
        
        $user->restore();

        $usuario = UserProfile::find('id', $id );

        $usuario->restore();

        return Redirect::to('/trashed');
    }

    public function forceDelete( $id ){
        $user = UserProfile::where( 'id', $id );

        $user->forceDelete();

        $usuario = Usuario::where( 'id', $id );

        $usuario->forceDelete();

        return Redirect::to('/trashed');
    }
}
