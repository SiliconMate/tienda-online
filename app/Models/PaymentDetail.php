<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_id',
        'payment_method',
        'provider',
        'status',
        'completed_at',
        'total_paid',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
            'price' => 'decimal:2',
        ];
    }

    public function orderDetail(): BelongsTo
    {
        return $this->belongsTo(OrderDetail::class, 'order_id', 'id');
    }
}
