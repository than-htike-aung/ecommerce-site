<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;
use phpDocumentor\Reflection\Types\Null_;

class IndexController extends Controller
{
    public function index(){
        $data['products'] = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
      $data['sliders']  = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
      $data['categories'] = Category::orderBy('category_name_en', 'ASC')->get();
     
      $data['featured'] = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
      $data['hot_deals'] = Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(3)->get();
      $data['special_offer'] = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(6)->get();
      $data['special_deals'] = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $data['skip_category_0'] = Category::skip(0)->first();
        $skip_category_0 = Category::skip(0)->first();
        $data['skip_product_0'] = Product::where('status', 1)
                ->where('category_id', $skip_category_0->id )->orderBy('id', 'DESC')->get();
        // return $skip_category->id;
        // die();
        $data['skip_category_1'] = Category::skip(1)->first();
        $skip_category_1 = Category::skip(1)->first();
        $data['skip_product_1'] = Product::where('status', 1)->where('category_id', $skip_category_1->id)->orderBy('id', 'DESC')->get();

        $data['skip_brand_1'] = Brand::skip(1)->first();
        $skip_brand_1 = Brand::skip(1)->first();
        $data['skip_brand_product_1'] = Product::where('status', 1)->where('brand_id', $skip_brand_1->id)->orderBy('id', 'desc')->get();
          
        return view('frontend.index', $data);
    }

    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function UserProfile(){
        //$id = Auth::user()->id;
        $user = User::find(Auth::user()->id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

       // $request->session()->flash('success', 'User Profile updated successfully');
        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    } //end method

    public function UserChangePassword(){
        $user = User::find(Auth::user()->id);
        return view('frontend.profile.change_password', compact('user'));
    }

   
    public function  UserPasswordUpdate(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
           
            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
        }
    }

    public function ProductDetails($id, $slug){
        $product = Product::findOrFail($id);
        $multiImg = MultiImg::where('product_id', $id)->get();

        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_my = $product->product_color_my;
        $product_color_my = explode(',', $color_my);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_my = $product->product_size_my;
        $product_size_my = explode(',', $size_my);

        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id', $cat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();

        return view('frontend.product.product_details', 
        compact('product', 'multiImg', 'product_color_en', 'product_color_my', 'product_size_en', 'product_size_my', 'relatedProduct'));
    }

    public function TagWiseProduct($tag){
        $products = Product::where('status', 1)
                ->where('product_tags_en', $tag)
                ->where('product_tags_my', $tag)
                ->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
           return view('frontend.tags.tags_view', compact('products', 'categories'));     
    }

    // SubCategory Wise Data
    public function SubCatWiseProduct($subcat_id, $slug){
        $products = Product::where('status', 1)
                ->where('subcategory_id', $subcat_id)
                ->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('frontend.product.subcategory_view', compact('products', 'categories'));
    }

    // SubSubCategory Wise Data
    public function SubSubCatWiseProduct($susubcat_id, $slug){
        $products = Product::where('status', 1)
                ->where('subsubcategory_id', $susubcat_id)
                ->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('frontend.product.sub_subcategory_view', compact('products', 'categories'));
        
    }

    // Product view with ajax
    public function ProductViewAjax($id){
        $product = Product::with('category', 'brand')->findOrFail($id);
        $color = $product->product_color_en;
        $product_color = explode(',', $color);

        $size = $product->product_size_en;
        $product_size = explode(',', $size);

        return response() -> json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size
        ));
    }
}
