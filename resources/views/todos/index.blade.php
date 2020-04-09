<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
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
              <a class="btn btn-primary btn-sm float-right" href="/todos/{{ $todo->id }}" target="_blank">View</a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>