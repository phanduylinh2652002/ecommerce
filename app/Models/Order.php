<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $user_id
 * @property string $order_code
 * @property int $total_price
 * @property int $status
 * @property string $customer_name
 * @property string $customer_phone
 * @property string $customer_address
 * @property string $customer_email
 * @property string $note
 * @property string $order_date
 */
class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'order_code',
        'total_price',
        'status',
        'customer_name',
        'customer_phone',
        'customer_address',
        'customer_email',
        'note',
        'order_date',
    ];
}
