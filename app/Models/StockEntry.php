<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
    use HasFactory;

    protected $table = 'stock_entries';

    protected $fillable = [
        'reference',
        'stock_entry_date',
        'notes',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    
    public function stockEntryDetails(){
        return $this->hasMany('App\Models\StockEntryDetail');
    }
    public function createdBy(){
        return $this->belongsTo('App\Models\User','created_by');
    }

    public function updatedBy(){
        return $this->belongsTo('App\Models\User','updated_by');
    }
}
