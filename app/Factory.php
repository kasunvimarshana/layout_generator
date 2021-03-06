<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    //
    protected $table = "factories";
    protected $primaryKey = "name";
    protected $keyType = 'string';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'name', 'display_name', 'colour');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many
    public function operationBreakdowns(){
        return $this->hasMany('App\OperationBreakdown', 'factory_pk', 'name');
    }
    
}
