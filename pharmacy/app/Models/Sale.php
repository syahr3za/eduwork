<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->belongsToMany('App\Models\Item', 'sale_details', 'sale_id', 'item_id');
    }

    public function Customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
}
