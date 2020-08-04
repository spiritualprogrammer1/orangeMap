<?php

namespace App\Http\Controllers;

use App\Site;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    public function  index() {
        return response()->json(Type::get(),200);
    }

    public function  typeindex()
    {
        $types = Type::all();
        return view('insert.add_type',['types'=>$types]);
    }


        public function store_type(Request $request){


        $rules = [
//            "gestionnaire"=>'required|min:2'
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $ville = Type::create($request->all());
            $request->session()->flash('status', 'Task was successful!');
        return Redirect::back();


    }

    public function deletetype($id)
    {
        Type::destroy($id);
        return Redirect::back()->withSuccess('Success message');

    }
}
