@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 align-self-center">
            <div class="mb-3 border p-2 rounded bg-white">

                <h4 class="text-center">
                    Crear Perfil de Empresa
                </h4>

                <form action='{{route('empresa.store')}}' method="POST">
                    @csrf

                    <div class="container text-center">
                        <div class="row">
                          <div class="col">
                            <div class="mb-3">
                                <label class="form-label">NIT de la empresa</label>
                                <input type="string" class="form-control" name='nit' required>
                                <div class="form-text">
                                  NIT = Número de Identificación Tributaria
                                </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Nombre de la empresa</label>
                                <input type="string" class="form-control" name='nombre' required>
                                <div class="form-text">
                                    Dale un nombre a tu empresa
                                </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Ciudad</label>
                                <input type="string" class="form-control" name='ciudad' required>
                                <div class="form-text">
                                    Ciudad donde se encuentra la empresa
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Telefono</label>
                                    <input type="string" class="form-control" name='telefono' required>
                                    <div class="form-text">
                                        Telefono de la empresa
                                    </div>
                                </div>
                              </div>
                              <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Dirección</label>
                                    <input type="string" class="form-control" name='direccion' required>
                                    <div class="form-text">
                                        Dirección actual de la empresa
                                    </div>
                                </div>
                              </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Fecha de creación</label>
                                    <input type="date" class="form-control" name='fecha_creacion' required>
                                    <div class="form-text">
                                        Fecha de creación de la empresa
                                    </div>
                                </div>
                            </div>
                          <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Sector</label>
                                <input type="string" class="form-control" name='sector' required>
                                <div class="form-text">
                                    Sector al que pertenece la empresa
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="mb-3 container">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control" name='descripcion'></textarea>
                        <div class="form-text">
                            Descripción de la empresa
                        </div>
                    </div>

                    <section class="d-flex justify-content-center">
                        <a href="{{route('home')}}" class="btn btn-secondary">Cancelar</a>
                        &nbsp;
                        <button type="submit" class="btn btn-primary">
                            Crear Empresa
                        </button>
                    </section>
                </form>
            </div>
        </div>
    </div>
@endsection


