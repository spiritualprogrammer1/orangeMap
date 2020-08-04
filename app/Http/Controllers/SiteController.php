<?php

namespace App\Http\Controllers;

use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    public function index(){
        return response()->json(Site::get(),200);
    }

    public function findById($id){
        $sites= Site::find($id) ;
        if(is_null($sites)){
            return response()->json("site inexsitante",404);
        }
        return response()->json($sites,200);
    }

    public function store(Request $request){
        $rules = [
//            "gestionnaire"=>'required|min:2'
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $ville = Site::create($request->all());
        return response()->json($ville,201);
    }

    public function update($id,Request $request, Site $site){
        $site = Site::find($id);
        if(is_null($site)){
            return response()->json("ville inexsitante",404);
        }
        $site->update($request->all());

        return response()->json($site,200);
    }

    public function deletesite($id,Request $request){
        $site = Site::find($id);
        if(is_null($site)){
            return response()->json("ville inexsitante",404);
        }
        $site->delete();
        return response()->json(null,204);

    }

    public function searchSite($data){
        $sites = Site::where('libelle','Like','%'.$data.'%')->Orwhere('gestionnaire','LIKE','%'.$data.'%')
                                                            ->Orwhere('ville','LIKE','%'.$data.'%')->get();

        //$sites =  Site::find($data);
        if(is_null($sites)){
            return response()->json("site inexsitante",404);
        }
        return response()->json($sites,200);
    }

    public function index_site()
    {
        return view('insertdata');
    }

    public function listesite()
    {
        $sites = Site::all();
        return view('insert.listesite',compact('sites'));
    }

    public function deletesites($id){
        Site::destroy($id);
        return Redirect::back()->withSuccess('Success message');
    }

}
