<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    use HasFactory;

    public function Item()
    {
        return $this->belongsTo('App\Models\Item', 'item_id');
    }
}
