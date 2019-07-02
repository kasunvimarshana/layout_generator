<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    //
    protected $table = "factories";
    protected $primaryKey = "name";
    protected $keyType = 'string';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'name', 'display_name');
    //protected $hidden = array();
    //protected $casts = array();
}
