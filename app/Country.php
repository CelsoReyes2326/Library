<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Country extends Eloquent
{
    protected $connection='mongodb';
     
    protected $guarded=[];

}
