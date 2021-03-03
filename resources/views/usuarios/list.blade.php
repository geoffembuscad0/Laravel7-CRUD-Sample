@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <div role="group" aria-label="Basic example">
                    <a class="btn btn-success" href="{{ url('usuarios/new') }}">New User</a>
                    <a class="btn btn-secondary ms-1" href="{{ url('usuarios/new') }}">Archived Users</a>
                  </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>User List</h1>

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Firstname</th>
                          <th scope="col">Lastname</th>
                          <th scope="col">E-mail</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                    @foreach( $usuarios as $u )
                        <tr>
                          <th scope="row">{{ $u->id }}</th>
                          <td>{{ $u->firstname }}</td>
                          <td>{{ $u->lastname }}</td>
                          <td>{{ $u->email }}</td>
                          <td>
                            <a href="usuarios/{{ $u->id }}/edit" class="btn btn-info" data-toggle="tooltip" title="Edit {{ $u->firstname }} {{ $u->lastname }}">Edit</button>
                          </td>
                          <td>
                            <form action="usuarios/delete/{{ $u->id }}" method="post">
                              @csrf
                              @method('delete')
                                <button class="btn btn-danger" alt="Remove" data-toggle="tooltip" title="Remove {{ $u->firstname }} {{ $u->lastname }}">Remove</button>
                            </form>
                          </td>
                        </tr>
                    @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
