<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Author extends Eloquent
{
    protected $connection='mongodb';
     
    protected $guarded=[];
}