<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderList extends Model
{
    //
    public $timestamps = true;
    protected $table = "OrderList";

    protected $primaryKey = "order_id";
}
