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
}
