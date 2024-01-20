<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exchange extends Model
{
    protected $table = 'exchange';
    public $timestamps = false;
    protected $fillable = ['currency_name_id','course','course'];

    public function currencyName(): BelongsTo
    {
        return $this->belongsTo(CurrencyName::class, 'currency_name_id', 'id');
    }
}
