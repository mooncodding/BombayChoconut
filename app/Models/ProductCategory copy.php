<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductCategory extends Model
{
    use HasFactory;
    
    protected $table = 'product_categories';

    protected $fillable =[
        'name',
        'image',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];

    // public function categoryProducts(){
    //     return $this->hasMany(Product::class,'category_id','id');
    // }

    // public function parentCategory(){
    //     return $this->belongsTo('App\Models\ProductCategory','parent_id');
    // }
    
    // public function childCategories(){
    //     return $this->hasMany('App\Models\ProductCategory','parent_id');
    // }
    
    // public function children(){
    //     return $this->childCategories()->with(['children' => function($query){
    //         $query->select(DB::raw("product_categories.* , name as label"));
    //     }]);
    // }

    public function createdBy(){
        return $this->belongsTo('App\Models\User','created_by');
    }

    public function updatedBy(){
        return $this->belongsTo('App\Models\User','updated_by');
    }
    // public function scopeParentCategories($query)
    // {
    //     return $query->whereNull('parent_id');
    // }
}
