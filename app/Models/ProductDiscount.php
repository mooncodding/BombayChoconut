<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'id',
        'campaign_id', 
        'product_id',
        'product_discount', 
        'type',
        'discount_percentage',
        'before_price',
        'after_price',
        'created_by',
        'updated_by',
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function campaign(){
        return $this->belongsTo('App\Models\Campaign', 'campaign_id');
    }

}
