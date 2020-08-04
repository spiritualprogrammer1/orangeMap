<?php

namespace App\Imports;

use App\Site;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiteImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {


                 //and is_double($row['latitude_dd']) and is_double($row['longitude_dms'])
                 if(!empty($row['sites_code_ihs'])  )
                 {
                     return new Site([
                         'gestionnaire' => $row['proprietaire_id'],
                         'latitude' =>  $row['latitude_dd'],
                         'longitude' => $row['longitude_dms'],
//            'description' => $row[4],
                         'libelle' => $row['sites_nom_do'],
                         'ville' => $row['ville'],
                            'commune'=> $row['commune'],
                         'zone' => $row['zone'],
                         'code_site' => $row['sites_code_ihs'],
                         'priorite' =>$row['priorite'],
//                         'situation'=>$row['situation'],
//                         'localisation'=>$row['localisation'],
//                         'longitude_dms'=>$row['longitude_dmss'],
//                         'latitude_dd'=>$row['latitude_ddd'],
                         'zone_description'=>$row['zone_description'],
                         'quartier'=>$row['quartier'],
                         'gestionnaire_description'=>$row['proprietaire_pylone'],
                     ]);
                 }


    }

    public function rules(): array
    {
        return [
            'proprietaire_id' => 'required',
            'longitude_dms' => 'required',
            'latitude_dd' => 'required',
           'sites_nom_do' => 'required',
            // 'situation' => Rule::unique('sites','situation') ,
            'priorite' => 'required',
            'situation' => 'required',
        ];
    }


}
