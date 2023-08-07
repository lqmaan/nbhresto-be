<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    //
    public $timestamps = true;
    protected $table = "Voucher";

    protected $primaryKey = "voucher_id";
}
