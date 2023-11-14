@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    You are logged in! {{ Auth::user()->name }} {{$user_id}}
                    @include('todo.all')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
