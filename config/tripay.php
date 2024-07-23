<?php

return [
    'api_key' => env('TRIPAY_API_KEY'),
    'private_key' => env('TRIPAY_PRIVATE_KEY'),
    'merchant_code' => env('TRIPAY_MERCHANT_CODE'),
    'payment_channel' => env('TRIPAY_PAYMENT_CHANNEL'),
    'transaction' => env('TRIPAY_TRANSACTION'),
    'detail_transaction' => env('TRIPAY_DETAIL_TRANSACTION'),
];

