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

                @if (session('eliminar'))
                    <script>
                        Swal.fire(
                            'Eliminado!',
                            'El rol ha sido eliminado.',
                            'success'
                        )
                    </script>
                @endif

                <h4 class="text-center">
                    Roles
                </h4>

                <section>
                    <a class="btn btn-primary" href='{{ route('roles.create') }}'>
                        Crear ROL
                    </a>
                </section>

                <section class="table table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <th>Nombre del ROL</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody>
                            @foreach ($roles as $item)
                                <tr>
                                    <td>{{ $item->nombre }}</td>
                                    <td>
                                        {{-- EDITAR --}}
                                        <form action="{{ route("roles.edit", $item->id) }}" method="GET">
                                            <button class="btn btn-warning btn-sm">
                                                Editar
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        {{-- ELIMINAR --}}
                                        <form action="{{ route("roles.delete", $item->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm" onclick="confirmSubmit()">
                                                <i class="fa-solid fa-delete-left"></i>
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>

            </div>
        </div>
    </div>
@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    function confirmSubmit(){
        const form = this.event.target.form
        this.event.preventDefault();
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede revertir!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit()
            }
        })
    }


</script>

@endsection 