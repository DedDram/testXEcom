<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CurrencyName extends Model
{
    protected $table = 'currency_name';
    protected $fillable = ['currency_code'];

    public function exchanges(): HasMany
    {
        return $this->hasMany(Exchange::class, 'currency_name_id', 'id');
    }
}
