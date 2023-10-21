<?php

namespace App\Http\Controllers\Pos;

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Categor;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function ProductAll(){
        $product = Product::latest()->get();
        return view('backend.product.product_all',compact('product'));
    } // End method

    public function ProductAdd(){

        $supplier = Supplier::all();
        $category = Categor::all();
        $unit = Unit::all();
        return view('backend.product.product_add',compact('supplier','category','unit'));
    }// End method

    public function ProductStore(Request $request){
        Product::insert([
            'name' => $request->name, 
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'quantity' => '0',
            'created_by' => Auth::user()->id, 
            'created_at' => Carbon::now(),
       ]);

       $notification = array(
           'message' => 'Product Create Successful',
           'alert-type' => 'success',
       );
       return redirect()->route('product.all')->with($notification);
    }// End method

    public function ProductEdit($id){
        $supplier = Supplier::all();
        $category = Categor::all();
        $unit = Unit::all();
        $product = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('supplier','category','unit','product'));
    }// End method

    public function ProductUpdate(Request $request){

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'name' => $request->name, 
            'name' => $request->name, 
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
          
            'updated_by' => Auth::user()->id, 
            'updated_at' => Carbon::now(),
       ]);
       $notification = array(
           'message' => 'Product Update Successful',
           'alert-type' => 'success',
       );
       return redirect()->route('product.all')->with($notification);
    } // End method

    public function ProductDelet($id){
        Product::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Product Delete Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } // End method
}
