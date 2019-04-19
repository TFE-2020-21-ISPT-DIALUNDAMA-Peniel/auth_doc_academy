<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //

    public function getRouteKeyName(){
    	return 'code';	
    }

    public function getDocument($code){
    	return self::join('promotions', 'documents.id_promotion', '=', 'promotions.id')
    				->join('annee', 'documents.id_annee', '=', 'annee.id')
                      ->where('code',$code)->first();
    }
}
