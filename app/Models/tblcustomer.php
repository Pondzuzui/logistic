<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblcustomer extends Model
{
    use HasFactory;
    public function bills()
{
    return $this->hasMany(Bill::class, 'customer_id', 'id');
}
}
