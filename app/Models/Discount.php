<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'percentage',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_discounts')
            ->withTimestamps();
    }
}
