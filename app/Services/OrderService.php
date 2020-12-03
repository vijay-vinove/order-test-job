<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Item;
use App\Services\Interfaces\OrderServiceInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;

/**
 * order service class to manage the order details
 */
class OrderService implements OrderServiceInterface
{

	private $productRepository;
	private $orderRepository;

    /**
     * Inject the order and product repository
     * 
     * @param interface $productRepository
     * @param interface $orderRepository
     */
	public function __construct(ProductRepositoryInterface $productRepository, OrderRepositoryInterface $orderRepository)
    {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Function to create a new order
     * 
     * @param Array $orderDetails
     */
    public function createOrder(array $orderDetails)
    {

        // create order
		$orderData = [
			'customer_name' => $orderDetails['order']['customer'],
			'address' => $orderDetails['order']['address'],
			'status' => Order::STATE_IN_PROGRESS,
            'total_price' => $orderDetails['order']['total'],
			'order_date' => date('Y-m-d')
		];

		$order = $this->orderRepository->createOrder($orderData);

        // check if product already exist
    	foreach($orderDetails['order']['items'] as $item) {

    		// find the product by SKU
    		$product = $this->productRepository->findProductBySKU($item['sku']);
    		
    		// create product if does not exist
    		if(!$product) {
    			$newProductDetails = [
    				'sku' => $item['sku'],
    				'colour' => ''
    			];
    			$product = $this->productRepository->createProduct($newProductDetails);
    		}

            // Note: As we are not managing inventory for now so I have not added the condition for the in stock or out of stock with the quantity parameter

    		// Item details to be saved
			$itemDetails = [
				'order_id' => $order->id,
				'status' => Item::STATE_ASSIGNED,
				'physical_status' => Item::STATE_PHYSICAL_IN_WAREHOUSE,
				'quantity' => $item['quantity']
			];

			// conditions to check if item already exist
			$itemStatus = [
				'product_id' => $product->id,
				'status' => Item::STATE_AVAILABLE,
			];

    		// create a new item if does not exist for the product or update the details if item is available
    		$this->productRepository->createOrUpdateItem($itemStatus, $itemDetails);
    	}
    }

}