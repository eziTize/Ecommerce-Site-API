<?php

namespace App\Http\Controllers;

use JWTAuth;
use stdClass;
use App\User;
use App\Order;
use Validator;
use Carbon\Carbon;
use App\OrderInquiry;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class OrderController extends Controller
{
    /* Order List API */
    public function index()
    {

        $u = JWTAuth::parseToken()->authenticate();
        $user = User::where('id',$u->id)->first();

        $orders = Order::where('user_id', $user->id)->get();

        return response()->json([
            'status' => true,
            'message' => 'Order List',
            'data' => $orders
        ], Response::HTTP_OK);
    }
    
    /* Single Order API */
    public function show($order_id)
    {
        
        $order = Order::where('id', $order_id)->first();

        return response()->json([
            'status' => true,
            'message' => 'Order Single',
            'data' => $order
        ], Response::HTTP_OK);
    }

    /* Create Order Inquiry API */
    public function inquire(Request $request, $order_id)
    {
        
        $order = Order::where('id', $order_id)->first();

        $o_inq = new OrderInquiry;
        $o_inq->inq_sub = $request->input('inq_sub');
        $o_inq->inq_body = $request->input('inq_body');
        $o_inq->order_id = $order->id;
        $o_inq->save();

        return response()->json([
            'status' => true,
            'message' => 'Order Inquiry',
            'data' => $o_inq
        ], Response::HTTP_OK);
    }

    /* Check Order Inquiries API */
    public function checkInquiry($order_id)
    {
        $o_inq = OrderInquiry::where('order_id', $order_id)->get();

        return response()->json([
            'status' => true,
            'message' => 'Check Inquiry',
            'data' => $o_inq
        ], Response::HTTP_OK);
    }

    /* Check Single Order Inquiry API */
    public function showInquiry($inq_id)
    {
        $o_inq = OrderInquiry::where('id', $inq_id)->get();

        return response()->json([
            'status' => true,
            'message' => 'Single Inquiry',
            'data' => $o_inq
        ], Response::HTTP_OK);
    }

}
