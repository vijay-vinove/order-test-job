<?php

namespace App\Repositories\Interfaces;

use App\User;

/**
 * Interface to manage the order repository for order details
 */
interface OrderRepositoryInterface
{

	/**
     * Function to create a new order
     * 
     * @param Array $orderDetails
     */
    public function createOrder(array $orderDetails);

}
