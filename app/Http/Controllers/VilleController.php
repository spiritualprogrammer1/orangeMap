<?php

namespace App\Http\Controllers;

use App\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VilleController extends Controller
{

    public function ville(){
        return response()->json(Ville::get(),200);
    }

    public function findById($id){
        $ville = Ville::find($id) ;
        if(is_null($ville)){
            return response()->json("donne inexsitante",404);
        }
        return response()->json($ville,200);
    }
    public function store(Request $request){
        $rules = [
            "libelle"=>'required|min:5'
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $ville = Ville::create($request->all());
        return response()->json($ville,201);
    }

    public function update($id,Request $request, Ville $ville){
        $ville = Ville::find($id);
        if(is_null($ville)){
            return response()->json("ville inexsitante",404);
        }
        $ville->update($request->all());



        return response()->json($ville,200);
    }

    public function deletecountry($id,Request $request, Ville $ville){
        $ville = Ville::find($id);
        if(is_null($ville)){
            return response()->json("ville inexsitante",404);
        }
        $ville->delete();
        return response()->json(null,204);

    }


    public function fileList(){
        return response()->download(public_path('img/ima.jpg'),'test image');
    }

    public function saveFile(Request $request){
        $fileName= "image2.jpg";
        $path = $request->file('photo')->move(public_path('/img/'),$fileName);
        $photoUrl = url('/'.$fileName);

        return response()->json(['url'=>$photoUrl],200);
    }


}
