@extends('adminlte::page')

@section('title', 'CreaIntel | Inicio')

@section('content_header')

    @include('usuarios/roltopmenu')
    <!-- <h1>Estudiante</h1> -->
@stop

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3></h3>
                            <h5>Proyectos Aprobados</h5>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-clipboard-check"></i>
                        </div>
                        <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h5>Proyectos Reprobados</h5>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-clipboard-list"></i>
                        </div>
                        <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h5>Proyectos por Revisar</h5>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-clipboard-question"></i>
                        </div>
                        <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php
                            echo count($docente);
                            ?></h3>

                            <h5>Docentes Activos</h5>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </div>
                        <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3> <?php
                            echo count($preinscripcion);
                            ?>
                            </h3>
                            <h5>Preinscripciones</h5>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3></h3>
                            <h5>Proyectos sin Tutor</h5>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-bookmark"></i>
                        </div>
                        <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
            <!-- /.row -->
            <!-- Main row -->



        @stop

        @section('css')
            <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">


            <link href="{{ asset('/css/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

        @stop

        @section('js')

            <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

        @stop
        </body>

        </html>
