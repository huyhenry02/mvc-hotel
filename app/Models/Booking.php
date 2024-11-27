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
        'name_booking',
        'email_booking',
        'user_id',
        'room_id',
        'room_type_id',
        'adult_people_number',
        'child_people_number',
        'check_in_date',
        'check_out_date',
        'total_price',
        'status',
        'note',
        'payment_status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    public function transaction(): HasOne
    {
        return $this->hasOne(Transaction::class);
    }
}
