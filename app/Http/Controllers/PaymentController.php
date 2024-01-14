<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class PaymentController extends Controller
{

    public function index()
    {
        // Fetch the data from the database
        $datas = Payment::all();

        // Pass the data to the view
        return view('kioskParticipants.payment.viewParticipantPaymentDetails', compact('datas'));
    }

    public function index2()
    {
        // Fetch the data from the database
        $datas = Payment::all();

        // Pass the data to the view
        return view('kioskParticipants.payment.receiptKiosk');
    }

    //kiosk participant make payment
    public function makePayment($payment)
{
    $data = Payment::All()->find($payment); 
    return view('kioskParticipants.payment.makePayment', compact('data'));
}
   

    //kiosk participant view payment details
    public function viewPaymentDetails()
    {
        $user = Auth::user();
        $payment = $user->payment;
        return view('viewPaymentDetails', compact('payment'));
    }

    //kiosk participant view receipt
    public function viewReceiptDetails($payment)
    {
        $data = Payment::All()->find($payment); 
    return view('kioskParticipants.payment.viewReceiptDetails', compact('data'));
    }

    public function receiptKiosk($payment)
    {
        $data = Payment::All()->find($payment); 
    return view('kioskParticipants.payment.receiptKiosk', compact('data'));
    }

    //kiosk participant print receipt
    public function printReceipt()
    {
        $user = Auth::user();
        $payment = $user->payment;
        return view('printReceipt', compact('payment'));
    }


    //fk bursary approve the payment
    public function approvePayment(Payment $payment)
    {
        $payment->update(['payment_status' => 'Approved']);
        return redirect()->route('viewParticipantPayment');
    }

    //fk bursary reject payment
    public function rejectPayment($payment_ID)
    {
        $payment = Payment::find($payment_ID);
        $payment->update(['status' => 'Rejected']);
        return redirect()->route('viewPaymentDetails', ['id' => $payment->payment_ID]);
    }

    //fk bursary generate receipt
    public function generateReceipt($payment_ID)
    {
        $payment = Payment::find($payment_ID);
        $payment->update(['status' => 'Paid']);
        return view('viewReceipt', compact('payment'));
    }

    //fk bursary to view participant payment
    public function viewParticipantPayment($payment_ID)
    {
        $participant = User::find($payment_ID);
        $payments = Payment::where('user_ID', $participant->payment_ID)->get();
        return view('viewParticipantPayment', compact('payments'));
    }




}
