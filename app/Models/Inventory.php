<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'quantity',
        'min_quantity',
        'max_quantity',
        'storage_location',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
