<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductView extends Model
{
    use HasFactory;

    protected $table = 'product_views';

    protected $fillable =[
        'product_id',
        'customer_id',
        'view_date_time',
        'created_at',
        'updated_at'
    ];
}
