<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'order_description', 'quantity', 'unit_price', 'discount', 'paid', 'dalivary_date', 'order_month', 'order_year', 'order_status'
    ];
}
