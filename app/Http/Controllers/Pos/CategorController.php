<?php

namespace App\Http\Controllers\Pos;

use Carbon\Carbon;
use App\Models\Categor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategorController extends Controller
{
    public function CategoryAll(){
        $category = Categor::latest()->get();
        return view('backend.category.category_all',compact('category'));
    } // End method


    public function CategoryAdd(){
        return view('backend.category.category_add');
    }// End method

        public function CategoryStore(Request $request){
        Categor::insert([
           'name' => $request->name, 
           'created_by' => Auth::user()->id, 
           'created_at' => Carbon::now(),
       ]);

       $notification = array(
           'message' => 'Category Create Successful',
           'alert-type' => 'success',
       );
       return redirect()->route('category.all')->with($notification);
    }// End method

    public function CategoryEdit($id){
        $category = Categor::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));
    }// End method


    public function CategoryUpdate(Request $request){

        $category_id = $request->id;

        Categor::findOrFail($category_id)->update([
           'name' => $request->name, 
           
           'updated_by' => Auth::user()->id, 
           'updated_at' => Carbon::now(),
       ]);
       $notification = array(
           'message' => 'Category Update Successful',
           'alert-type' => 'success',
       );
       return redirect()->route('category.all')->with($notification);
    } // End method

    public function CategoryDelet($id){
        Categor::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category Delete Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } // End method
}
