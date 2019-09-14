<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    // protected $primaryKey = "iddocuments";
    protected $fillable = [
        'ref','file',
    ];
    public $timestamps = false;

    public function getRouteKeyName(){
    	return 'ref';	
    }

    
}
