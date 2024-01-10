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
            @foreach ($datas as $data)
            <div class="col">
                <div class="tabcontent" style="text-align: center">
                    <p><b>Kiosk {{ $data->kiosk_name ?? '-' }}</b></p><br>
                    <img src={{Storage::url( $data->kiosk_img)}} style="width:200px;height:200px;"><br><br>
                    <p><b>Location: {{ $data->kiosk_location ?? '-' }}</b><span> </span><br>
                        <b>Size: {{ $data->kiosk_size ?? '-' }}</b><span> </span><br>
                        <b>Rent: {{ $data->kiosk_rent ?? '-' }}</b><span> </span><br>
                        <b>Status: {{ $data->kiosk_status ?? '-' }}</b><span> </span>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        <a href="applicationStatus" class="btn btn-info btn-sm float-left mb-0 mt-4" style="background-color: gray;  border: 1px solid gray;">
            Kembali</a>
    </div>
@endsection