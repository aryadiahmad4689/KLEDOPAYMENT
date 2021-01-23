<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::paginate(10);
        return view('payment.index',compact('payments'));
    }

    public function create(Request $request)
    {
        return view('payment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_name' => 'string|required'
        ]);

        $payment = new Payment;
        $payment->payment_name = $request->name;

        $payment->save();
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id_payment' => 'required'
        ]);

        $payments = $request->input('id_payment',[]);

        foreach ($payments as $id) {
            Payment::where("id",$id)->delete();
       }
        return redirect()->back();
    }
}
