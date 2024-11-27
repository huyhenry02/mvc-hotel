<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $table = 'bookings';
    public const STATUS_PENDING = "pending";
    public const STATUS_PAID = "paid";
    public const ARRAY_STATUS = [
        self::STATUS_PENDING => "Chưa Thanh Toán",
        self::STATUS_PAID => "Đã Thanh Toán"
    ];
    protected $fillable = [
        'user_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'total_price',
        'payment_status',
        'email_confirmed',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function transaction(): HasOne
    {
        return $this->hasOne(Transaction::class);
    }
}
