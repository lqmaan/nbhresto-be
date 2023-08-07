<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{

    //
    public $timestamps = true;
    protected $table = "Category";

    protected $primaryKey = "category_id";
    public $incrementing = false;
}
