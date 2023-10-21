<?php

namespace App\Http\Controllers\Pos;

use Carbon\Carbon;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function UnitAll(){
        $unit = Unit::latest()->get();
        return view('backend.unit.unit_all',compact('unit'));
    } // End method

    public function UnitAdd(){
        return view('backend.unit.unit_add');
    }// End method

    public function UnitStore(Request $request){
        Unit::insert([
           'name' => $request->name, 
           'created_by' => Auth::user()->id, 
           'created_at' => Carbon::now(),
       ]);

       $notification = array(
           'message' => 'Unit Create Successful',
           'alert-type' => 'success',
       );
       return redirect()->route('unit.all')->with($notification);
    }// End method

    public function UnitEdit($id){
        $unit = Unit::findOrFail($id);
        return view('backend.unit.unit_edit',compact('unit'));
    }// End method

    public function UnitUpdate(Request $request){

        $unit_id = $request->id;

        Unit::findOrFail($unit_id)->update([
           'name' => $request->name, 
           
           'updated_by' => Auth::user()->id, 
           'updated_at' => Carbon::now(),
       ]);
       $notification = array(
           'message' => 'Unit Update Successful',
           'alert-type' => 'success',
       );
       return redirect()->route('unit.all')->with($notification);
    } // End method

    
    public function UnitDelet($id){
        Unit::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Unit Delete Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } // End method

}
