<?php

namespace App\Http\Controllers\User;

use App\Domains\Trip;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripController extends Controller
{
    private $trip;

    public function __construct(Trip $trip)
    {
        $this->middleware('auth');
        $this->trip = $trip;
    }
    
    public function index()
    {
        return view('trip.index');
    }

    public function create() {

        return view('trip.create')->with(['vehicles' => auth()->user()->Vehicles->all()]);
    }

    public function store(Request $request) {

        try{

            auth()->user()->Trips()->create($request->input());

            if($request->ajax())
            {
                return response()->json([
                    'message' => 'Sucesso',
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

    public function edit() {
        return view('trip.edit');
    }

    public function update() {

    }

    public function show(){
        //return view('trip.show', compact('trip'));
        return view('trip.show');
    }


    public function delete(){

    }
}
