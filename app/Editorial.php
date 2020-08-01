<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Editorial extends Eloquent
{
    protected $connection='mongodb';
     
    protected $guarded=[];
}
