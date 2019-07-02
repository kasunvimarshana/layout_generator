<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationBreakdownWork extends Model
{
    //
    protected $table = "operation_breakdown_works";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'operation_breakdown_id', 'operation_pk', 'machine_type_pk', 'smv', 'actual_operator_load', 'number_of_machine_allocation', 'work_number', 'description', 'attachment', 'is_dirty');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many (inverse)
    public function operationBreakdown(){
        return $this->belongsTo('App\OperationBreakdown', 'operation_breakdown_id', 'id');
    }
    
    //one to many (inverse)
    public function machineType(){
        return $this->belongsTo('App\MachineType', 'machine_type_pk', 'name');
    }
    
    //one to many (inverse)
    public function operation(){
        return $this->belongsTo('App\Operation', 'operation_pk', 'name');
    }
    
    //one to many
    public function combineOperationWorks(){
        return $this->hasMany('App\CombineOperationWork', 'operation_breakdown_work_id', 'id');
    }
    
    //one to many
    public function layoutMachineOperations(){
        return $this->hasMany('App\LayoutMachineOperation', 'operation_breakdown_work_id', 'id');
    }
    
}
