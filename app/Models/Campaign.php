<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    public const PRODUCTS = "products";
    public const CATEGORIES = "categories";
    public const FLAT = "flat";
    public const PERCENTAGE = "percentage";
    public const UPCOMING = "upcoming";
    public const STOREWIDE = "storewide";

    protected $fillable = [
        'name', 
        'start_datetime',
        'end_datetime',
        'applicable_on',
        'discount_type',
        'discount_value',
        'status',
        'notes',
        'created_by', 
        'updated_by',
    ];

    public function categoryDiscounts(){
        return $this->hasMany('App\Models\CategoryDiscount');
    }

    public function productDiscounts(){
        return $this->hasMany('App\Models\ProductDiscount');
    }

    public function createdBy(){
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function updatedBy(){
        return $this->belongsTo('App\Models\User', 'updated_by');
    }

    public function scopeEligible()
    {
        return $this->whereRaw('(now() between start_datetime and end_datetime)');
    }
}