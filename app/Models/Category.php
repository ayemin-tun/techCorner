<?php

namespace App\Models;

use App\Traits\HandleImageDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HandleImageDelete,HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'is_active'];
    
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
