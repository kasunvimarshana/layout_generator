<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    //
    protected $table = "lines";
    protected $primaryKey = "name";
    protected $keyType = 'string';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'name', 'display_name', 'colour', 'width', 'height', 'description');
    //protected $hidden = array();
    //protected $casts = array();
    
    //many to many
    public function machineLayouts(){
        return $this->morphMany('App\MachineLayout', 'layoutable');
    }
    
    //one to many
    public function operationBreakdowns(){
        return $this->hasMany('App\OperationBreakdown', 'line_pk', 'name');
    }
    
}
