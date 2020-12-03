<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\OrderServiceInterface;
use App\Models\Order;
use App\Models\Item;

class OrderController extends Controller
{

    private $orderService;

    /**
     * Class constructor
     * 
     * @param interface $orderService
     */
    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Function to create a new order
     * 
     * @param Object $request
     */
    public function CreateOrder(Request $request) {

        // Order service to create a new order
		$order = $this->orderService->createOrder($request->all());

        // check if order placed succesfully
        if($order) {
            return response()->json(['success' => 'Order created succesfully']);
        }else{
            return response()->json(['error' => 'Some error occured. Please try again laer']);
        }


    }
}
