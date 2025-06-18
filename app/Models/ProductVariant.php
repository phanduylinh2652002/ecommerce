<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $product_color_id
 * @property string $size
 * @property string $sku
 * @property int $quantity
 * @property int $price
 * @property int $status
 * @property int $display_order
 *
 */
class ProductVariant extends Model
{
    use SoftDeletes;

    protected $table = 'product_variants';

    protected $fillable = [
        'product_color_id',
        'size',
        'sku',
        'quantity',
        'price',
        'status',
        'display_order'
    ];
}
