<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $title
 * @property string $description
 * @property float $price
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
