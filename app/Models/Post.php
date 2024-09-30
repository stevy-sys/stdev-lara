<?php

namespace App\Models ;
use Stdev\Framework\Models\Models;

class Post extends Models
{
    protected $table = 'articles';
    public $id;
    public $title;
    public $descriptions;
    
}
