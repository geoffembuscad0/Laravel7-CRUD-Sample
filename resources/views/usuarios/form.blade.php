@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <div role="group" aria-label="Basic example">
                    <a class="btn btn-secondary ms-1" href="{{ url('usuarios') }}">Back</a>
                    <a class="btn btn-danger ms-1" href="usuarios/delete/{{ $usuario->id }}">Archive</a>
                  </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if( Request::is('*/edit'))
                    <!-- Edit User within User active login -->
                    <form action="{{ url('usuarios/update') }}/{{ $usuario->id }}" method="post">
                    @csrf
                    <small>Fields with <span class="text-danger">*</span> are required.</small>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Firstname<span class="text-danger">*</span></label>
                        <input type="text" name="firstname" class="form-control" value="{{ $usuario->firstname }}" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Middlename</label>
                        <input type="text" name="middlename" class="form-control" value="{{ $usuario->middlename }}">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Lastname<span class="text-danger">*</span></label>
                        <input type="text" name="lastname" class="form-control" value="{{ $usuario->lastname }}">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Suffix</label>
                        <select class="custom-select" id="suffixname" name="suffixname" >
                          @foreach ($suffixes as $suffix)
                            @if($suffix == $usuario->suffixname)
                              <option value="{{ $suffix }}" selected>{{ $suffix }}</option>
                            @else
                              <option value="{{ $suffix }}">{{ $suffix }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Username<span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control" value="{{ $usuario->username }}">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">E-mail:</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $usuario->email }}">
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @else

                    <form action="{{ url('usuarios/add') }}" method="post">
                    @csrf
                      <!-- Create User within User active login -->
                      <small>Fields with <span class="text-danger">*</span> are required.</small>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Firstname<span class="text-danger">*</span></label>
                        <input type="text" name="firstname" class="form-control" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Middlename</label>
                        <input type="text" name="middlename" class="form-control" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Lastname<span class="text-danger">*</span></label>
                        <input type="text" name="lastname" class="form-control" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Suffix</label>
                        <select class="custom-select" id="suffixname" name="suffixname" >
                          <option selected></option>
                          <option value="Sr.">Sr.</option>
                          <option value="Jr.">Jr.</option>
                          <option value="I">I</option>
                          <option value="II">II</option>
                          <option value="III">III</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Username<span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">E-mail:</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>

                      <div class="form-group">
                        <label for="password" >{{ __('Password') }}<span class="text-danger">*</span></label>
                        <div class="">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="password-confirm" >{{ __('Confirm Password') }}<span class="text-danger">*</span></label>
                        <div class="">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
