<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\Categor;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function product(){
        return $this->belongsTo(Product::class,'supplier_id','id');
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }

     public function unit(){
        return $this->belongsTo(Unit::class,'unit_id','id');
    }

     public function category(){
        return $this->belongsTo(Categor::class,'category_id','id');
    }
}
