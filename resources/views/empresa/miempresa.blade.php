@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center border p-2">

        <div class="col-6 col-md-4">
            <img src="https://cdn-icons-png.flaticon.com/512/5984/5984357.png" class="rounded mx-auto d-block img-fluid" alt="Empresa template">
        </div>

        <div class="col-md-8 align-self-center">
            <div class="mb-3">

                <br>
                
                <section class="border rounded p-2">

                    <h4>
                        Información publica de {{ $empresa->nombre }}.
                    </h4>

                    <div>
                        NIT: {{ $empresa->nit }}
                    </div>
                    <div>
                        Alojada en: {{ $empresa->direccion }}, {{ $empresa->ciudad }}.
                    </div>
                    <div>
                        Contacto: {{ $empresa->telefono }}.
                    </div>
                    <div>
                        Sector de la empresa: {{ $empresa->sector }}.
                    </div>
                    <div>
                        Fundada en: {{ $empresa->fecha_creacion }}.
                    </div>
                </section>

                <br>


                <section class="border rounded p-2">
                    <h4>
                        Presentación
                    </h4>
                    <textarea class="form-control" disabled>{{ $empresa->descripcion }}</textarea>                    
                </section>                
            </div>
        </div>

    </div>
@endsection


