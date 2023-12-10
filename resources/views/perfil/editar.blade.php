@extends('layouts.app')

@section('content')
<div class="container">
    <form action=" {{ route("perfil.update") }} " method="POST">
        @csrf
        @method('PUT')
    <div class="row justify-content-center border p-2">


            <section class="d-flex justify-content-center">

                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-secondary" href='{{ route('perfil.view') }}'>
                        Volver a mi perfil
                    </a>
                    <button class="btn btn-primary" href='{{ route('perfil.update') }}'>
                        Actualizar cambios
                    </button>
                </div>
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
                            <div class="col align-self-center">
                                <h4 class="text-center p-2">
                                    Skills
                                </h4>

                                <section class="d-flex justify-content-center">
                                        <div class="btn-group">
                                            <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                Lista de Skills
                                            </button>
                                            <ul class="dropdown-menu"
                                                {{-- Show 5 con barra de desplazamiento --}}
                                                style="height: 150px; overflow-y: scroll;"
                                                >
                                                @foreach ($skills as $item)
                                                    <li>
                                                        <section class="dropdown-item">
                                                            @if (in_array($item->nombre, explode(",", $perfil->skills)))
                                                                <input class="form-check-input" type="checkbox" value="" id="{{$item->id}}" name={{$item->nombre}} checked>
                                                            @else
                                                                <input class="form-check-input" type="checkbox" value="" id="{{$item->id}}" name={{$item->nombre}}>
                                                            @endif
                                                            <label class="form-check-label border" for="{{$item->id}}">
                                                                {{$item->nombre}}
                                                            </label>
                                                        </section>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                </section>
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
                        <textarea class="form-control" name='presentacion'>{{ $perfil->presentacion }}</textarea>
                    </section>                
                </div>
            </div>        
        </form>
    </div>
@endsection


