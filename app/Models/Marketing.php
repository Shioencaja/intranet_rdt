<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\MarketingFile;

class Marketing extends Model
{
    use HasFactory;

    protected $guards = [];


    public function  files() 
    {
        return  $this->hasMany(MarketingFile::class); 
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
