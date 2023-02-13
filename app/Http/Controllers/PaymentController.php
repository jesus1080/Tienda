<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Mail\PaymentConfirmation;
use App\Mail\DeliveryConfirmation;
use App\Models\Payment;


class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
 
        $cart = Cart::content();
       

        //dd(Cart::total());
        $payment = Payment::create([
            'user_id' => auth()->user()->id,
            'amount' => Cart::total(),
            'description' => json_encode(Cart::content()->toArray())
        ]);


        Mail::to($request->user())->send(new PaymentConfirmation($payment));

        return view('payment/show', compact('payment'));
    }

    public function index()
    {
        $payments = Payment::all();

        return view('payment/index',compact('payments'));
    }

    public function toDeliver($id)
    {
        //change status de payment

        $payment = Payment::find($id);
        $payment->status = 'entregado';
        $payment->save();

        //send email to client

        Mail::to($payment->user)->send(new DeliveryConfirmation($payment));

        //set delivery to supervisor
        
        return redirect('/payments');
    }

}
