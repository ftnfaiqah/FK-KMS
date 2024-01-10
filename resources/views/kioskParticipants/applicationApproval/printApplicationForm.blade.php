@extends('layouts.participantBase')

@section('title')
    <h3 class="text">Application and Approval</h3>
@endsection


@section('content')
<div class="container-fluid" >
    <div class="card-header d-flex justify-content-between">
        <h6>Print Kiosk Application</h6>
    </div>
    <div class="tabcontent">
        <div style="background-color:aliceblue;width:70%;margin:auto;padding:12px">
            <div style="text-align: center">
                <img src="{{ asset('assets/img/petakom-logo.png') }}" style="width: 20%;" alt="Logo">
                <p><b>PETAKOM KIOSK RENTAL</b></p>
            </div>
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
                    <span>: {{ $data->user->name}}</span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Owner's IC Number </span>
                </div>
                <div class="right">
                    <span>: {{ $data->user->icNum}}</span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Owner's Phone No. </span>
                </div>
                <div class="right">
                    <span>: {{$data->user->phoneNum}}</span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Kiosk Name </span>
                </div>
                <div class="right">
                    <span>: {{ $data->kiosk->kiosk_name}}</span>
                </div>
            </div>
            <div class="container mt-2">
                <div class="left">
                    <span>Status </span>
                </div>
                <div class="right">
                    <span>: {{ $data->app_status}}</span>
                </div>
            </div>
        </div>
        <div class="text-end mt-2">
            <a href="{{ route('application.download', ['application' => $data->app_ID]) }}" class="btn btn-info btn-sm float-left mb-0 mt-4">Download</a>
        </div>        
    </div>
    <a href="{{route('application.index')}}" class="btn btn-info btn-sm float-left mb-0 mt-4" style="background-color: gray;  border: 1px solid gray;">
        Kembali</a>
</div>
@endsection