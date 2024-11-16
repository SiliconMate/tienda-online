<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function name(): Attribute
    {
        return Attribute::make(
            get: function($value){
                return ucfirst($value);
            }
        );
    }

    public function description(): Attribute
    {
        return Attribute::make(
            get: function($value){
                return ucfirst($value);
            }
        );
    }
}
