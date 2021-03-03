@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <div role="group" aria-label="Basic example">
                    <a class="btn btn-secondary" href="{{ url('usuarios') }}">User List</a>
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
                          <th scope="col">Restore</th>
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

                          </td>
                          <td>
                            <!-- <button class="btn btn-danger" alt="Remove" data-toggle="tooltip" title="Remove {{ $u->firstname }} {{ $u->lastname }}">Delete</button> -->
                            <form action="{{ route('archived_users.delete', $u->id ) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" alt="Delete" data-toggle="tooltip" title="Delete {{ $u->firstname }} {{ $u->lastname }}">Delete</button>
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
