<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table = "companies";
    protected $primaryKey = "name";
    protected $keyType = 'string';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'name', 'display_name', 'colour');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many
    public function companyDepartments(){
        return $this->hasMany('App\CompanyDepartment', 'company_pk', 'name');
    }
    
    //one to many (inverse)
    public function holdingCompany(){
        return $this->belongsTo('App\HoldingCompany', 'holding_company_pk', 'name');
    }
    
}
