<?php

namespace App\Services;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TripayService
{
    public function getPaymentChannels()
    {
        $apiKey = config('tripay.api_key');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        return $response ? $response : $error;
    }

    public function requestTranscaction($request)
    {
        $apiKey       = config('tripay.api_key');
        $privateKey   = config('tripay.private_key');
        $merchantCode = config('tripay.merchant_code');
        $merchantRef = 'INV' . substr(time(), -6);
        if (isset($request['installment'])) {
            $amount       = $request['installment_payment'];
        } else {
            $amount       = $request['nominal'];
        }

        $data = [
            'method'         => $request['method'],
            'merchant_ref'   => $merchantRef,
            'amount'         => $amount,
            'customer_name'  => auth()->user()->name,
            'customer_email' => auth()->user()->email,
            'customer_phone' => auth()->user()->phone_number,
            'order_items'    => [
                [
                    'name'        => 'Pembayaran Kelas Indsutri',
                    'price'       => $amount,
                    'quantity'    => 1,
                ],
            ],
            'return_url'   => 'https://domainanda.com/redirect',
            'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
            'signature'    => hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $privateKey)
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query($data),
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);
        $response = json_decode($response)->data;

        $this->createPayment([
            'user_id' => auth()->user()->id,
            'invoice_id' => $response->merchant_ref,
            'reference' => $response->reference,
            'fee_amount' => $response->total_fee,
            'expired_date' => Carbon::createFromTimestamp($response->expired_time)->format('Y-m-d H:i:s'),
            'semester' => $request['semester'],
            'icon_url' => $request['icon_url'],
            'via' => $response->payment_method,
            'paid_amount' => $response->total_fee + $response->amount,
            'total_pay' => $response->amount,
            'payment_date' => now()
        ]);
        return $response ? $response : $error;
    }

    public function createPayment(array $data): void
    {
        Payment::query()->create($data);
    }

    public function detailTransaction($reference)
    {
        $apiKey = config('tripay.api_key');

        $payload = ['reference'    => $reference];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/detail?' . http_build_query($payload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);
        $response = json_decode($response)->data;

        return $response ? $response : $error;
    }
}
