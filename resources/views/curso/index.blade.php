<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Drud</title>
</head>
<body>


    @extends("layout.app")
@section("")
 <h1>Hola desde el index del curso</h1><br>
<h1>No funciono el background</h1> 
@endsection

@section("contenedor")
    
    <h1 class="text-white p-3 text-center container-xxl bg-primary" >Ingresar Datos</h1>
    <form action="{{ route('guardar') }}" method="post" class="d-flex justify-content-md-around form-control-sm container-xxl py-3"> 
        @csrf
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control-sm bg-light ">
        <input type="number" name="edad" id="edad" placeholder="Edad" class="form-control-sm bg-light">
        <input type="number" name="telefono" id="telefono" placeholder="Teléfono" class="form-control-sm bg-light">
        <input type="email" name="correo" id="correo" placeholder="Correo" class="form-control-sm bg-light">
        <select name="id_jefe" id="id_jefe" class="form-control-sm bg-light">
            <option value="">Escoja el jefe</option>
            @foreach ($integrantes as $integrante)
            <option value="{{$integrante->id}}" >{{$integrante->nombre}}</option>
            @endforeach
        </select>
        <input type="submit" value="Crear" class="btn btn-success btn-md">
        
    </form>
    {{-- <br> --}}
    
    <table class="list-group-item-warning">
        <tr class="bg-primary text-center text-white">
            <th>Id</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Teléfono</th>
            <th>Jéfe</th>
            <th>Correo</th>        
            <th>Fecha de creación</th>
            <th>Fecha de actualización</th>
            
        </tr>
        @foreach ($integrantes as $integrante)
        <tr>
            <form action="{{ route('actualizar', ['id' => $integrante->id]) }}" method="post">
                <td>
                    @csrf
                    @method('put')
                    {{ $integrante->id }}</td>
                    <td><input type="text" name="nombre" id="nombre" placeholder="Nombre" value="{{ $integrante->nombre }}"></td>
                    <td><input type="number" name="edad" id="edad" placeholder="Edad" value="{{ $integrante->edad }}"></td>
                    <td><input type="number" name="telefono" id="telefono" placeholder="Teléfono"value="{{ $integrante->telefono }}"></td>


                    <td>
                        <select name="id_jefe" id="id_jefe" class="form-control-sm bg-light">
                            <option value="">Escoja el jefe</option>
                            @foreach ($integrantes as $int)
                            @if($integrante->id_jefe == $int->id)
                            <option value="{{$int->id}}" selected>{{$int->nombre}}</option>
                            @else
                            <option value="{{$int->id}}">{{$int->nombre}}</option>
                            @endif


                            @endforeach
                        </select>
                    </td>

                {{-- Este es el boton de ACTUALIZAR --}}

                    <td><input type="correo" name="correo" id="correo" placeholder="Correo"value="{{ $integrante->correo }}"></td>
                    <td>{{ $integrante->created_at }}</td>
                    <td>{{ $integrante->updated_at }}</td>
                    <td><input type="submit" value="Actualizar" class="btn btn-primary"></td>
                </form>

                {{-- Este es el boton de ELIMINAR --}}
                <form action="{{route('eliminar', ["id" => $integrante->id])}}" method="post">
                    <td>
                        @csrf
                        @method('delete')
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </td>
                </form>
                </tr>
        @endforeach
    </table>
@endsection


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>           
        