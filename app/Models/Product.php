<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'code',
        'name',
        'product_category_id',
        'product_flavour_id ',
        'product_weight',
        'price_1',
        'price_2',
        'price_3',
        'description',
        'photo',
        'is_disabled',
        'created_by',
        'updated_by',
    ];

    // public function orderDetails(){
    //     return $this->hasMany(OrderDetail::class);
    // }
    // public function stockAdjustmentDetails(){
    //     return $this->hasMany(StockAdjustmentDetail::class);
    // }
    // public function stockEntryDetails(){
    //     return $this->hasMany(StockEntryDetail::class);
    // }
    public function productImages(){
        return $this->hasMany(ProductImage::class);
    }
    public function productCategory(){
        return $this->belongsTo('App\Models\ProductCategory','product_category_id');
    }
    public function productFlavour(){
        return $this->belongsTo('App\Models\ProductFlavour','product_flavour_id');
    }

    // public function unit(){
    //     return $this->belongsTo('App\Models\Unit','unit_id');
    // }
    // public function brand(){
    //     return $this->belongsTo('App\Models\Brand','brand_id');
    // }

    // public function tax(){
    //     return $this->belongsTo('App\Models\Tax','tax_id');
    // }

    public function createdBy(){
        return $this->belongsTo('App\Models\User','created_by');
    }

    public function updatedBy(){
        return $this->belongsTo('App\Models\User','updated_by');
    }
    
}
