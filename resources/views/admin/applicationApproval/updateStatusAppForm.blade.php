@extends('layouts.adminBase')

@section('title')
    <h3 class="text">Application And Approval</h3>
@endsection



@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between">
            <h6>Update Kiosk Application Status</h6>
        </div>
        <div class="tabcontent">
            <div class="container mt-2">
                <div class="left">
                    <span>Applied Date </span>
                </div>
                <div class="right">
                    <span>: {{ $data->created_at->format('Y-m-d') ?? '' }}</span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Owner's Name </span>
                </div>
                <div class="right">
                    <span>: {{ $data->user->name ?? '' }}</span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Owner's IC Number </span>
                </div>
                <div class="right">
                    <span>: {{ $data->user->icNum ?? '' }}</span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Owner's Phone No. </span>
                </div>
                <div class="right">
                    <span>: {{ $data->user->phoneNum ?? '' }}</span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="left">
                    <span>Kiosk Name </span>
                </div>
                <div class="right">
                    <span>: {{ $data->kiosk->kiosk_name ?? '' }}</span>
                </div>
            </div>

            <form role="form" method="POST"  action="{{ route('approval.updateStatus', ['application' => $data->app_ID]) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="container mt-2">
                    <div class="left">
                        <span><b>Status</b></span>
                    </div>
                    <div class="right">
                        <select class="form-select" name="appStatus" value="{{ $data->app_status ?? '' }}"
                            style="width: 50%;">
                            <option selected value="{{ $data->app_status ?? '' }}">{{ $data->app_status ?? '' }}</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                </div>

                <div class="text-end mt-2">
                    <button type="submit" class="btn btn-info btn-sm float-left mb-0 mt-4">Save</button>
                </div>
            </form>
        </div>
        <a href="{{ route('approval.index') }}" class="btn btn-info btn-sm float-left mb-0 mt-4"
            style="background-color: gray">
            Back</a>
    </div>
@endsection
