<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    protected $fillable = [
        'name', 
        'date', 
        'amount', 
        'payment_method_id',
        'notes',
        'created_by', 
        'updated_by',
    ];

    public function paymentMethod(){
        return $this->belongsTo('App\Models\PaymentMethod', 'payment_method_id');
    }

    public function createdBy(){
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function updatedBy(){
        return $this->belongsTo('App\Models\User', 'created_by');
    }
  
}
