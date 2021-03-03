@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <div role="group" aria-label="Basic example">
                    <a class="btn btn-secondary ms-1" href="{{ url('users') }}">Back</a>
                  </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- FORMS -->
                    <form action="{{ url('users/update') }}/{{ $user->id }}" method="post">
                    @csrf
                    <small>Fields with <span class="text-danger">*</span> are required.</small>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Firstname<span class="text-danger">*</span></label>
                        <input type="text" name="firstname" class="form-control" value="{{ $user->firstname }}" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Middlename</label>
                        <input type="text" name="middlename" class="form-control" value="{{ $user->middlename }}">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Lastname<span class="text-danger">*</span></label>
                        <input type="text" name="lastname" class="form-control" value="{{ $user->lastname }}">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Suffix</label>
                        <select class="custom-select" id="suffixname" name="suffixname" >
                          @foreach ($suffixes as $suffix)
                            @if($suffix == $user->suffixname)
                              <option value="{{ $suffix }}" selected>{{ $suffix }}</option>
                            @else
                              <option value="{{ $suffix }}">{{ $suffix }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Username<span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">E-mail:</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->email }}">
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
