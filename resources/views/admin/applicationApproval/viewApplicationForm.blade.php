@extends('layouts.adminBase')

@section('title')
    <h3 class="text">Application And Approval</h3>
@endsection



@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between">
            <h6>View Kiosk Application</h6>
        </div>
        <div class="tabcontent">
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
                    <span>Owner's IC Number </span>
                </div>
                <div class="right">
                    <span>: </span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Owner's Phone No. </span>
                </div>
                <div class="right">
                    <span>: </span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Kiosk ID </span>
                </div>
                <div class="right">
                    <span>: </span>
                </div>
            </div>
            <div class="container mt-2">
                <div class="left">
                    <span>Status </span>
                </div>
                <div class="right">
                    <span>: </span>
                </div>
            </div>

            <div class="text-end mt-2">
                <button type="submit" class="btn btn-info btn-sm float-left mb-0 mt-4">Save</button>
            </div>
        </div>
        <a href="applicationList" class="btn btn-info btn-sm float-left mb-0 mt-4" style="background-color: gray">
            Kembali</a>
    </div>
@endsection