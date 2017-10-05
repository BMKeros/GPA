<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Perfil</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <h2>Rellenar Perfil</h2><br  />
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif
      @if (\Session::has('success'))
      <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
      </div><br />
      @endif
      <form method="post" action="{{url('profiles')}}">
      {{csrf_field()}}

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">:D:</label>
            <input type="text" class="form-control" name="first_name" placeholder="primer nombre">
            <input type="text" class="form-control" name="second_name" placeholder="segundo nombre">
            <input type="text" class="form-control" name="first_surname" placeholder="primer apellido">
            <input type="text" class="form-control" name="second_surname" placeholder="segundo apellido">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="price">:p:</label>
              <input type="text" class="form-control" name="cedula" placeholder="cedula">
              <input type="text" class="form-control" name="number_phone" placeholder="numero telefonico">
              <input type="text" class="form-control" name="number_cellphone" placeholder="numero celular">
              <input type="text" class="form-control" name="hobby" placeholder="hobby">
            </div>
          </div>
        </div>  
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Crear Perfil</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
