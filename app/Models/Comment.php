<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $product_id
 * @property int $user_id
 * @property int $review_id
 * @property int $parent_id
 * @property string $comment
 */
class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'comments';

    protected $fillable = [
        'product_id',
        'user_id',
        'review_id',
        'comment',
        'parent_id',
    ];
}
