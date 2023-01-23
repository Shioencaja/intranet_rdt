<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Course extends Model
{
    use HasFactory;


    public function category()
    {
      return $this->belongsTo(Category::class);
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
