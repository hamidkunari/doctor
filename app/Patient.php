<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable  = ['pname','photo','age','address','phone','visit','paid','status','doctor_id'];



}
