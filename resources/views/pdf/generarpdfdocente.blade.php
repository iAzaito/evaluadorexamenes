<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .titulo{
            text-align: center;
            font: 0.2rem;
            color: black;
            width: 100%;
        } 

        .title, label{
            font: 0.5rem;
            color: black;
            margin-left: 15px
        }
        
        .tabla1{
            border: 2px;
            margin: auto;
        }

        .titulos{
            background-color: rgb(99, 99, 253);
            width: 100px;
            box-shadow: 2px;
            padding: 5px;
            color: white;
        }

        .columnas{
            background-color: rgb(221, 216, 216);
        }

        .th{
            text-align: center
        }

        .label{
            text-align: center;
            margin-left: 100px;
        }
    </style>
</head>
<body>
    <div class="titulo"><h3>RESULTADOS</h3></div>
    <br>
    <table class="tabla1" border="">
        <thead>
            <tr class="titulos">
                <th style="width: 100px">Alumno</th>
                <th style="width: 100px">Examen</th>
                <th style="width: 100px">Intentos</th>
                <th style="width: 100px">Promedio</th>
            </tr>
            <tbody>
                @foreach ($resultados as $resultado)
                <tr style="text-center" class="columnas">
                    <td style="text-align: center">
                        {{$resultado->alumno}}
                    </td>
                    <td style="text-align: center">
                        {{$resultado->tituloExamen}}
                    </td>
                    <td style="text-align: center">
                        {{$resultado->intentos}}
                    </td>
                    <td style="text-align: center">
                        {{$resultado->promedio}}
                    </td>
                </tr>
                  @endforeach
            </tbody>
        </thead>
    </table>
    <br>
</body>
</html>