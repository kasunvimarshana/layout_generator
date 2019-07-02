<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CombineOperationWork extends Model
{
    //
    protected $table = "combine_operation_works";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'combine_operation_id', 'operation_breakdown_work_id', 'combine_value');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many (inverse)
    public function operationBreakdownWork(){
        return $this->belongsTo('App\OperationBreakdownWork', 'operation_breakdown_work_id', 'id');
    }
    
}
