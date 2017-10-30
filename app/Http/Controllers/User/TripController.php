<?php

namespace App\Http\Controllers\User;

use App\Domains\Traits\TripTrait;
use App\Domains\Trip;
use App\Http\Controllers\Controller;
use App\Http\Requests\TripRequest;
use Carbon\Carbon;

class TripController extends Controller
{
    private $trip;

    use TripTrait;

    public function __construct(Trip $trip)
    {
        $this->middleware('auth');
        $this->middleware('vehicle')->only('create');
        $this->middleware('profile');
        $this->trip = $trip;
    }
    
    public function index()
    {
        return view('trip.index')->with('trips', $this->trip->orderBy('id', 'desc')->get());
    }

    public function create() {
        return view('trip.create')->with(['vehicles' => auth()->user()->Vehicles->all()]);
    }


    public function store(TripRequest $request) {

        try{

            $trip = auth()->user()->Trips()->create($request->input());

            if($request->ajax())
            {
                return response()->json([
                    'message' => 'Sucesso',
                    'data' => $trip,
                    'status' => 200
                ], 200);
            }

        }catch (\Exception $e){
            if($request->ajax())
            {
                return response()->json([
                    'message' => $e->getMessage(),
                    'status' => 400
                ], 200);
            }
        }
    }

    public function edit(Trip $trip) {
        return view('trip.edit')->with(['vehicles' => auth()->user()->Vehicles->all(), 'trip' => $trip]);
    }

    public function update(TripRequest $request ,Trip $trip) {

        try{
            $dateNow = Carbon::now();
            $dateRequest = Carbon::parse($request->date.$request->time);
            $dateTrip = Carbon::parse($trip->date.$trip->time);

            if($this->getValidationDate($dateNow, $dateRequest, $dateTrip)){

                $trip->update($request->input());

                //notificar integrantes

                return back()->with('success', "Atualizado com sucesso");

            }

        }catch (\Exception $e){

            return back()->with('error', $e->getMessage());

        }
    }

    public function show(Trip $trip){

        return view('trip.show', compact('trip'));
    }

    public function delete(){

    }




}
