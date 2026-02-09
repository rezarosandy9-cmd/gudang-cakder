<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    // Gunakan 'extends', bukan ':'
    protected $fillable = ['item_id', 'type', 'quantity', 'date'];

    /**
     * Relasi: Transaksi ini milik satu barang (Item)
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}