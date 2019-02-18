<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mollie\Laravel\Facades\Mollie;

class MollieController extends Controller
{


    public function refund()
    {
//        dd();

        $payment = Mollie::api()->payments()->get('tr_3uckDENjWr');

        if ($payment->canBeRefunded() && $payment->amountRemaining >= 2.00)
        {
//            dd($payment,$payment->amount,$payment->amountRemaining);
            $refund = Mollie::api()->payments()->refund($payment, $payment->amount);
//            echo "{$refund->amount->currency} {$refund->amount->value} of payment {$paymentId} refunded.", PHP_EOL;
        } else {
            return 'fail';
            echo "Payment {$paymentId} can not be refunded.", PHP_EOL;
        }
//

        dd($refund);

    }
}
