@extends('layout.app')

@section('title')
Todos App
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 offset-md-2">
     <h1 class="text-center my-5">Todos Page</h1>

      <div class="card card-default">
        <div class="card-header">
          Todos    
        </div>

        <div class="card-body">
          <ul class="list-group">
            @foreach($todos as $todo)
              <li class="list-group-item">{{ $todo->name }}
              @if(!$todo->completed)
                <a class="btn btn-warning btn-sm float-right" style="color:white;" href="/todos/{{ $todo->id }}/complete">Complete</a>
              @else  
               <a class="btn btn-danger btn-sm float-right" style="color:white;" href="/todos/{{ $todo->id }}/unclomplete">Uncomplete</a>
              @endif
              <a class="btn btn-primary btn-sm float-right mr-2" href="/todos/{{ $todo->id }}">View</a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>

  @endsection