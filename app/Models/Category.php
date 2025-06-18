<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $parent_id
 * @property string $name
 * @property int $layer
 * @property int $display_oder
 * @property int $status
 */
class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'parent_id',
        'layer',
        'display_order',
        'status',
    ];
}
