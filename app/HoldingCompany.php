<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoldingCompany extends Model
{
    //
    protected $table = "holding_companies";
    protected $primaryKey = "name";
    protected $keyType = 'string';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'name', 'display_name');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many
    public function companies(){
        return $this->hasMany('App\Company', 'holding_company_pk', 'name');
    }
    
}
