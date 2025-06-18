<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $image
 * @property int $imageable_id
 * @property string $imageable_type
 */
class Image extends Model
{
    use SoftDeletes;

    protected $table = 'images';

    protected $fillable = [
        'image',
        'imageable_id',
        'imageable_type',
    ];
}
