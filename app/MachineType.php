<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineType extends Model
{
    //
    protected $table = "machine_types";
    protected $primaryKey = "name";
    protected $keyType = 'string';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'name', 'display_name', 'order', 'colour', 'width', 'height', 'description', 'is_active', 'is_layoutable');
    //protected $hidden = array();
    //protected $casts = array();
    
    //many to many
    public function machineLayouts(){
        return $this->morphMany('App\MachineLayout', 'layoutable');
    }
    
    //one to many
    public function operationBreakdownWorks(){
        return $this->hasMany('App\OperationBreakdownWork', 'machine_type_pk', 'name');
    }
    
}
