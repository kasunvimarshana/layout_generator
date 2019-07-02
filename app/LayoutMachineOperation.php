<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayoutMachineOperation extends Model
{
    //
    protected $table = "layout_machine_operations";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'machine_layout_id', 'operation_breakdown_work_id', 'description');
    //protected $hidden = array();
    //protected $casts = array();
}
