<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockEntryDetail extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
    public function entry(){
        return $this->belongsTo('App\Models\StockEntry','stock_entry_id');
    }
}
