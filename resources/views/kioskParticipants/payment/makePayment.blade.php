@extends('layouts.participantBase')

@section('title')
<h3 class="text">Payment</h3>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card-header d-flex justify-content-between">
        <h6>Make Payment</h6>
    </div>
    <div class="tabcontent">
        <div class="container mt-2">
            <div class="left">
                <span>Applied Date </span>
            </div>
            <div class="right">
                <span>: {{ $data->created_at->format('Y-m-d') ?? '-' }}</span>
            </div>
        </div>

        <div class="container mt-2">
            <div class="left">
                <span>Owner's Name </span>
            </div>
            <div class="right">
                <span>: {{ $data->user->name ?? 'Ahmad' }}</span>
            </div>
        </div>

        <div class="container mt-2">
            <div class="left">
                <span>Owner's IC Number </span>
            </div>
            <div class="right">
                <span>: {{ $data->user->icNum ?? '9821712' }}</span>
            </div>
        </div>

        <div class="container mt-2">
            <div class="left">
                <span>Owner's Phone No. </span>
            </div>
            <div class="right">
                <span>: {{ $data->user->phoneNum ?? '01927363281' }}</span>
            </div>
        </div>

        <div class="container mt-2">
            <div class="left">
                <span>Kiosk Name </span>
            </div>
            <div class="right">
                <span>: {{ $data->kiosk->kiosk_name ?? 'Test' }}</span>
            </div>
        </div>

        <div class="container mt-2">
            <div class="left">
                <span>Payment Status </span>
            </div>
            <div class="right">
                <span>: {{ $data->app_status ?? 'Unpaid' }}</span>
            </div>
        </div>

        <div class="container mt-2">
            <div class="left">
                <span>Upload Receipt</span>
            </div>
            <div class="right">
                <input type="file" name="receipt" id="receipt">
            </div>
        </div>
    </div>

    <a href="{{ route('kioskParticipants.payment.receiptKiosk', ['payment' => $data->payment_ID]) }}" class="btn btn-info btn-sm float-left mb-0 mt-4"
        style="background-color: green;  border: 1px solid gray;">
        Pay
    </a>
</div>
@endsection