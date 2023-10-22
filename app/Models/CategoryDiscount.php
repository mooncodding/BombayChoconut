<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDiscount extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'campaign_id', 
        'category_id', 
        'type',
        'discount_percentage',
        'discount_price',
    ];

    public function category(){
        return $this->belongsTo('App\Models\ProductCategory', 'category_id');
    }

    public function campaign(){
        return $this->belongsTo('App\Models\Campaign', 'campaign_id');
    }

}
