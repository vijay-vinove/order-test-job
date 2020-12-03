<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;

/**
 * Class to manage the order details interacting with the Eloquent ORM queries
 */
class OrderRepository implements OrderRepositoryInterface
{
	/**
     * Function to create a new order
     * 
     * @param Array $orderDetails
	 *
     * @return Object Order
     */
    public function createOrder(array $orderDetails)
    {
        return Order::create($orderDetails);
    }

}