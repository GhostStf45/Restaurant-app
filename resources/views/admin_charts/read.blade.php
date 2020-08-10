@extends('layouts.app')

@section('content')
<div class="container bg-white mt-4 radius-small p-5">
        <div class="card row shadow">
            <div class="card-header header-login">
                <h2>Monitoreo de actividades </h2>
            </div>
            <div class="col-md-12 my-2">
                <h3 class="my-4">Eliga la opcion </h3>
            <form action="" class="d-flex align-items-center justify-content-center my-3 flex-wrap">
                        <div class="custom-control custom-radio col-md-3">
                            <input type="radio" id="customRadio2" name="filter_stats" class="custom-control-input" value="admin_advice">
                            <label class="custom-control-label" for="customRadio2">Quejas mas recurrentes</label>
                        </div>
                        <div class="custom-control custom-radio col-md-3">
                            <input type="radio" id="customRadio3" name="filter_stats" class="custom-control-input" value="admin_dishes">
                            <label class="custom-control-label" for="customRadio3">Platos mas solicitados</label>
                        </div>
                        <div class="custom-control custom-radio col-md-3">
                            <input type="radio" id="customRadio4" name="filter_stats" class="custom-control-input" value="admin_years_old">
                            <label class="custom-control-label" for="customRadio4">Edad recurrente</label>
                        </div>
                    </form>
            </div>
            <div class="card-body col-md-12">
                <canvas id="myChart" class="w-100" height="400"></canvas>
            </div>
        </div>

</div>

@endsection

