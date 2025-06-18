<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $user_id
 * @property int $type
 * @property int $notifiable_id
 * @property string $notifiable_type
 * @property string $message
 * @property int $read
 *
 */
class Notification extends Model
{
    use SoftDeletes;

    protected $table = 'notifications';

    protected $fillable = [
        'user_id',
        'type',
        'notifiable_id',
        'notifiable_type',
        'message',
        'read',
    ];
}
