@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 align-self-center">
            <div class="mb-3 border p-2 rounded bg-white">

                <h4 class="text-center">
                    Editar Skill
                </h4>

                <form action='{{route('skills.update', $skill->id)}}' method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label class="form-label">Nombre de la Skill</label>
                      <input type="string" class="form-control" name='skill' required value='{{ $skill->nombre }}'>
                      <div class="form-text">Solo se almacena el nombre.</div>
                    </div>

                    <a href="{{ route('skills.index') }}" class="btn btn-info"> Regresar </a>

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


