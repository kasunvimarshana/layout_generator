<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CombineOperation extends Model
{
    //
    protected $table = "combine_operations";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'operation_breakdown_id', 'operation_combine_type_id', 'colour', 'description');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many (inverse)
    public function operationBreakdown(){
        return $this->belongsTo('App\OperationBreakdown', 'operation_breakdown_id', 'id');
    }
    
    //one to many (inverse)
    public function operationCombineType(){
        return $this->belongsTo('App\OperationCombineType', 'operation_combine_type_id', 'id');
    }
    
}
