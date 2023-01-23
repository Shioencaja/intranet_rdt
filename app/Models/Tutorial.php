<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use App\Models\Line;

class Tutorial extends Model
{
    use HasFactory;

    public function line()
    {
      return $this->belongsTo(Line::class);
    }

   

    public function scopeFilterAdmin($query, array $filters)
    {
        $query->when($filters['q'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            });
        });
    }


}
