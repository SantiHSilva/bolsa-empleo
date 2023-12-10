@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center border p-2">

        @if ($mensaje = Session::get('mensaje'))
            <div class="alert alert-success" role="alert">
                {{ $mensaje }}
            </div>
        @endif

        <section class="d-flex justify-content-center">
            <a class="btn btn-primary" href='{{ route('perfil.edit') }}'>Editar Perfil</a>
        </section>

        <div class="col-6 col-md-4">
            <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" class="rounded mx-auto d-block img-fluid" alt="Perfil template">
        </div>

        <div class="col-md-8 align-self-center">
            <div class="mb-3">

                <br>
                
                <section class="border rounded p-2">

                    <h4>
                        Información personal:
                    </h4>

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

                <section class="border rounded container">

                    <div class="row">
                        <div class="col">
                            <h4 class="text-center p-2">
                                Skills
                            </h4>
        
                            <ol>
                                @foreach (explode(",", $perfil->skills) as $skill)
                                    <li>
                                        {{ $skill }}
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                        <div class="col border-start">
                            <h4 class="text-center p-2">
                                Roles
                            </h4>
        
                            <ol>
                                <li>Julio</li>
                                <li>Carmen</li>
                                <li>Ignacio</li>
                                <li>Elena</li>
                            </ol>
                        </div>
                    </div>

                </section>

                <br>

                <section class="border rounded p-2">
                    <h4>
                        Presentación
                    </h4>
                    <textarea class="form-control" disabled>{{ $perfil->presentacion }}</textarea>                    
                </section>                
            </div>
        </div>

    </div>
@endsection


