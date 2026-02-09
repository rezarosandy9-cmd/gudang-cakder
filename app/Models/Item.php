<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    protected $fillable = ['name', 'category', 'location', 'unit', 'stock'];

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}