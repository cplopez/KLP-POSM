<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function customer_sales() {
        return $this->hasMany('App\Models\CustomerSale');
    }
}
