<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aprendiendo Laravel</title>
    {{-- ESTILOS PROPIOS --}}
    <link rel="stylesheet" href="css/style.css">
    {{-- ESTILOS BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    {{-- LIBRERIA DATATABLES --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
</head>
<body>
    {{-- @DUMP ES COMO DD O VAR_DUMP --}}
    {{-- @dump($errors) --}}

    {{-- GRACIAS A WITHERRORS YA NO HACE FALTA CREAR ESTA SESIÓN DE ERROR --}}
    {{-- @if(session()->has('error'))

    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>

    @endif --}}

    @if(session()->has('success'))

    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>

    @endif

    @if(isset($errors) && $errors->any())
    <div class="alert alert-danger">
       <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
       </ul>
    </div>
    @endif

    {{-- ESTO INDICA EL MODULO QUE CAMBIA. SE QUEDA EN ESPERA --}}
   @yield('content')

   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
