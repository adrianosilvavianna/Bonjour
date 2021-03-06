<?php

namespace App\Http\Controllers\User;

use App\Domains\Vehicle;
use App\Domains\VehicleModelYear;
use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneRequest;
use App\Domains\Phone;
use App\Http\Requests\VehicleRequest;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    private $vehicle;

    public function __construct(Vehicle $vehicle){
        $this->middleware('auth');
        $this->vehicle = $vehicle;
    }

    public function index(){
        return view('vehicle.index')->with('vehicles', auth()->user()->Vehicles);
    }

    public function create() {
        return view('vehicle.create');
    }

    public function store(VehicleRequest $request) {
      try{

        $vehicle = auth()->user()->Vehicles()->create($request->input());

        if($request->ajax())
        {
            return response()->json([
                'message' => "Veiculo cadastrado com sucesso",
                'data' => $vehicle,
                'status' => 200
            ], 200);
        }

        return redirect()->route('user.vehicle.index')->with('success', 'Salvo com sucesso');
      }catch (\Exception $e){
        if($request->ajax())
        {
            return response()->json([
                'message' =>  'Ops, algo deu errado',
                'data' => $e->getMessage(),
                'status' => 400
            ], 400);
        }
          return back()->withInput()->with('error',  'Ops, algo deu errado, verifique os dados e tente novamente');
      }

    }

    public function edit(Vehicle $vehicle) {

        return view('vehicle.edit')->with('vehicle', $vehicle);
    }

    public function update(VehicleRequest $request, Vehicle $vehicle) {
        try{
            $vehicle->update($request->input());
            if($request->ajax())
            {
                return response()->json([
                    'message' => "Veiculo atualizado com sucesso",
                    'data' => $vehicle,
                    'status' => 200
                ], 200);
            }
            return redirect()->route('user.vehicle.index')->with('success',"Veiculo atualizado com sucesso");

        }catch (\Exception $e){
            if($request->ajax())
            {
                return response()->json([
                    'message' =>  'Ops, algo deu errado',
                    'data' => $e->getMessage(),
                    'status' => 400
                ], 400);
            }
            return back()->withInput()->with('error',  'Ops, algo deu errado, verifique os dados e tente novamente');
        }
    }

    public function delete(Vehicle $vehicle) {
        try{
            $vehicle->delete();
            return back()->with('success', 'Excluido com sucesso');
        }catch (\Exception $e){
            return back()->withInput()->with('error',  'Ops, algo deu errado, tente novamente');
        }

    }

    public function getBrand(Request $request){
        if($request->ajax())
        {
            return response()->json([
                'data' => VehicleModelYear::getMarcas(),
                'status' => 200
            ], 200);
        }
        return VehicleModelYear::getMarcas();
    }

    public function getModel(Request $request){

        if($request->ajax())
        {
            return response()->json([
                'data' => VehicleModelYear::getModels($request->brand),
                'status' => 200
            ], 200);
        }
        return VehicleModelYear::getModels($request->brand);
    }

    public function getYear(Request $request){
        if($request->ajax())
        {
            return response()->json([
                'data' => VehicleModelYear::getYear($request->model),
                'status' => 200
            ], 200);
        }
        return VehicleModelYear::getYear($request->model);
    }
}
