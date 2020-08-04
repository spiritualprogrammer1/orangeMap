<?php

namespace App\Http\Controllers;

use App\Gestionnaire;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GestionnaireController extends Controller
{
    public function  index() {
        return response()->json(Gestionnaire::get(),200);
    }

    public function index_gestionnaire()
    {
        $gestionnaire = Gestionnaire::all();
        return view('insert.gestionnaire_add',compact('gestionnaire'));
    }

    public function store(Request $request){

        $rules = [
//            "gestionnaire"=>'required|min:2'
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $ville = Gestionnaire::create($request->all());
        $request->session()->flash('message', 'Enregistrement effectuer');
        return Redirect::back();
    }
}
