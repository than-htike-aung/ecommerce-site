<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function ReturnRequest()
    {
        $orders = Order::where('return_order', 1)->orderBy('id', 'DESC')->get();
        return view('backend.return_order.return_request', compact('orders'));
    }

    public function ReturnRequestApprove($order_id)

    {
        Order::where('id', $order_id)->update(['return_order' => 2]);
        $notification = array(
            'message' => 'Return Order Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function PendingReview()
    {
        $review = Review::where('status', 0)->orderBy('id', 'DESC')->get();
        return view('backend.review.pending_review', compact('review'));
    }
}
