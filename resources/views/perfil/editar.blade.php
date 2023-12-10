@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center border p-2">

        <div class="col-6 col-md-4">
            <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" class="rounded mx-auto d-block img-fluid" alt="Perfil template">

        </div>

        <div class="col-md-8 align-self-center">
            <div class="mb-3">
                <h4>
                    Información personal:
                </h4>
                <section class="border rounded p-2">
                    <div>
                        Nombre: {{ Auth::user()->nombre }}
                    </div>
                    <div>
                        Apellido: {{ Auth::user()->apellido }}                        
                    </div>
                    <div>
                        Email: {{ Auth::user()->email }}
                    </div>
                    <div>
                        Fecha de Nacimiento: {{ Auth::user()->fecha_nacimiento }}
                    </div>
                </section>

                <br>

                <section class="border rounded p-2">
                    <form action=" {{ route("perfil.update") }} " method="POST">
                        @csrf
                        @method('PUT')
                        <label for="exampleFormControlTextarea1" class="form-label">Presentación</label>
                        <textarea class="form-control" name='presentacion'>{{ $perfil->presentacion }}</textarea>
                        
                        <br>
                    
                        <a class="btn btn-secondary" href='{{ route('perfil.view') }}'>Volver</a>
                        <button class="btn btn-warning" href='{{ route('perfil.view') }}'>Actualizar Cambios</button>
                    </form>
                </section>                
            </div>
        </div>

    </div>
@endsection


