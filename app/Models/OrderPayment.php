<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    use HasFactory;
    
    protected $table = 'order_payments';

    protected $fillable = [
        'reference', 
        'order_id', 
        'customer_id', 
        'payment_method_id',
        'payment_date',
        'amount',
        'notes',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    
    public function order(){
        return $this->belongsTo('App\Models\Order');
    }
    public function customer(){
        return $this->belongsTo('App\Models\User');
    }
    public function paymentMethod(){
        return $this->belongsTo('App\Models\PaymentMethod');
    }
    public function createdBy(){
        return $this->belongsTo('App\Models\User','created_by');
    }

    public function updatedBy(){
        return $this->belongsTo('App\Models\User','updated_by');
    }
}
