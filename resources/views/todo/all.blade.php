@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    You are logged in! {{ Auth::user()->name }} {{ Auth::user()->id }}
                    @include('todo.all')
                </div>
            </div>
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
                    <tr>
                      <th>xd</th>
                      <td>Mark</td>
        
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Jacob</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>xd</td>
                    </tr>
                  </tbody>
            </table>
          </div>
    </div>
</div>
@endsection


