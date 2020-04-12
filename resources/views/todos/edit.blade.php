@extends('layout.app')

@section('title')
Create Todos
@endsection

@section('content')

<div class="row justify-content-center">
  <div class="col-md-8">

    <div class="card card-default">
      <div class="card-header">
        Create New Todo
      </div>

      <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
            <ul class="list-group">
              @foreach($errors->all() as $error)
                <li class="list-group-item">
                  {{ $error }}
                </li>
              @endforeach
            </ul>

          </div>
        @endif
      
        <form action="/update-todo" method="post">
          <div class="form-group">
            <label for="name">Name</label>
            @csrf
            <input type="text" name="name" class="form-control" placeholder="name" value="{{ $todo->name }}">
            <input type="hidden" name="todo_id" value="{{ $todo->id}}">
          </div>  


          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" cols="5" rows="5" placeholder="Description">{{ $todo->description }}</textarea>
          </div>

          <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Edit Todo</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


 
@endsection