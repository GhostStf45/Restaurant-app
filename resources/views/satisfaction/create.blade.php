@extends('layouts.app')

@section('content')
<div class="container mt-4 bg-white p-5 radius-small">

    <div class="card shadow">
        <div class="card-header"> <h3 class="card-title ">Formulario de satisfacción</h3></div>
        <div class="card-body">

        <form action="{{route('satisfaction.save')}}" class="row p-2">
                    @csrf
                    <div class="col-md-12">
                        <p class="font-weight-bold">1.¿Le gustó el servicio?</p>
                        <div class="custom-control custom-radio col-md-12">
                            <input type="radio" id="customRadio1" name="type_satisfaction" class="custom-control-input" value="like">
                            <label class="custom-control-label" for="customRadio1">Me gustó</label>
                        </div>
                        <div class="custom-control custom-radio col-md-12">
                            <input type="radio" id="customRadio2" name="type_satisfaction" class="custom-control-input" value="dont like">
                            <label class="custom-control-label" for="customRadio2">No me gustó</label>
                        </div>
                        <div class="custom-control custom-radio col-md-12">
                            <input type="radio" id="customRadio3" name="type_satisfaction" class="custom-control-input" value="undecided">
                            <label class="custom-control-label" for="customRadio3">Indeciso</label>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="form-group">
                            <p class="font-weight-bold">2.Comentario</p>
                            <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" id="comment" placeholder="Comentario">
                            </textarea>
                            @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-principal" data-toggle="modal" data-target="#exampleModalCenter">
                                Enviar
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark">
                                    <h5 class="modal-title text-white" id="exampleModalLongTitle">¿Estas segur@ de enviar este formulario?</h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-principal">Enviar formulario</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                                    </div>
                                </div>
                                </div>
                            </div>
                    </div>
                </form>
        </div>
    </div>

</div>
@endsection
