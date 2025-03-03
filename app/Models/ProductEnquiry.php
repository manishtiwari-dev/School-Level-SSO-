<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductEnquiry extends Model
{
    use HasFactory;

    protected $table = "product_enquiry";
    protected $guarded = ['id'];
    
 
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    
}
