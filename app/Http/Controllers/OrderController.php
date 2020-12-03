<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\OrderServiceInterface;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Support\Facades\Validator;

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

        // check for the input validations
        $validator = Validator::make($request->all(), [
            'order' => 'required',
            'order.customer' => 'required',
            'order.address' => 'required',
            'order.items' => 'required'
        ],[
            'order.customer.required' => 'Customer name is required',
            'order.address.required' => 'Customer address is required',
            'order.items.required' => 'Order items are required'
        ]);

        // Return errors if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        // Order service to create a new order
		$order = $this->orderService->createOrder($request->all());

        // check if order placed succesfully
        if($order) {
            return response()->json(['success' => 'Order created succesfully']);
        }else{
            return response()->json(['error' => 'Some error occured. Please try again later']);
        }


    }
}
