@extends('layouts.master')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
     $(document).on('click', 'input[name=user_type]', function(e){
         e.preventDefault();

         var user_type = $(this).val();

         window.location.href = "{{ route('share.type') }}?user_type=" + user_type;
     });

    // $(document).on('click', 'input[name=user_type]', function(e){
    //     e.preventDefault();

    //     var user_type = $(this).val();

    //     $.ajax({
    //     url: '/api/share-type',
    //     type: 'POST',
    //     data: {
    //         user_type: user_type
    //     },
    //     success: function(response) {
    //         // Manejar la respuesta del servidor
    //         console.log("La sesión se ha iniciado supuestamente");
    //     },
    //     error: function(error) {
    //         // Manejar el error de la petición
    //         console.log("El envío ha fallado");
    //     }
    //     });
    // });

</script>



<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>
                    <input type="checkbox" name="user_type" value="particular"> Particular
                </label>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="user_type" value="empresas"> Empresa
                </label>
            </div>
        </div>

        </div>


</div>
