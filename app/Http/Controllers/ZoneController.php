<?php

namespace App\Http\Controllers;

use App\Type;
use App\User;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class ZoneController extends Controller
{
    public function  index() {
        return response()->json(Zone::get(),200);
    }

    public function  indexzone(){
        $zones = Zone::all();

        return view('insert.zone_add',compact("zones"));
    }

    public function store(Request $request){

        $rules = [
//            "gestionnaire"=>'required|min:2'
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $ville = Zone::create($request->all());
        $request->session()->flash('message', 'Enregistrement effectuer');
        return Redirect::back();
    }

    public function index_register()
    {
        $users = User::all();
        return view('insert.register_user',compact('users'));
    }

    public function deleteuser($id)
    {
        User::destroy($id);
        $value= "suppression effectuer";

        return Redirect::back()->withSuccess('Success message');
    }

    public function deletezone($id)
    {
        Zone::destroy($id);
        return Redirect::back()->withSuccess('Success message');
    }
}
