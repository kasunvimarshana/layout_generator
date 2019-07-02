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
}

