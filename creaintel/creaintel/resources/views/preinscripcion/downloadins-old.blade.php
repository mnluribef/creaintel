<html>

<head>
    @yield('css')
    <style>
        body {
            font-family: sans-serif;
        }

        @page {
            margin: 160px 50px;
        }

        header {
            position: fixed;
            left: 0px;
            top: -160px;
            right: 0px;
            height: 100px;
            text-align: center;
            font-size: 10px;
        }

        header h1 {
            margin: 10px 0;
        }

        header h2 {
            margin: 0 0 10px 0;
        }

        footer {
            position: fixed;
            left: 0px;
            bottom: -50px;
            right: 0px;
            height: 40px;
            border-bottom: 2px solid #ddd;
        }

        footer .page:after {
            content: counter(page);
        }

        footer table {
            width: 100%;
        }

        footer p {
            text-align: right;
        }

        footer .izq {
            text-align: left;
        }

        a {
            text-decoration: none;
            color: black;
        }

        /*         table td {
            padding: 5px;
        } */

        th {
            text-align: center;
        }

        .logo {
            width: 10%;
            margin-top: 40px;
            position: absolute;
        }

        .text-right {
            text-align: right;
        }

        .title {
            text-align: center;
            justify-content: center;
        }
    </style>

<body>

    <header>
        <p align="center">
            <!--             <?php $image_path = '/images/logoUPTA.png'; ?>
            <img src="{{ public_path() . $image_path }}" class="logo" alt="UPT"> -->
            <br><br><br><br>
            REPÚBLICA BOLIVARIANA DE VENEZUELA<br>
            MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN UNIVERSITARIA, CIENCIA Y TECNOLOGÍA<br>
            UNIVERSIDAD POLITÉCNICA TERRITORIAL DEL ESTADO ARAGUA<br>
            “FEDERICO BRITO FIGUEROA”<br>
            LA VICTORIA - ESTADO ARAGUA
        </p>

        </table>
    </header>
    <div class="title">
        <b>Planilla de Inscripción</b>

    </div>
    <div class="content">
        @yield('content')
        <table class="table table-bordered mt-5">
            <thead>

            </thead>
            <tbody>
                @foreach ($preinscripcion as $preinscripcion)
                @if($preinscripcion->preins=='1')

                <tr>
                    <th>Cédula</th>
                    <td>{{$preinscripcion->estudiantes['estudiante_ci']}}</td>
                </tr>
                <tr>
                    <th>Nombre:</th>
                    <td>{{$preinscripcion->estudiantes['nombre']}}</td>
                </tr>

                <tr>
                    <th>Apellido</th>
                    <td>{{$preinscripcion->estudiantes['apellido']}}</td>
                </tr>

                <tr>
                    <th>PNF</th>
                    <td>{{$preinscripcion->pnfs['nombre_PNF']}}</td>
                </tr>
                <tr>
                    <th>Sede</th>
                    <td>{{$preinscripcion->sedes['nombre_Sede']}}</td>
                </tr>
                <tr>
                    <th>Turno</th>
                    <td>{{$preinscripcion->turnos['nombre_Turno']}}</td>
                </tr>
                <tr>
                    <th>Trayecto</th>
                    <td>{{$preinscripcion->trayectos['nombre_Trayecto']}}</td>
                </tr>
                <tr>
                    <th>Sección</th>
                    <td>{{$preinscripcion->secciones['nombre_Seccion']}}</td>
                </tr>
                <tr>
                    <th>Estado</th>
                    <td>{{$preinscripcion->estados['nombre_Estado']}}</td>
                </tr>
                <tr>
                    <th>Municipio</th>
                    <td>{{$preinscripcion->municipios['nombre_Municipio']}}</td>
                </tr>
                <tr>
                    <th>Parroquia</th>
                    <td>{{$preinscripcion->parroquias['nombre_Parroquia']}}</td>
                </tr>
                <tr>
                    <th>Sector</th>
                    <td>{{$preinscripcion->sectores['nombre_Sector']}}</td>
                </tr>
                <tr>
                    <th>Tipo de Estudio</th>
                    <td>{{$preinscripcion->tipo_estudios['nombre_Tipo_Estudio']}}</td>
                </tr>
                <tr>
                    <th>Título Tentativo</th>
                    <td>{{$preinscripcion->titulo_tentativo}}</td>
                </tr>
                <tr>
                    <th>Breve Descripción</th>
                    <td>{{$preinscripcion->breve_descripcion}}</td>
                </tr>
                <tr>
                    <th>Objetivo</th>
                    <td>{{$preinscripcion->objetivo}}</td>
                </tr>
                <tr>
                    <th>Alcance</th>
                    <td>{{$preinscripcion->alcance}}</td>
                </tr>
                <tr>
                    <th>Limitaciones</th>
                    <td>{{$preinscripcion->limitacion}}</td>
                </tr>
                <tr>
                    <th>Aportes a la Comunidad</th>
                    <td>{{$preinscripcion->aportes_comu}}</td>
                </tr>
                <tr>
                    <th>Acciones de Integración</th>
                    <td>{{$preinscripcion->acciones_integra}}</td>
                </tr>
                <tr>
                    <th>Plan de la Patria</th>
                    <td>{{$preinscripcion->plan_patria}}</td>
                </tr>


                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

    <style>
        table,
        th,
        td {
            border: 0px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }
    </style>


    <footer>
        <table>
            <tr>
                <td>
                    <p style="font-size: 7; text-align: center;">
                        DIRECCIÓN (SEDE PRINCIPAL): Avenida Universidad s/n, al lado del Comando de la FAN, La Victoria, Estado Aragua. La Victoria
                    </p>
                    <p style="font-size: 7; text-align: right;" class="page"> Pág</p>
                </td>
            </tr>
        </table>
    </footer>


</body>

</html>