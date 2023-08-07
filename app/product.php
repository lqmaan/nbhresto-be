<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    public $timestamps = true;
    protected $table = "Products";

    protected $primaryKey = "product_id";

    public $incrementing = false;
}
