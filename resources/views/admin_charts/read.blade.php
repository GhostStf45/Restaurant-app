@extends('layouts.app')

@section('content')
<div class=" bg-white radius-small p-5 bg1-pattern">
        <div class="card row shadow">
            <div class="card-header header-login">
                <h2>Monitoreo de actividades </h2>
            </div>
            <div class="col-md-12 my-2">
            <form action="" class="my-4">
                <div class="form-group">
                    <label for="" class="font-weight-bold">Mas solicitados</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="filter_stats" class="custom-control-input" value="admin_advice">
                        <label class="custom-control-label" for="customRadio2">Quejas mas recurrentes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio3" name="filter_stats" class="custom-control-input" value="admin_dishes">
                        <label class="custom-control-label" for="customRadio3">Platos mas solicitados</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio4" name="filter_stats" class="custom-control-input" value="admin_districts">
                        <label class="custom-control-label" for="customRadio4">Distritos que mas consumen</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio7" name="filter_stats" class="custom-control-input" value="admin_age_frec">
                        <label class="custom-control-label" for="customRadio7">Edad que mas consumen</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="font-weight-bold">Filtrar ultimos 7 dias</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio5" name="filter_stats" class="custom-control-input" value="admin_advice_last7Days">
                        <label class="custom-control-label" for="customRadio5">Recomendaciones y Quejas</label>
                    </div>

                </div>
                <div class="form-group">
                    <label for="" class="font-weight-bold">Dias (Lunes-Viernes) con más...</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio6" name="filter_stats" class="custom-control-input" value="admin_products_last7Days">
                        <label class="custom-control-label" for="customRadio6">Pedidos</label>
                    </div>
                </div>
            </form>
            </div>
            <div class="card-body col-md-12">
                <canvas id="myChart" class="w-100" height="400"></canvas>
            </div>
        </div>

</div>

@endsection

