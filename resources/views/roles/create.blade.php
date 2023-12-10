@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 align-self-center">
            <div class="mb-3 border p-2 rounded bg-white">

                @if ($mensaje = Session::get('mensaje'))
                    <div class="alert alert-success" role="alert">
                        {{ $mensaje }}
                    </div>
                @endif

                <h4 class="text-center">
                    Crear Rol
                </h4>

                <form action='{{route('roles.store')}}' method="POST">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Nombre del rol</label>
                      <input type="string" class="form-control" name='rol' required>
                      <div class="form-text">Solo se almacena el nombre.</div>
                    </div>

                    <a href="{{route('roles.index')}}" class="btn btn-secondary"> Volver </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Crear ROL
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection


