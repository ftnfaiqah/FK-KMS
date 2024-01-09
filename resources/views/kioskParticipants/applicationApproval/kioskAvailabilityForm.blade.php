@extends('layouts.participantBase')

@section('title')
    <h3 class="text">Application and Approval</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between">
            <h6>List of Kiosk</h6>
        </div>
        <div class="row">
            <div class="col">
                <div class="tabcontent">
                    <img src="">
                    <p><b>KIOSK {{ $data->id ?? '-' }}</b></p>
                    <p><b>Location: {{ $data->kiosk_location ?? '-' }}</b><span> </span><br>
                        <b>Size: {{ $data->kiosk_size ?? '-' }}</b><span> </span><br>
                        <b>Rent: {{ $data->kiosk_rent ?? '-' }}</b><span> </span><br>
                        <b>Status: {{ $data->kiosk_status ?? '-' }}</b><span> </span>
                    </p>
                </div>
            </div>
        </div>
        <a href="applicationStatus" class="btn btn-info btn-sm float-left mb-0 mt-4" style="background-color: gray;  border: 1px solid gray;">
            Kembali</a>
    </div>
@endsection