<?php

// app/Http/Controllers/PaymentController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\VirtualAccounts;
use Xendit\PaymentRequest\VirtualAccount;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function handleWebhook(Request $request)
    {
        try {
            // Log the incoming webhook for debugging
            Log::info('Xendit Webhook Received', $request->all());

            $data = $request->all();

            // Process payment success
            $externalId = $request->input('external_id'); // Your unique identifier for the payment
            $amount = $request->input('amount'); // Paid amount

            // Find the payment record and update the status
            $payment = \App\Models\Penyewaan::where('no_pembayaran', $externalId)->update([
                'status' => 'PAID'
            ]);

            // if ($payment) {
            //     $payment->update([
            //         'status' => 'PAID'
            //     ]);

            //     Log::info('Payment updated successfully', ['external_id' => $externalId]);
            // } else {
            //     Log::warning('Payment record not found', ['external_id' => $externalId]);
            // }

            return response()->json(['message' => 'Webhook processed successfully'], 200);
        } catch (\Exception $e) {
            Log::error('Error processing Xendit webhook', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Webhook processing failed'], 500);
        }
    }
}

