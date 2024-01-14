@extends('layouts.participantBase')

@section('title')
    <h3 class="text">Complaint</h3>
@endsection



@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between">
            <h6>Complaint Application</h6>
        </div>
        <br><br>
        <form role="form" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="row" style="margin-bottom: 20px">
                <div class="col">
                    <span>Owner's Name</span>
                    <input type="text" class="form-control" value="{{$application->user->name ?? ''}}" readonly>
                </div>
                <div class="col">
                    <span>Owner's IC Number</span>
                    <input type="text" class="form-control" value="{{$application->user->email ?? ''}}" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <span>Kiosk Name</span>
                    <input type="text" class="form-control" value="{{$application->kiosk->kiosk_name ?? ''}}" readonly>
                </div>
                <div class="col">
                    <span>Kiosk Location</span>
                    <input type="text" class="form-control" value="{{$application->kiosk->kiosk_location?? ''}}" readonly>
                </div>
            </div>

        </form>

            <button type="reset" onclick="history.back()" class="btn btn-info btn-sm float-left mb-0 mt-4" style="background-color: gray;  border: 1px solid gray;">Back</button>
    </div>
    
@endsection
