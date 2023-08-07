<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderItem extends Model
{
    //
    public $timestamps = true;
    protected $table = "OrderItem";

    protected $primaryKey = "item_id";
}
