<?php

namespace App\Repositories\Interfaces;

use App\User;

/**
 * Interface to manage the product repository for product details
 */
interface ProductRepositoryInterface
{
	/**
     * Function to find the product using SKU
     * 
     * @param string $sku
     */
    public function findProductBySKU(string $sku);

    /**
     * Function to create a new product
     * 
     * @param Array $productDetails
     */
    public function createProduct(array $productDetails);

    /**
     * Function to create or update the product according to the given condition
     * 
     * @param Array $condition
     * @param Array $itemDetails
     */
    public function createOrUpdateItem(array $condition, array $itemDetails);
    
}
