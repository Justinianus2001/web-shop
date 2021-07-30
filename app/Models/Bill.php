<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = "bills";

    public function bill_detail() {
        return $this->hasMany('App\Models\BillDetail', 'id_bill', 'id');
    }

    public function customer() {
        return $this->belongsTo('App\Models\Customer', 'id_customer', 'id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
}
