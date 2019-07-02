<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationBreakdown extends Model
{
    //
    protected $table = "operation_breakdowns";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'style_number', 'number_of_operations', 'initial_target', 'bindle_size', 'customer', 'company_pk', 'factory_pk', 'line_pk', 'description');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many (inverse)
    public function company(){
        return $this->belongsTo('App\Company', 'holding_company_pk', 'name');
    }
    
    //one to many (inverse)
    public function factory(){
        return $this->belongsTo('App\Factory', 'holding_company_pk', 'name');
    }
    
    //one to many (inverse)
    public function line(){
        return $this->belongsTo('App\Line', 'holding_company_pk', 'name');
    }
    
    //one to many
    public function combineOperations(){
        return $this->hasMany('App\CombineOperation', 'operation_breakdown_id', 'id');
    }
    
    //one to many
    public function operationBreakdownWorks(){
        return $this->hasMany('App\OperationBreakdownWork', 'operation_breakdown_id', 'id')
    }
    
    //one to many
    public function machineLayout(){
        return $this->hasMany('App\MachineLayout', 'operation_breakdown_id', 'id');
    }
    
}
