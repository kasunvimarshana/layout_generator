<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationCombineType extends Model
{
    //
    protected $table = "operation_combine_types";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'name', 'display_name');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many
    public function combineOperations(){
        return $this->hasMany('App\CombineOperation', 'operation_combine_type_id', 'id');
    }
    
}
