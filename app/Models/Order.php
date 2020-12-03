<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = array('customer_name', 'address', 'status', 'total_price', 'order_date');

    // constants for the status column
    const STATE_IN_PROGRESS = 1;
    const STATE_COMPLETED = 2;
    const STATE_CANCELLED = 3;
}
