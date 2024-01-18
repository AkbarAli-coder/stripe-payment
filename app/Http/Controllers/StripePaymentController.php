<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;

class StripePaymentController extends Controller
{
    public function stripPaymet(Request $request)
    {
       
      $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
      $currency = "USD";
      $amuntConvert =80;
      $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => [[
          'price_data' => [
            'currency' => $currency,
            'product_data' => [
              'name' => $request->product_name, 
            ],
            'unit_amount' => $request->net_total * $amuntConvert,
          ],
          'quantity' => $request->quantity,
        ]],
        'mode' => 'payment',
        'success_url' => route('stipe.success').'?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => route('stipe.cancel'),
      ]);

            // dd($checkout_session);

            if(isset($checkout_session->id) && $checkout_session->id != ''){
                // we can store customer data to session next store to database
                
                return redirect($checkout_session->url);
            } else {
                return redirect()->route('stipe.cancel');
            }

  
}

    public function stripeSuccess(Request $request)
    {

        if(isset($request->session_id)) {

            $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
            $checkout_session = $stripe->checkout->sessions->retrieve($request->session_id);
            dd($checkout_session);

            // store session data to database with successful transactionid


        } else {
            return redirect()->route('stipe.cancel');
        }

      
    }
 
    public function stripeCancel()
    {
       return "your payment is cancel";
    }


    public function stripeError()
    {
        return view('error');
    }

}
