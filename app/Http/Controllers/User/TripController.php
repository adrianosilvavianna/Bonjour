<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('trip.index');
    }

    public function create() {
        return view('trip.create');
    }

    public function store(Request $request) {
        dd($request->input());
    }

    public function edit() {
        return view('trip.edit');
    }

    public function update() {

    }

    public function upload()
    {

    }

    public function delete(){

    }
}
