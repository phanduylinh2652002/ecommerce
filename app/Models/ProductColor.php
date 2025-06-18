<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $product_id
 * @property string $name
 */
class ProductColor extends Model
{
    protected $table = 'product_colors';

    protected $fillable = [
        'product_id',
        'name',
    ];
}
