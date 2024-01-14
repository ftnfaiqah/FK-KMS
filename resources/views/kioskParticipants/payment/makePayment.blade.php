@extends('layouts.participantBase')

@section('title')
    <h3 class="text">Payment</h3>
@endsection

@section('content')

<form action="/upload-payment-details" method="post" enctype="multipart/form-data">
        @csrf
        <label for="app_id">Applicant ID:</label>
        <input type="text" id="app_id" name="app_id">
        <br>
        <label for="payment_file">Upload Payment File:</label>
        <input type="file" id="payment_file" name="payment_file">
        <br>
        <button type="submit">Upload Payment Details</button>
    </form>