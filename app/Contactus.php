<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    protected $table = 'contactus';
    protected $fillable= (['f_name','email','sur_name','mobile']);
}
