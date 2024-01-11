@extends('layouts.participantBase')

@section('title')
    <h3 class="text">Complaint</h3>
@endsection



@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between">
            <h6>View Complaint Application</h6>
        </div>
        <div class="tabcontent">
            <div class="container mt-3">
                <div class="left">
                    <span>Complaint ID </span>
                </div>
                <div class="right">
                    <span>: {{ $data->cmp_ID ?? '-' }}</span>
                </div>
            </div>

            <div class="container mt-3">
                <div class="left">
                    <span>Owner's Name </span>
                </div>
                <div class="right">
                    <span>: {{ $data->user->name ?? '-' }}</span>
                </div>
            </div>

            <div class="container mt-3">
                <div class="left">
                    <span>Owner's IC Number </span>
                </div>
                <div class="right">
                    <span>: {{ $data->user->icNum ?? '-' }}</span>
                </div>
            </div>

            <div class="container mt-3">
                <div class="left">
                    <span>Owner's Phone No. </span>
                </div>
                <div class="right">
                    <span>: {{ $data->user->phoneNum ?? '-' }}</span>
                </div>
            </div>

            <div class="container mt-3">
                <div class="left">
                    <span>Date Applied</span>
                </div>
                <div class="right">
                    <span>: {{ $data->created_at->format('Y-m-d') ?? '-' }}</span>
                </div>
            </div>

            <div class="container mt-3">
                <div class="left">
                    <span>Kiosk Name </span>
                </div>
                <div class="right">
                    <span>: {{ $data->application->kiosk->kiosk_name ?? '-' }}</span>
                </div>
            </div>
            <div class="container mt-3">
                <div class="left">
                    <span>Kiosk Location </span>
                </div>
                <div class="right">
                    <span>: {{ $data->application->kiosk->kiosk_location ?? '-' }}</span>
                </div>
            </div>

            <div class="container mt-3">
                <div class="left">
                    <span>Complaint </span>
                </div>
                <div class="right">
                    <span>: {{ $data->cmp_category ?? '-' }}</span>
                </div>
            </div>

            <div class="container mt-3">
                <div class="left">
                    <span>Evidence </span>
                </div>
                <div class="right">
                    <span>: <img src="{{ Storage::url($data->cmp_evidence) }}" style="width: 200px; height: 200px;">
                    </span>
                </div>
            </div>

            <div class="container mt-3">
                <div class="left">
                    <span>Remark </span>
                </div>
                <div class="right">
                    <span>: {{ $data->cmp_remark ?? '-' }}</span>
                </div>
            </div>
            <div class="container mt-3">
                <div class="left">
                    <span>Status </span>
                </div>
                <div class="right">
                    <span>: {{ $data->cmp_status ?? '-' }}</span>
                </div>
            </div>
        </div>
        <button type="reset" onclick="history.back()" class="btn btn-info btn-sm float-left mb-0 mt-4" style="background-color: gray;  border: 1px solid gray;">Back</button>
    </div>
@endsection
