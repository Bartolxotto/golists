<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'quantity',
        'checked',
        'list_id',
        'product_id',
        'checked_at'
    ];

    /**
     * Get the list that owns the item.
     */
    public function list()
    {
        return $this->belongsTo(AppList::class);
    }

    /**
     * Get the product that belongs to the item.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
