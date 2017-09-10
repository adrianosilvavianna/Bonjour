<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $profile;

    public function __construct(Profile $profile)
    {
        $this->middleware('auth');
        $this->profile = $profile;
    }

    public function index()
    {
        if(auth()->User()->Profile){
            return view('profile.index')->with('profile', auth()->user()->Profile);
        }
        return view('profile.create');
    }

    public function create() {
        return view('profile.create');
    }

    public function store(Request $request) {

        $this->profile->create($request->input());

        return view('profile.index')->with('success', config('alert.message.success'));
    }

    public function edit(Profile $profile) {

        return view('profile.edit')->with('profile', $profile);
    }



    public function update(ProfileRequest $request, Profile $profile) {
        $profile->update($request->input());
        return view('profile.edit')->with('success', config('alert.message.success'));
    }

    public function upload(Request $request,Profile $profile)
    {
        if ($request->file->isValid()) {

            $path   = $request->file->store('comprovantes');

            $profile->paid_at  = date('Y-m-d');
            $profile->src_file = $path;
            $profile->save();

            return back()->with('success','Enviado');
        }

        return back()->with('errors', 'Arquivo Invalido');

    }

}
