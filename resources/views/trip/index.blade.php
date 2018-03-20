@extends('layouts.app')

@section('content')
@mobile
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li><a href="#">Viagens</a></li>
      <li class="active">Caronas</li>
    </ol>
@endmobile
        <form action="{{ route('user.trip.search') }}" method="post"  class="navbar-form navbar-right" role="search" >

                <div class="form-group ">
                    <label for="location" >{{ busquePorLocal }}: </label>
                    <input type="text" class="form-control " id="location" name="location" placeholder="">
                </div>


            <div class="form-group ">
                <label for="date" >{{ busquePorData }} </label>
                <input type="date" class="form-control right " id="date" name="date_trip">
                <span class="material-input"></span>
            </div>


            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                <i class="material-icons">search</i><div class="ripple-container"></div>
            </button>

        </form>

{{--eh obrigatorio o uso do container-fuid--}}

    <div class="container-fluid">
        @foreach($trips as $trip)
            @include('trip._cards', $trip)
        @endforeach
    </div>





@endsection

@section('scripts')

@show





