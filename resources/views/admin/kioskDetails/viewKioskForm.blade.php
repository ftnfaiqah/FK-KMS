@extends('layouts.adminBase')

@section('title')
    <h3 class="text">Kiosk Details</h3>
@endsection



@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between">
            <h6>View Kiosk Details</h6>
        </div>
        <div class="tabcontent">
            <div class="container mt-2">
                <div class="left">
                    <span>Kiosk Name </span>
                </div>
                <div class="right">
                    <span>: {{ $data->kiosk_name ?? '-' }}</span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Kiosk Location </span>
                </div>
                <div class="right">
                    <span>: {{ $data->kiosk_location ?? '-' }}</span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Kiosk Size </span>
                </div>
                <div class="right">
                    <span>: {{ $data->kiosk_size ?? '-' }}</span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Kiosk Rent </span>
                </div>
                <div class="right">
                    <span>: {{ $data->kiosk_rent ?? '-' }}</span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Kiosk Rent Duration</span>
                </div>
                <div class="right">
                    <span>: {{ $data->kiosk_rentDuration ?? '-' }}</span>
                </div>
            </div>

            {{-- <div class="container mt-2">
                <div class="left">
                    <span>Kiosk Image </span>
                </div>
                <div class="right">
                    <span>: </span>
                </div>
            </div> --}}

            <div class="container mt-2">
                <div class="left">
                    <span>Kiosk Status </span>
                </div>
                <div class="right">
                    <span>: {{ $data->kiosk_status ?? '-' }}</span>
                </div>
            </div>
            
            <div class="container mt-2">
                <div class="left">
                    <span>Kiosk Image </span>
                </div>
                <div class="right">
                        <img src={{Storage::url( $data->kiosk_img)}} style="width:200px;height:200px;">
                    </span>
                </div>
            </div>
        </div>
        <a href="{{route('kiosk.index')}}" class="btn btn-info btn-sm float-left mb-0 mt-4" style="background-color: gray">
            Kembali</a>
    </div>
@endsection