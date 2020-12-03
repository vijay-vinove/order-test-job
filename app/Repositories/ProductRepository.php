<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Item;
use App\Repositories\Interfaces\ProductRepositoryInterface;

/**
 * Class to manage the product details and item details interacting with the Eloquent ORM queries
 */
class ProductRepository implements ProductRepositoryInterface
{
    /**
     * Function to find the product using SKU
     * 
     * @param String $sku
     *
     * @return Object Product
     */
    public function findProductBySKU(string $sku)
    {
        return Product::where('sku', $sku)->first();
    }

    /**
     * Function to create a new product
     * 
     * @param Array $productDetails
     *
     * @return Object Product
     */
    public function createProduct(array $productDetails)
    {
    	return Product::create($productDetails);
    }

    /**
     * Function to create or update the product using given condition
     * 
     * @param Array $condition
     * @param Array $itemDetails
     *
     * @return Object Item
     */
    public function createOrUpdateItem(array $condition, array $itemDetails)
    {
    	return Item::updateOrCreate($condition, $itemDetails);
    }

}