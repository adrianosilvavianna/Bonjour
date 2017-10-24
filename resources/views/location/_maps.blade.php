@section('css')
    <link href="{{ asset('css/maps/estilo_route.css') }}" type="text/css" rel="stylesheet"
          xmlns="http://www.w3.org/1999/html"/>
@stop
<div id="apresentacao">


    <form method="post" action="{{ route('user.trip.store') }}" id="form_maps" >

        <fieldset>
            <div class="row">
                <div class="col-md-5 ">
                    <div class="form-group">
                        <label class="control-label">Onde Estou</label>
                        <input type="text" class="form-control" id="txtEnderecoPartida" name="txtEnderecoPartida"/>
                        {{--<input type="text" id="txtEndereco" name="txtEndereco" class="form-control" placeholder="Endereço">--}}
                    </div>
                    <input type="hidden" id="txtLatitude" name="txtLatitude" />
                    <input type="hidden" id="txtLongitude" name="txtLongitude" />
                </div>

                <div class="col-md-5 ">
                    <div class="form-group  ">
                        <label class="control-label">Para onde vou</label>
                        <input type="text" class="form-control" id="txtEnderecoChegada" name="endereco_chegada"/>
                        {{--<input type="text" id="txtEndereco" name="txtEndereco" class="form-control" placeholder="Endereço">--}}
                    </div>
                </div>

                <div class="col-md-1">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" name="btnEnviar" id="btnEnviar">Traçar Rota</button>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group  ">
                        <label class="control-label">Data de partida</label>
                        <input type="date" class="form-control" name="date" min="" id="date">
                    </div>
                </div>

                <div class="col-md-2 ">
                    <div class="form-group  ">
                        <label class="control-label">Hora de partida</label>
                        <input type="time" class="form-control" name="time" id="time">
                    </div>

                </div>

                <div class="col-md-4 ">
                    <div class="form-group  ">
                        <label class="control-label">Veículo</label>
                        <select type="text" name="gender" class="form-control" id="vehicle_id">
                            @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">Marca: {{ $vehicle->brand }} || Modelo: {{ $vehicle->model }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="btnEnviar" id="btnEnviar"/> Enviar </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <h5>Resumo da viagem</h5>
                <div class="col-md-6">
                    <div id="mapa"></div>
                </div>

                <div class="col-md-6">
                    <div id="trajeto-texto"></div>
                </div>
            </div>

        </fieldset>
    </form>

</div>

@section('scripts')
{{--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBOXe8VnXBmjiT0rIjRYIetQyLnG-WUCa4&amp;sensor=false"></script>--}}
{{--<script type="text/javascript" src="{{ asset('js/maps/jquery.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('js/maps/mapa.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('js/maps/jquery-ui.custom.min.js') }}"></script>--}}

        <!-- Maps API Javascript -->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBOXe8VnXBmjiT0rIjRYIetQyLnG-WUCa4&amp;"></script>

<!-- Arquivo de inicialização do mapa -->
<script type="text/javascript" src="{{ asset('js/maps/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/maps/mapa_route.js') }}"></script>




@show
