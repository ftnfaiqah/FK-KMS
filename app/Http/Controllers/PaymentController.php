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
    //kiosk participant make payment

    public function makePayment(Request $request)
    {
        $file = $request->file('file');


        if (!empty($file)) {
            $rules = array('file' => 'required|mimes:png,jpeg,jpg,gif');
            $validator = Validator::make(array('file' => $file), $rules);

            if ($validator->passes()) {
                $destinationPath = 'uploads';
                $filename = $file->getClientOriginalName();
                $upload_success = $file->move($destinationPath, $filename);

                if ($upload_success) {
                    // Save file to database or process it here.
                    return Response::json('success', 200);
                } else {
                    return Response::json('error', 400);
                }
            } else {
                return Response::json('error', 400);
            }
        } else {
            return Response::json('error', 400);
        }
    }

    //kiosk participant view payment details
    public function viewPaymentDetails()
    {
        $user = Auth::user();
        $payment = $user->payment;
        return view('viewPaymentDetails', compact('payment'));
    }
    //kisok participant view receipt
    public function viewReceipt()
    {
        $user = Auth::user();
        $payment = $user->payment;
        return view('viewReceipt', compact('payment'));
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
   //fk bursary view participant details
   public function viewParticipantPaymentDetails($user_ID)
   {
    $users = User::all();

    return view('index', compact('users'));
   }
   
}
