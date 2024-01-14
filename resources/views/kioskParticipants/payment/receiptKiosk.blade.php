@extends('layouts.participantBase')

@section('title')
    <h3 class="text">Payment</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between">
            <h6>Receipt Details</h6>
        </div>
        <div class="tabcontent">
            <div class="container mt-2">
                <div class="left">
                    <span>Receipt Date </span>
                </div>
                <div class="right">
                    <span>: {{ $data->created_at->format('Y-m-d') ?? '-' }}</span>
                </div>
            </div>

            <!-- Add more receipt details as needed -->

            <div class="container mt-2">
                <div class="left">
                    <span>Payment Status </span>
                </div>
                <div class="right">
                    <span>: {{ $payment->app_status ?? 'Paid' }}</span>
                </div>
            </div>

            <div class="container mt-2">
    <div class="left">
        <span>Receipt Document </span>
    </div>
    <div class="right">
        @if ($data->receipt_img)
            <iframe src="{{ Storage::url($payment->receipt_img) }}" width="800" height="600"></iframe>
        @else
        <span><a href="file://{{ public_path('C:\Users\danny\Documents\SEP\Receipt.pdf') }}" target="_blank">Receipt.pdf</a>.</span>

        @endif
    </div>
</div>

        </div>
    </div>
@endsection
