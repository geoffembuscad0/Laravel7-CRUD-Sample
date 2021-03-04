<?php

namespace App\Http\Controllers;
use App\User;
use App\UserProfile;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserProfileController extends Controller
{
    public function index(){
        $users = UserProfile::get();
        return view('users.index', [ 'users' => $users ]);
    }

    public function new(){

        return view('users.create');

    }

    public function add( Request $request ){

        $filename = 'default_avatar.jpg';

        if( !is_null($request->file('avatar')) ){

            $filename = Crypt::encryptString($request->file('avatar')->getClientOriginalName()) . '.' . $request->file('avatar')->extension();

            $request->file('avatar')->storeAs( 'avatars', $filename, 'public');

            $request->photo = $filename;

        } else {

            $request->photo = $filename;

        }

        $request->merge([ 'photo' => $filename ]);

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

        $filename = 'default_avatar.jpg';

        if( !is_null($request->file('avatar')) ){

            $filename = Crypt::encryptString($request->file('avatar')->getClientOriginalName()) . '.' . $request->file('avatar')->extension();

            $request->file('avatar')->storeAs( 'avatars', $filename, 'public');

            $request->photo = $filename;

        } else {

            $request->photo = $filename;

        }

        $request->merge([ 'photo' => $filename ]);

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

        return view('users.trashed', ['users' => $users]);
    }

    public function restore( $id, Request $request ){
        
        User::withTrashed()->where('id', $id )->restore();

        UserProfile::withTrashed()->where('id', $id )->restore();

        return Redirect::to('users/trashed');
    }

    public function forceDelete( $id ){
        $users = User::where( 'id', $id );

        $users->forceDelete();

        $userProfile = UserProfile::where( 'id', $id );

        $userProfile->forceDelete();

        return Redirect::to('users/trashed');
    }
}
