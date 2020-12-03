<?php

namespace App\Services\Interfaces;

/**
 * Interface to manage the order service for order details
 */
interface OrderServiceInterface
{
	/**
     * Function to create a new order
     * 
     * @param Array $orderDetails
     */
    public function createOrder(array $orderDetails);

}
