<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Banner;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;

class AdminController extends Controller
{
    //category_admin_category_admin_category_admin_category_admin_category_admin_
    public function view_category()
    {


        $menuList = Category::orderBy('id','asc')->get();

        return view ('admin.category',compact('menuList'));
    }
    public function add_category(Request $request){
         // Validate input
        $request->validate([
            'category' => 'required|unique:categories,category_name|max:255',
        ]);
    
        try {
            //store_data
            $category = new Category();
            $category->category_name = $request->category;
    
            if ($category->save()) {
                return redirect()->back()->with('success', 'Category added successfully!');
            } else {
                return redirect()->back()->with('warning', 'Failed to add category. Please try again.');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function destroy($id){
        //find id and delete data
        $menuList=Category::find($id);//find
        $menuList->delete();//delete
        return redirect()->back();

      
}

public function edit_category($id){
//find and show 
    $menuList=Category::find($id);
    return view ('admin.edit_category',compact('menuList'));
  
}

public function update_category(Request $request, $id)
    {
        try {
            // Validate input
            $request->validate([
                'category_name' => 'required|unique:categories,category_name|max:255',
            ]);

            // Find category and update name
            $category = Category::find($id);
            $category->category_name = $request->category_name;
            $category->save();

            return redirect(url('view_category'))->with('success', 'Category updated successfully!');

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error updating category: ' . $e->getMessage());
        }
    }



    //product_admin_product_admin_product_admin_product_admin_product_admin_product_admin_product_admin_

    public function add_product()
    {

        $menuList = Category::orderBy('id','asc')->get();
        return view ('admin.add_product',compact('menuList'));
    }

    public function store_product(Request $request){
         // Validate input
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        try {
            //store data
            $data = new Product();
            $data->title = $request->title;
            $data->description = $request->description;
            $data->price = $request->price;
            $data->quantity= $request->quantity;
            $data->category= $request->category;
            $image = $request->image;
            if($image){
                $imagename = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move('products', $imagename);
                $data->image=$imagename;
                }
            if ($data->save()) {
                return redirect()->back()->with('success', 'Product added successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to add category. Please try again.');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function  view_product ()
    {

   
        $products = Product::orderBy('id', 'desc')->paginate(3);
        return view ('admin.view_product',compact('products'));
    }


    public function destroy_product($id){
        // Find product and delete data
        $menuList=Product::find($id);//find
        //for_image_delete
        $image_path=public_path('products/'.$menuList->image);
        if (file_exists($image_path))
        {
               unlink($image_path);
        }

        $menuList->delete();//delete
        return redirect()->back();

      }
      public function edit_product($id){
      // Find product and show data
        $menuList=Product::find($id);//find

        $categories = Category::all();//category table data also pass...
        return view ('admin.edit_product',compact('menuList','categories'));
      
    }
    public function update_product(Request $request, $id)
    {
        try {
            // Validate input
            $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
                'price' => 'required|numeric',
                'quantity' => 'required|integer',
                'category' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Find category and update data
            $data = Product::find($id);
            $data->title = $request->title;
            $data->description = $request->description;
            $data->price = $request->price;
            $data->quantity= $request->quantity;
            $data->category= $request->category;
            $image = $request->image;
            if($image){
                $imagename = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move('products', $imagename);
                $data->image=$imagename;
                }
            if ($data->save()) {
                return redirect()->back()->with('success', 'Product added successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to add category. Please try again.');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error updating category: ' . $e->getMessage());
        }
    }


    public function product_search(Request $request)
    {

      $search=$request->search;
      $products=Product::where('title','LIKE','%'.$search.'%')->
      orWhere('category','LIKE','%'.$search.'%')->paginate(3);
      return view ('admin.view_product',compact('products'));

    }



 //order_admin_order_admin_ order_admin_ order_admin_ order_admin_ order_admin_    
    public function view_order()
    {

        //
        $menuList = Order::orderBy('id','desc')->paginate(5);;

        return view ('admin.order',compact('menuList'));
    }
    public function on_the_way($id){
        //find and show 
            $menuList=Order::find($id);
            $menuList->status='On The Way';
            $menuList->save();
            
            return redirect('/view_order');
          
        }
        public function delivered($id){
            //find and show 
                $menuList=Order::find($id);
                $menuList->status='Delivered';
                $menuList->save();
                
                return redirect('/view_order');
              
            }
            public function print($id){
                //Print 
                $data=Order::find($id);
                $pdf = Pdf::loadView('admin.invoice',compact('data'));
                return $pdf->download('invoice.pdf');
                  
                }


    //banner
    public function banner()
    {


        $menuList = Banner::orderBy('id','asc')->get();

        return view ('admin.banner',compact('menuList'));
    }
    public function store_banner(Request $request){
        // Validate input
       $request->validate([
           'title' => 'required|max:255',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
       ]);
       
       try {
           //store data
           $data = new Banner();
           $data->title = $request->title;
           $image = $request->image;
           if($image){
               $imagename = time() . '.' . $request->image->getClientOriginalExtension();
               $request->image->move('banners', $imagename);
               $data->image=$imagename;
               }
           if ($data->save()) {
               return redirect()->back()->with('success', 'Product added successfully!');
           } else {
               return redirect()->back()->with('error', 'Failed to add category. Please try again.');
           }
       } catch (Exception $e) {
           return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
       }
   }
   public function destroy_banner($id){
    // Find product and delete data
    $menuList=Banner::find($id);//find
    //for_image_delete
    $image_path=public_path('banners/'.$menuList->image);
    if (file_exists($image_path))
    {
           unlink($image_path);
    }

    $menuList->delete();//delete
    return redirect()->back();

  }


}
