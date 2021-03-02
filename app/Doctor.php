<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name', 'date','earned','status','photo','supplier_id','address','bio','description','school','university','course','startd','endd','workd','workdd','sstartd','sendd','cname'

        

    ];

      
}
