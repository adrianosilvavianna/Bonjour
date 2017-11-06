@extends('layouts.app')

@section('css')
    <style>

    </style>
@show

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-12 col-sm-12">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="fa fa-map-o"></i>
                </div>
                <div class="card-content">
                    <h3 class="title">Viagem</h3>
                    <p class="category"><i class="material-icons">airline_seat_recline_extra</i><strong>{{ $trip->num_passenger }}</strong> Lugares Disponíveis</p>
                    <p class="card-content">
                        <i class="material-icons">room</i> <strong>De :</strong> {{ $trip->arrival_address }} <br/>
                        <i class="material-icons">radio_button_checked</i> <strong>Para :</strong> {{ $trip->exit_address }} <br>
                        <i class="material-icons">today</i> <strong>Data :</strong> {{ with(new DateTime($trip->date))->format('d/m/Y') }} <br>
                        <i class="material-icons">timer</i> <strong>Horário :</strong> {{ $trip->time }} <br>
                    </p>
                </div>

                <div class="card-footer ">

                    @if(auth()->user()->id == $trip->User->id)
                        <a href="{{ route('user.trip.edit', $trip) }}" class="btn btn-info btn-round pull-right">Editar Viagem</a>
                    @else

                        @if($trip->searchMeeting())
                            <a href="{{ route('user.meeting.cancel', $trip) }}" class="btn btn-danger btn-round pull-right">Cancelar Viagem</a>
                        @else
                            <a href="{{ route('user.meeting.store', $trip) }}" class="btn btn-success btn-round pull-right">Reservar Viagem</a>
                        @endif

                    @endif



                </div>

            </div>
        </div>
    </div>

<div class="row">

    @foreach($trip->Meetings as $meeting)
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#pablo">
                        <img class="img" src="{{ asset($meeting->User->Profile->photo_address) }}"/>
                    </a>
                </div>

                <div class="content">
                    <h4 class="card-title">{{ $meeting->User->Profile->name }} {{ $meeting->User->Profile->last_name }}</h4>
                    <h5 class="category text-gray">{{ $meeting->User->Profile->age }} Anos</h5>
                    <h6 class="category text-gray">3 Avaliações - Nota 3,5</h6>
                    <p class="card-content">
                        <strong> {{ $meeting->User->Profile->phone }}</strong><br>
                        <strong>{{ $meeting->User->email }}</strong><br>
                    </p>
                    <a href="#" id="approved" class="btn btn-success btn-round" data-meeting="{{ $meeting->id }}" data-user="{{ $meeting->User->id }}">Aceitar</a>
                    <a href="#" id="disapproved" class="btn btn-danger btn-round"data-meeting="{{ $meeting->id }}" data-user="{{ $meeting->User->id }} ">Recusar</a>
                </div>
            </div>
        </div>
    @endforeach

</div>


@endsection

@section('scripts')

    <script>
        $("#approved").click(function(){

            var parm = {user_id: $(this).data('user'), meeting_id: $(this).data('meeting')}

            $.ajax({
                type: 'POST',
                url: 'user/meeting/approved',
                data: parm,
                    success: function(data) {
                        console.log(data);
                }
            });

        })
    </script>

@show





