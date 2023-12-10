@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    You are logged in! {{ Auth::user()->nombre }} {{ Auth::user()->id }}
                </div>
            </div>
        </div>

        <div>
            <form action="{{ route("store") }}" method="POST">
                @csrf
                <label for="">Ingrese la tarea rey</label>
                <input type="text" name="todo" placeholder="ingrese la tarea :V">
                <button>enviar a la bd</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>TODO</th>
                        <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($todos as $todo)
                    <tr>
                      <th>{{ $todo->id }}</th>
                      <td>{{ $todo->todo }}</td>
                    @endforeach
                  </tbody>
            </table>
          </div>
    </div>
</div>
@endsection


