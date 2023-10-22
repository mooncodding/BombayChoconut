<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAdjustment extends Model
{
    use HasFactory;

    protected $table = 'stock_adjustments';

    protected $fillable = [
        'reference',
        'date',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    
    public function stockAdjustmentDetails(){
        return $this->hasMany('App\Models\StockAdjustmentDetail');
    }
    public function createdBy(){
        return $this->belongsTo('App\Models\User','created_by');
    }

    public function updatedBy(){
        return $this->belongsTo('App\Models\User','updated_by');
    }
}
