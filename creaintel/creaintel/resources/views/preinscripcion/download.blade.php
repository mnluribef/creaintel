<html>

<head>
    @yield('css')
    <style>
        @page {
            margin: 0cm 0cm;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 3cm 2cm 2cm;
        }

        .page-break {
            page-break-after: always;
        }

        .mt-3 {
            margin-top: 8px !important;
        }

        .mt-5 {
            margin-top: 16px !important;
        }

        .mt-6 {
            margin-top: 24px !important;
        }

        .mt-7 {
            margin-top: 32px !important;
        }

        .mb-5 {
            margin-bottom: 16px !important;
        }

        .mb-3 {
            margin-bottom: 8px !important;
        }

        .tab1 {
            display: inline-block;
            margin-left: 210px;

        }

        .tab2 {
            display: inline-block;
            margin-left: 125px;
            /*             line-height: 0.3; */
        }

        .tab3 {
            display: inline-block;
            margin-left: 105px;

        }

        .tab4 {
            display: inline-block;
            margin-left: 95px;

        }

        .tabfirma1 {
            display: inline-block;
            margin-left: -60px;
        }

        .tabfirma2 {
            display: inline-block;
            margin-left: -60px;
        }

        .tabfirma4 {
            display: inline-block;
            margin-left: -60px;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            text-align: center;
            line-height: 12px;
            font-size: 8;
        }

        .logo {
            width: 9%;
            top: 1.2cm;
            left: 1.85cm;
            right: 0cm;

            position: fixed;
        }


        /*         footer {
            position: fixed;
            width: 100%;
            bottom: -110px;
            height: 0px;
            border-bottom: 2px solid #ddd;
            text-align: center;
            font-size: 8;
            line-height: 20px;
        } */

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            font-size: 8;
            text-align: center;
            line-height: 20px;
            border-bottom: 2px solid #ddd;
        }

        p {
            text-decoration-line: overline;
            text-decoration-color: red;
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
            font-size: 12px;
        }

        /*         td                {
                padding: 10px 25px 10px 25px;
            } */

        .cien {
            table-layout: auto;
            width: 100%;
        }

        .border {
            border: 1px solid black;
        }

        tbody {
            font-size: 12px;
            text-align: center;
        }


        /*         .center {
            margin-left: auto;
            margin-right: auto;
        } */

        .text-right {
            text-align: right;
        }

        .title {
            text-align: center;
            justify-content: center;
            font-size: 14px;
        }
    </style>

