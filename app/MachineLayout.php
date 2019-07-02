<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineLayout extends Model
{
    //
    protected $table = "machine_layouts";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'operation_breakdown_id', 'layoutable_type', 'layoutable_id', 'position_x', 'position_y', 'position_z', 'scale_x', 'scale_y', 'description');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many (inverse)
    public function layoutable(){
        return $this->morphTo('layoutable', 'layoutable_type', 'layoutable_id');
    }
    
    //one to many (inverse)
    public function operationBreakdown(){
        return $this->belongsTo('App\OperationBreakdown', 'operation_breakdown_id', 'id');
    }
    
    //one to many
    public function layoutMachineOperations(){
        return $this->hasMany('App\LayoutMachineOperation', 'machine_layout_id', 'id');
    }
    
    //one to one
    public function machineLayoutCoordinate(){
        return $this->hasOne('App\MachineLayoutCoordinate', 'machine_layout_id', 'id');
    }
    
}

