@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 align-self-center">
            <div class="mb-3 border p-2 rounded bg-white">

                <h4 class="text-center">
                    Editar Rol
                </h4>

                <form action='{{route('roles.update', $role->id)}}' method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label class="form-label">Nombre del rol</label>
                      <input type="string" class="form-control" name='rol' required value='{{ $role->nombre }}'>
                      <div class="form-text">Solo se almacena el nombre.</div>
                    </div>

                    <a href="{{ route('roles.index') }}" class="btn btn-info">Regresar</a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Guardar Cambios
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection


