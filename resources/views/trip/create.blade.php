@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Nova Viagem</h4>
                        <p class="category">Texto intuitivo</p>
                    </div>
                    <div class="card-content">
                        @include('location._maps')

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')

@show