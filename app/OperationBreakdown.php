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
}
