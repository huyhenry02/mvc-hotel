<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $table = 'transactions';
    public const METHOD_CREDIT_CARD = 'credit_card';
    public const METHOD_PAYPAL = 'paypal';
    public const METHOD_BANK_TRANSFER = 'bank_transfer';

    public const ARRAY_METHOD = [
        self::METHOD_CREDIT_CARD => 'Credit_card',
        self::METHOD_PAYPAL => "Paypal",
        self::METHOD_BANK_TRANSFER => 'Bank_transfer',
    ];

    public const STATUS_SUCCESS = 'success';
    public const STATUS_FAILED = 'failed';
    public const STATUS_PENDING = 'pending';

    public const ARRAY_STATUS = [
        self::STATUS_SUCCESS => "Thành Công",
        self::STATUS_FAILED => "Lỗi",
        self::STATUS_PENDING => "Chưa Thanh Toán",
    ];
    protected $fillable = [
        'booking_id',
        'payment_method',
        'payment_date',
        'transaction_status',
        'amount',
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}
