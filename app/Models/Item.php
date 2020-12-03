<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = array('order_id', 'product_id', 'status', 'physical_status', 'quantity');
    
    // constants for the status and physical status column
	const STATE_AVAILABLE = 1;

	const STATE_ASSIGNED = 2;

	const STATE_PHYSICAL_TO_ORDER = 1;

	const STATE_PHYSICAL_IN_WAREHOUSE = 2;
	
	const STATE_PHYSICAL_DELIVERED = 3;

}
