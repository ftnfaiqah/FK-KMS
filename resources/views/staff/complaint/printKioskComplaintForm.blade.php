@extends('layouts.staffBase')

@section('title')
<h3 class="text">Complaint</h3>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card-header d-flex justify-content-between">
        <h6>Print Kiosk Complaint Application</h6>
    </div>
    <div class="tabcontent">
        <div style="background-color:aliceblue;width:80%;margin:auto;padding:12px">
            <div class="container mt-2 text-end">
                <div class="right">
                    <span><i><b>Complaint ID: </b></i></span>
                </div>
            </div>
            <div style="text-align: center">
                <img src="assets/img/petakom-logo.png" alt="Logo" style="width: 20%;">
                <p><b>PETAKOM KIOSK RENTAL</b></p>
            </div>
            <div class="container mt-2">
                <div class="left">
                    <span>Applied Date </span>
                </div>
                <div class="right">
                    <span>: </span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Owner's Name </span>
                </div>
                <div class="right">
                    <span>: </span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Owner's Phone No.</span>
                </div>
                <div class="right">
                    <span>: </span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Kiosk Number</span>
                </div>
                <div class="right">
                    <span>: </span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Kiosk Name </span>
                </div>
                <div class="right">
                    <span>: </span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Complaint </span>
                </div>
                <div class="right">
                    <span>: </span>
                </div>
            </div>
            <div class="container mt-2">
                <div class="left">
                    <span>Remark </span>
                </div>
                <div class="right">
                    <span>: </span>
                </div>
            </div>
            <div class="container mt-2 mb-4">
                <div class="left">
                    <span>Assigned </span>
                </div>
                <div class="right">
                    <span>: </span>
                </div>
            </div>
        </div>
        <div class="text-end mt-2">
            <button type="submit" class="btn btn-info btn-sm float-left mb-0 mt-4">Print</button>
        </div>
    </div>
    <a href="complaintList" class="btn btn-info btn-sm float-left mb-0 mt-4" style="background-color: gray;  border: 1px solid gray;">
        Back</a>
</div>
@endsection