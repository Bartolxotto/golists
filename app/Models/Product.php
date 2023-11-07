<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'category_id',
    ];

    public function productAliases(): HasMany
    {
        return $this->hasMany(ProductAlias::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Items::class);
    }
}
