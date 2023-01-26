<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    protected $table = 'transaction_items';

    protected $fillable = [
        'line_number',
        'transaction_id',
        'product_id',
        'product_name',
        'unit_price',
        'quantity',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
