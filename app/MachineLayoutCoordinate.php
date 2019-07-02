<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineLayoutCoordinate extends Model
{
    //
    protected $table = "machine_layout_coordinates";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'machine_layout_id', 'position_x', 'position_y', 'position_z', 'scale_x', 'scale_y');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to one (inverse)
    public function machineLayout(){
        return $this->belongsTo('App\MachineLayout', 'machine_layout_id', 'id');
    }
    
}
