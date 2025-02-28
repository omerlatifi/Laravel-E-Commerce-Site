<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class HomeController extends Controller
{
    public function index()
    {
      $user=User::Where ('usertype','user')->count();//usertype==user count 
      $product=Product::all()->count();
      $order=Order::all()->count();
      $delivered=Order::Where ('status','delivered')->count();//status==delivered


        return view ('admin.index',compact('user','product','order','delivered'));
    }
    public function home()
    {
        $products=Product::orderBy('id', 'desc')->get();
        $banners=Banner::latest()->get();
        
     //For Cart Number
        if(Auth::id()){
            $user=Auth::user();
            $user_id=$user->id;
            $count=Cart::Where ('user_id',$user_id)->count();
         }
         else
         {
           $count='';
         }


        return view ('home.index',compact('banners','products','count'));
    }
    public function login_home()
    {
        $products=Product::orderBy('id', 'desc')->get();
        $banners=Banner::latest()->get();
  //For Cart Number
     if(Auth::id()){
        $user=Auth::user();
        $user_id=$user->id;
        $count=Cart::Where ('user_id',$user_id)->count();
     }
     else
     {
       $count='';
     }
        return view ('home.index',compact('products','count','banners'));
    }
    public function details_product($id){
  //For Cart Number
        $products=Product::find($id);
        $all_product=Product::orderBy('id', 'desc')->get();

        if(Auth::id()){
            $user=Auth::user();
            $user_id=$user->id;
            $count=Cart::Where ('user_id',$user_id)->count();
         }
         else
         {
           $count='';
         }
        return view ('home.details_product',compact('products','count','all_product'));
      
    }
    //when click add to cart
    public function cart_product($id){

        $product_id=$id;
        $user=Auth::user();
        $user_id=$user->id;
        $data=new cart();
        $data->product_id=$product_id;
        $data->user_id=$user_id;
        $data->save();
       
        toastr()->timeout(10000)->closeButton()->addSuccess('PRODUCT ADDED Successfully');
        return redirect()->back();
      
    }
    //when click cart icon
    public function my_cart(){


        if(Auth::id()){
            $user=Auth::user();
            $user_id=$user->id;
            $count=Cart::Where ('user_id',$user_id)->count();
            $cart=Cart::Where ('user_id',$user_id)->get();
         }
         else
         {
           $count='';
         }
        return view ('home.my_cart',compact('count','cart'));
      
    }
//when clic iten delete in cart 
    public function destroy_cart($id){

        $menuList=Cart::find($id);
        $menuList->delete();
        return redirect()->back();

      
    }

//when Pay Cash click
public function confirm_order(Request $request){

  $name = $request->name;
  $address = $request->address;
  $phone = $request->phone;
  $code= $request->code;
  $user=Auth::user();
  $user_id=$user->id;
  $cart=Cart::Where ('user_id',$user_id)->get();
  foreach($cart as $carts)
  {
    $data = new Order;
    $data->name = $name;
    $data->address = $address;
    $data->phone = $phone;
    $data->code= $code;
    $data->user_id= $user_id;
    $data->product_id=$carts->product_id;
    $data->save();
  }
  //when order done cart data remove 
  foreach($cart as $deletes)
   $data=Cart::find($deletes->id);
   $data->delete();
  

  toastr()->timeout(10000)->closeButton()->addSuccess('Orde Successfully Done');
  return redirect('home.index');
  }  
//when click My Order
public function my_order(){


  if(Auth::id()){
      $user=Auth::user()->id;
    
      $count=Cart::Where ('user_id',$user)->count();
      $order=Order::Where ('user_id',$user)->get();

   }
   else
   {
     $count='';
   }
  return view ('home.my_order',compact('count','order'));

   }
public function destroy_order($id){

  $menuList=Order::find($id);
  $menuList->delete();
  return redirect()->back();

  }
//stripe_stripe_stripe_stripe_stripe_stripe_stripe_stripe_stripe_stripe_stripe_stripe_stripe_stripe_
public function stripe($value)

    {

        return view('home.stripe',compact('value'));

    }


    public function stripePost(Request $request ,$value)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $value * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from itsolutionstuff.com." 

        ]);

          $name = Auth::user()->name;
          $address =Auth::user()->address;
          $phone = Auth::user()->phone;
          $user=Auth::user();
          $user_id=$user->id;
          $cart=Cart::Where ('user_id',$user_id)->get();
          foreach($cart as $carts)
          {
            $data = new Order;
            $data->name = $name;
            $data->address = $address;
            $data->phone = $phone;
            //$data->code= $code;
            $data->user_id= $user_id;
            $data->product_id=$carts->product_id;
            $data->payment_status="Paid";
            $data->save();
          }
          //when order done cart data remove 
          foreach($cart as $deletes){
           $data=Cart::find($deletes->id);
           $data->delete();
          }
        
          toastr()->timeout(10000)->closeButton()->addSuccess('Orde Successfully Done');
          return redirect('my_order');
            
      



    }
 
    public function search(Request $request)
    {
      if(Auth::id()){
        $user=Auth::user();
        $user_id=$user->id;
        $count=Cart::Where ('user_id',$user_id)->count();
        $cart=Cart::Where ('user_id',$user_id)->get();
     }
     else
     {
       $count='';
     }

      $search=$request->search;
      $products=Product::where('title','LIKE','%'.$search.'%')->paginate(3);
      return view ('home.shop',compact('products','count'));

    }
    //shop_
    public function shop()
    {
        $products=Product::orderBy('id', 'desc')->get();
  //For Cart Number
     if(Auth::id()){
        $user=Auth::user();
        $user_id=$user->id;
        $count=Cart::Where ('user_id',$user_id)->count();
     }
     else
     {
       $count='';
     }
        return view ('home.shop',compact('products','count'));
    }
    public function help()
    {
        
  //For Cart Number
     if(Auth::id()){
        $user=Auth::user();
        $user_id=$user->id;
        $count=Cart::Where ('user_id',$user_id)->count();
     }
     else
     {
       $count='';
     }
        return view ('home.help',compact('count'));
    }


  
}


