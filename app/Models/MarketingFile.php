<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Marketing;

class MarketingFile extends Model
{
    use HasFactory;


    public function marketing()
    {
        return $this->belongsTo(Marketing::class);
    }
}
