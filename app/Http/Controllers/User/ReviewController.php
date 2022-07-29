<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function ReviewStore(Request $request)
    {
        $product = $request->product_id;

        $request->validate([
            'summary' => 'required',
            'comment' => 'required',
        ]);

        Review::insert([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'summary' => $request->summary,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Review will approve by admin',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ReviewApprove($id)
    {
        Review::where('id', $id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Review approved successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function PublishReview()
    {
        $review = Review::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('backend.review.publish_review', compact('review'));
    }

    public function DeleteReview($id)
    {
        Review::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Review deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