<body>

    <header>
        <p align="center">
            <?php $image_path = '/images/logoUPTA.png'; ?>
            <img src="{{ public_path() . $image_path }}" class="logo" alt="UPT">
        <div class="mt-7">
            <br>REPÚBLICA BOLIVARIANA DE VENEZUELA<br>
            MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN UNIVERSITARIA, CIENCIA Y TECNOLOGÍA<br>
            <b>UNIVERSIDAD POLITÉCNICA TERRITORIAL DEL ESTADO ARAGUA<br>
                “FEDERICO BRITO FIGUEROA”</b><br>
            LA VICTORIA - ESTADO ARAGUA
        </div>
        </p>
        </table>
    </header>

    <div class="line"></div>
    <footer>
        <p>
            <b>DIRECCIÓN (SEDE PRINCIPAL):</b> Avenida Universidad s/n, al lado del Comando de la FAN, La Victoria, Estado Aragua.
            <br>
            Impreso por <b>{{ Auth::user()->name }} {{ Auth::user()->apellido }}</b> a las <b><?php echo date("h:i:s A"); ?></b>
        </p>

    </footer>

    <div class="title mt-6">
        <b>Planilla de Preinscripción del Proyecto</b>
    </div>


    <div class="content">
        @yield('content')

        @foreach ($preinscripcion as $preinscripcion)
        <table class="table mt-5 center">

            <tr>
                <th>Fecha:</th>
                <td>{{ date('d/m/Y') }}</td>
            </tr>

            <tr>
                <th>PNF:</th>
                <td>{{$preinscripcion->pnfs['nombre_PNF']}}</td>

                <th>Trayecto:</th>
                <td>{{$preinscripcion->trayectos['nombre_Trayecto']}}</td>

                <th>Sección:</th>
                <td>{{$preinscripcion->secciones['nombre_Seccion']}}</td>

                <th>Año:</th>
                <td>{{ date('Y') }}</td>
            </tr>
            <tr>
                <th>Turno:</th>
                <td>{{$preinscripcion->turnos['nombre_Turno']}}</td>

                <th>Sede:</th>
                <td>{{$preinscripcion->sedes['nombre_Sede']}}</td>

                <th>Profesor de Proyecto:</th>
                @foreach ($docenteasesor->unique() as $asesor)
                <td>{{$asesor->nombre}} {{$asesor->apellido}}</td>
                @endforeach

                <th>Tutor de Proyecto:</th>
                @foreach ($docentetutor as $tutor)
                <td>{{$tutor->nombre}} {{$tutor->apellido}}</td>
                @endforeach
            </tr>
            <tr>
                <th>Estado:</th>
                <td>{{$preinscripcion->estados['nombre_Estado']}}</td>

                <th>Municipio:</th>
                <td>{{$preinscripcion->municipios['nombre_Municipio']}}</td>

                <th>Parroquia:</th>
                <td>{{$preinscripcion->parroquias['nombre_Parroquia']}}</td>

                <th>Sector:</th>
                <td>{{$preinscripcion->sectores['nombre_Sector']}}</td>
            </tr>

            <!--             <tr>
                <th>Código del Proyecto:</th>
                <td>{{$preinscripcion->pnfs['abreviatura']}}{{$preinscripcion->sedes['abreviatura']}}-{{$preinscripcion->trayectos['nombre_Trayecto']}}-{{$preinscripcion->anio}}-{{$preinscripcion->correlativo}} </td>
            </tr> -->

        </table>

        <div class="title mt-5">
            <b>Integrantes del Colectivo de Estudiantes</b>
        </div>
        <table class="table border mt-3 center cien">
            <thead style="border-bottom: 1px solid;">
                <th>Apellido y Nombre</th>
                <th>C.I</th>
                <th>Teléfono</th>
                <th>Correo</th>
            </thead>
            <tr>
                <td>{{$preinscripcion->estudiantes['apellido']}} {{$preinscripcion->estudiantes['nombre']}}</td>
                <td>{{$preinscripcion->estudiantes['estudiante_ci']}}</td>
                <td>{{$preinscripcion->estudiantes->prefijo['prefijo']}} {{$preinscripcion->estudiantes['telefono']}}</td>
                <td>{{$preinscripcion->estudiantes['correo']}}</td>
            </tr>
            <tr>

                @foreach ($estudiantenumero2 as $estudiante2)

                <td>{{$estudiante2->nombre}} {{$estudiante2->apellido}}</td>
                <td>{{$preinscripcion->estudiante2_ci}}</td>
                <td>{{$preinscripcion->estudiante2->prefijo['prefijo']}} {{$estudiante2->telefono}}</td>
                <td>{{$estudiante2->correo}}</td>

                @endforeach


            </tr>
            <tr>
                @foreach ($estudiantenumero3 as $estudiante3)

                <td>{{$estudiante3->nombre}} {{$estudiante3->apellido}}</td>
                <td>{{$preinscripcion->estudiante3_ci}}</td>
                <td>{{$preinscripcion->estudiante3->prefijo['prefijo']}} {{$estudiante3->telefono}}</td>
                <td>{{$estudiante3->correo}}</td>

                @endforeach
            </tr>

        </table>

        <table class="border mt-3 cien">

            <th>Título del Proyecto:</th>

            <tr>
                <td>{{$preinscripcion->titulo_tentativo}}</td>
            </tr>

        </table>

        <div class="title mt-3 mb-3">
            <b>BREVE DESCRIPCIÓN DEL PROYECTO</b>
        </div>

        <div class="border">
            <table>
                <tr>
                    <th>Objetivo:</th>
                    <td>{{$preinscripcion->objetivo}}</td>
                </tr>
            </table>


            <table>
                <tr>
                    <th>Alcance:</th>
                    <td>{{$preinscripcion->alcance}}</td>
                </tr>
            </table>
            <table>
                <tr>
                    <th>Limitaciones:</th>
                    <td>{{$preinscripcion->limitacion}}</td>
                </tr>
            </table>
            <table>
                <tr>
                    <th>Líneas de Investigación:</th>
                    <td>{{$preinscripcion->lineaInves['descripcion']}}</td>
                </tr>
            </table>
            <table>
                <tr>
                    <th>¿Aportes a la comunidad, Personas beneficiadas? </th>
                    <td>{{$preinscripcion->aportes_comu}}</td>
                </tr>
            </table>
            <table>
                <tr>
                    <th>Acciones de Integración con la Comunidad:</th>
                    <td>{{$preinscripcion->acciones_integra}}</td>
                </tr>
            </table>
            <table>
                <tr>
                    <th>Vinculación de la investigación con el Plan de la Patria 2013-2019:</th>
                    <td>{{$preinscripcion->plan_patria}}</td>
                </tr>
            </table>
        </div>


        <div class="title mt-5">

            <b>Estudiantes</b>
        </div>
        <table class="cien border mt-3">
            <thead style="border-bottom: 1px solid;">
                <tr>
                    <th>Nombre y Apellido</th>
                    <th>C.I</th>
                    <th>Firma</th>
                </tr>
            </thead>
            <tr>
                <td>{{$preinscripcion->estudiantes['apellido']}} {{$preinscripcion->estudiantes['nombre']}}</td>

                <td>{{$preinscripcion->estudiantes['estudiante_ci']}}</td>
                <td>____________________</td>
            </tr>
            <tr>

                @foreach ($estudiantenumero2 as $estudiante2)

                <td>{{$estudiante2->apellido}} {{$estudiante2->nombre}} </td>
                <td>{{$preinscripcion->estudiante2_ci}}</td>
                <td>____________________</td>
                @endforeach
            </tr>
            <tr>
                @foreach ($estudiantenumero3 as $estudiante3)

                <td>{{$estudiante3->apellido}} {{$estudiante3->nombre}} </td>
                <td>{{$preinscripcion->estudiante3_ci}}</td>
                <td>____________________</td>
                @endforeach
            </tr>

        </table>
    </div>

    <div class="page-break"></div>


    <div class="title mt-6 mb-5">
        <b>ACTA DE APROBACIÓN DEL TEMA</b>
    </div>

    Nosotros los abajo firmantes Coordinador de investigación del PNF, Profesor de
    Proyecto, Tutor Académico y Comité Técnico, hacemos constar que queda aprobado e
    inscrito el tema del mismo.
    <br>
    <table class="mt-5">
        <tr>

            <th>Coordinador de investigación del PNF:</th>
            <th class="tabfirma1">(Firma)____________________</th>
        </tr>
        <tr>
            <th class="tab1">Nombre:</th>
        </tr>
        <tr>
            <th class="tab1">C.I:</th>
        </tr>

        </table>
    <table class="mt-5">
        <tr>
            <th>Profesor de Proyecto:</th>
            <th class="tabfirma2">(Firma)____________________</th>
        </tr>
    @foreach ($docenteasesor->unique() as $asesor)
        <tr>
            <th class="tab2">Nombre:</th>
            <td>{{$asesor->nombre}} {{$asesor->apellido}}</td>
        </tr>
        <tr>
            <th class="tab2">C.I:</th>
            <td>{{$preinscripcion['asesor_ci']}}</td>
        </tr>
    @endforeach
    </table>
    <table class="mt-5">

        <tr>
            <th>Tutor Académico:</th>
            <th class="tabfirma1">(Firma)____________________</th>
        </tr>
        <tr>
            <th class="tab3">Nombre:</th>
            @foreach ($docentetutor as $tutor)
            <td>{{$tutor->nombre}} {{$tutor->apellido}}</td>

        </tr>
        <tr>
            <th class="tab3">C.I:</th>
            <td>{{$preinscripcion['tutor_ci']}}</td>
        </tr>
        @endforeach
    </table>

    <table class="mt-5">
        <th>Comité Técnico:</th>
        <th class="tabfirma4">(Firma)____________________</th>
        <tr>
            <th class="tab4">Nombre:</th>
        </tr>
        <tr>
            <th class="tab4">C.I:</th>
        </tr>
    </table>

    @endforeach
    </div>


    <script type="text/php">
        if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Times New Roman, serif", "normal");
            $pdf->text(536, 745, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 9);
        ');
    }
</script>

    <style>
        th,
        td {
            padding: 5px;
            text-align: left;
        }
    </style>




</body>

</html>